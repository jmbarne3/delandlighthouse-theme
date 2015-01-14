<?php

define('WEATHER_URL_FORCAST_EXTENDED', 'http://graphical.weather.gov/xml/sample_products/browser_interface/ndfdBrowserClientByDay.php?lat=29.001781&lon=-81.313837&format=24+hourly&numDays=7');
define('WEATHER_URL_TIMEOUT', 30);
define('WEATHER_TIMEZONE', 'America/New_York');

function get_weather_data() {
	$weather = null;
	$weather_template = array(
		'successfullFetch' => 'yes',
		'provider'         => 'n/a',
		'cachedAt'         => 'n/a',
		'feedUpdatedAt'    => 'n/a',
	);

	$weather_url = WEATHER_URL_FORCAST_EXTENDED;
	$date_template = array(
		'date'      => '',
		'condition' => '',
		'tempMax'   => '',
		'tempMaxN'  => null,
		'tempMin'   => '',
		'tempMinN'  => null,
		'imgCode'   => null,
		'imgSmall'  => '',
		'imgMedium' => '',
		'imgLarge'  => ''
	);

	$weather = array_merge($weather_template, array(
			'days' => array (
				'day1' => $date_template,
				'day2' => $date_template,
				'day3' => $date_template,
				'day4' => $date_template,
				'day5' => $date_template
			)
		)
	);

	$opt = array('http' => array ( 'method' => 'GET', 'timeout' => WEATHER_URL_TIMEOUT ) );

	$context = stream_context_create( $opts );

	$raw_weather = @file_get_contents( $weather_url, false, $context );

	if ( $raw_weather ) {
		$xml = simplexml_load_string( $raw_weather );

		if ( $xml ) {
			for ($i = 0; $i < 5; $i++) {
				$daycount = $i + 1;
				$day = 'day'.$daycount;
				// Set date
				$datetime = @$xml->data->{'time-layout'}->{'start-valid-time'}[$i];
				$weather['days'][$day]['date'] = date('Y-m-d', strtotime($datetime));
				// Set max temp
				$temp_max = @$xml->data->parameters->temperature[0]->value[$i];
				$temp_max = preg_match('/[0-9]+/', $temp_max) ? (int)$temp_max : null;
				$weather['days'][$day]['tempMaxN'] = $temp_max;
				$weather['days'][$day]['tempMax'] = $temp_max !== null ? $temp_max.'&#186;' : null;
				// Set min temp
				$temp_min = @$xml->data->parameters->temperature[1]->value[$i];
				$temp_min = preg_match('/[0-9]+/', $temp_min) ? (int)$temp_min : null;
				$weather['days'][$day]['tempMinN'] = $temp_min;
				$weather['days'][$day]['tempMin'] = $temp_min !== null ? $temp_min.'&#186;' : null;
				// Convert NOAA's weather icon names
				$weather['days'][$day]['imgCode'] = @!empty($xml->data->parameters->{'conditions-icon'}->{'icon-link'}[$i]) ? $xml->data->parameters->{'conditions-icon'}->{'icon-link'}[$i] : null;
				if ($weather['days'][$day]['imgCode'] !== null) {
					$weather_img_name = get_noaa_img_code($weather['days'][$day]['imgCode']);
					$converted_status = convert_weather_status($weather_img_name);
					$weather['days'][$day]['imgCode'] = $converted_status['weather_code'];
					$weather['days'][$day]['condition'] = $converted_status['weather_condition'];
				}
				// We assume the fetch was a success unless the
				// imgCode for a given day is empty.
				if (!isset($weather['days'][$day]['imgCode']) || !intval($weather['days'][$day]['imgCode'])) {
					$weather['successfulFetch'] = 'no';
				}
				// Set image icons
				if (isset($weather['days'][$day]['imgCode']) || intval($weather['days'][$day]['imgCode'])) {
					$weather['days'][$day]['imgSmall']  = 'img/weather-small/'.$weather['days'][$day]['imgCode'].'.png';
					$weather['days'][$day]['imgMedium'] = 'img/weather-medium/'.$weather['days'][$day]['imgCode'].'.png';
					$weather['days'][$day]['imgLarge']  = 'img/weather-large/WC'.$weather['days'][$day]['imgCode'].'.png';
				}
			}
			// Set other data
			$weather['provider'] 	  = (string)@$xml->head->source->credit;
			$weather['feedUpdatedAt'] = date('r', strtotime((string)@$xml->head->product->{'creation-date'}));

		}
	}

	return $weather;

}

function get_noaa_img_code($url) {
	$filename = substr(strrchr($url, '/'), 1); // Split img url at last forward slash
	list($weather_img_name, $ext) = explode('.', $filename); // Remove .jpg/.png/whatever extension from remaining string
	$weather_img_name = preg_replace('/[0-9]+/', '', $weather_img_name); // Strip precipitation chance # from code, if exists
	return $weather_img_name;
}

function convert_weather_status($weather_img_name) {
	switch ($weather_img_name) {
		case 'bkn':
		case 'hi_bkn':
			$weather_code = 28; // Mostly Cloudy
			$weather_condition = 'Mostly cloudy';
			break;
		case 'nbkn':
		case 'hi_nbkn':
			$weather_code = 27; // Mostly Cloudy (night)
			$weather_condition = 'Mostly cloudy';
			break;
		case 'skc':
		case 'hi_skc':
			$weather_code = 32; // Fair, Clear
			$weather_condition = 'Fair';
			break;
		case 'nskc':
			$weather_code = 31; // Fair, Clear (night)
			$weather_condition = 'Fair';
			break;
		case 'few':
		case 'hi_few':
			$weather_code = 34; // Few Clouds
			$weather_condition = 'Fair';
			break;
		case 'nfew':
		case 'hi_nfew':
			$weather_code = 29; // Few Clouds (night)
			$weather_condition = 'Fair';
			break;
		case 'sct':
		case 'hi_sct':
		case 'pcloudy':
			$weather_code = 30; // Partly Cloudy
			$weather_condition = 'Partly cloudy';
			break;
		case 'nsct':
		case 'hi_nsct':
			$weather_code = 27; // Partly Cloudy (night)
			$weather_condition = 'Partly cloudy';
			break;
		case 'nscttsra':
			$weather_code = 47; // Scattered thundershowers (night)
			$weather_condition = 'Scattered thundershowers';
			break;
		case 'ovc':
		case 'novc':
		case 'tcu': // ??
			$weather_code = 26; // Overcast (day, night)
			$weather_condition = 'Overcast';
			break;
		case 'fg':
		case 'nfg':
		case 'nbknfg':
			$weather_code = 20; // Foggy/Patchy Fog (day, night)
			$weather_condition = 'Foggy';
			break;
		case 'smoke':
		case 'fu':
			$weather_code = 22; // Smoke
			$weather_condition = 'Smoke';
			break;
		case 'fzra':
			$weather_code = 8;  // Freezing drizzle
			$weather_condition = 'Freezing drizzle';
			break;
		case 'ip':
			$weather_code = 18; // Hail
			$weather_condition = 'Hail';
			break;
		case 'mix':
		case 'nmix':
			$weather_code = 7;  // Mixed snow and sleet (day, night)
			$weather_condition = 'Mixed snow/sleet';
			break;
		case 'raip':
		case 'nraip':
			$weather_code = 35; // Mixed rain and hail
			$weather_condition = 'Mixed rain/hail';
			break;
		case 'rasn':
		case 'nrasn':
			$weather_code = 6;  // Mixed rain and sleet
			$weather_condition = 'Mixed rain/sleet';
			break;
		case 'shra':
			$weather_code = 11; // Light Showers
			$weather_condition = 'Showers';
			break;
		case 'tsra':
			$weather_code = 3;  // Severe Thunderstorms
			$weather_condition = 'Severe thunderstorms';
			break;
		case 'scttsra':
			$weather_code = 37; // Isolated Thunderstorms/Chance of Thunderstorm
			$weather_condition = 'Isolated thunderstorms';
			break;
		case 'ntsra':
		case 'hi_ntsra':
			$weather_code = 47; // Thunderstorms, Thunderstorm in vicinity (night)
			$weather_condition = 'Isolated thundershowers';
			break;
		case 'sn':
			$weather_code = 16; // Snow
			$weather_condition = 'Snow';
			break;
		case 'nsn':
			$weather_code = 46; // Snow (night)
			$weather_condition = 'Snow';
			break;
		case 'wind':
		case 'nwind':
			$weather_code = 23; // Windy
			$weather_condition = 'Windy';
			break;
		case 'nsvrtsra':
			$weather_code = 0; // Funnel spout/tornado
			$weather_condition = 'Tornado';
			break;
		case 'hi_shwrs':
			$weather_code = 40; // Showers in Vicinity
			$weather_condition = 'Scattered showers';
			break;
		case 'hi_nshwrs':
		case 'nra':
			$weather_code = 45; // Showers, Showers in Vicinity (night)
			$weather_condition = 'Scattered showers';
			break;
		case 'fzrara':
			$weather_code = 10; // Freezing Rain
			$weather_condition = 'Freezing rain';
			break;
		case 'hi_tsra':
			$weather_code = 38; // Thunderstorm in vicinity (day)
			$weather_condition = 'Scattered thunderstorms';
			break;
		case 'ra1':
			$weather_code = 9;  // Drizzle
			$weather_condition = 'Drizzle';
			break;
		case 'ra':
			$weather_code = 12; // Showers
			$weather_condition = 'Showers';
			break;
		case 'dust':
		case 'du':
			$weather_code = 19; // Dust
			$weather_condition = 'Dust';
			break;
		case 'mist':
			$weather_code = 21; // Haze
			$weather_condition = 'Haze';
			break;
		case 'hot':
			$weather_code = 36; // Hot
			$weather_condition = 'Hot';
			break;
		case 'cold':
		case 'br': // ??
			$weather_code = 25; // Cold
			$weather_condition = 'Cold';
			break;
		case 'blizzard':
			$weather_code = 15; // Blizzard/Blowing Snow
			$weather_condition = 'Blowing Snow';
			break;
		default:
			$weather_code = null; // No match found
			$weather_condition = null;
			break;
	}
	return array('weather_code' => $weather_code, 'weather_condition' => $weather_condition);
}


?>
