<? 
$weather = get_weather_data();
if (!empty($weather)) {
?>
<tr>
	<td>
		<div class="clear">&nbsp;</div>
		<table class="t600" id="weather" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0; background-color:#FFF;">
			<tr>
				<td class="ccollapse100pbs" style="width:110px;border-right:1px solid #ddd;padding-left:10px;">
					<table class="weather-col" width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 110px; margin:0; background-color:#FFF;">
						<tr>
							<td class="weather-icon-date" style="width:60px">
								<span class="weather-date" style="font-size:10px;font-weight:bold;">TODAY</span>
								<img class="weather-icon" src="<?=bloginfo('stylesheet_directory')?>/img/weather/<?=$weather['days']['day1']['imgCode']?>.png" />
							</td>
							<td class="weather-temps">
								<span class="temp" style="font-size:18px;font-weight:bold"><?=$weather['days']['day1']['tempMaxN']?>&deg;</span>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">High</span>
								<br class="linebreak" />
								<span class="temp" style="font-size:18px;font-weight:bold"><?=$weather['days']['day1']['tempMinN']?>&deg;</span>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">Low</span>
							</td>
						</tr>
					</table>
				</td>
				<td class="ccollapse100pbs" style="width:110px;border-right:1px solid #ddd;padding-left:10px;">
					<table class="weather-col" width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 110px; margin:0; background-color:#FFF;">
						<tr>
							<td class="weather-icon-date" style="width:60px">
								<span class="weather-date" style="font-size:10px;font-weight:bold;">TOMORROW</span>
								<img class="weather-icon" src="<?=bloginfo('stylesheet_directory')?>/img/weather/<?=$weather['days']['day2']['imgCode']?>.png" />
							</td>
							<td class="weather-temps">
								<span class="temp" style="font-size:18px;font-weight:bold"><?=$weather['days']['day2']['tempMaxN']?>&deg;</span>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">High</span>
								<br class="linebreak" />
								<span class="temp" style="font-size:18px;font-weight:bold"><?=$weather['days']['day2']['tempMinN']?>&deg;</span>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">Low</span>
							</td>
						</tr>
					</table>
				</td>
				<td class="ccollapse100pbs" style="width:110px;border-right:1px solid #ddd;padding-left:10px;">
					<table class="weather-col" width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 110px; margin:0; background-color:#FFF;">
						<tr>
							<td class="weather-icon-date" style="width:60px">
								<span class="weather-date" style="font-size:10px;font-weight:bold;"><?=strtoupper(date('l', strtotime($weather['days']['day3']['date'])))?></span>
								<img class="weather-icon" src="<?=bloginfo('stylesheet_directory')?>/img/weather/<?=$weather['days']['day3']['imgCode']?>.png" />
							</td>
							<td class="weather-temps">
								<span class="temp" style="font-size:18px;font-weight:bold"><?=$weather['days']['day3']['tempMaxN']?>&deg;</span>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">High</span>
								<br class="linebreak" />
								<span class="temp" style="font-size:18px;font-weight:bold"><?=$weather['days']['day3']['tempMinN']?>&deg;</span>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">Low</span>
							</td>
						</tr>
					</table>
				</td>
				<td class="ccollapse100pbs" style="width:110px;border-right:1px solid #ddd;padding-left:10px;">
					<table class="weather-col" width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 110px; margin:0; background-color:#FFF;">
						<tr>
							<td class="weather-icon-date" style="width:60px">
								<span class="weather-date" style="font-size:10px;font-weight:bold;"><?=strtoupper(date('l', strtotime($weather['days']['day4']['date'])))?></span>
								<img class="weather-icon" src="<?=bloginfo('stylesheet_directory')?>/img/weather/<?=$weather['days']['day4']['imgCode']?>.png" />
							</td>
							<td class="weather-temps">
								<span class="temp" style="font-size:18px;font-weight:bold"><?=$weather['days']['day4']['tempMaxN']?>&deg;</span>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">High</span>
								<br class="linebreak" />
								<span class="temp" style="font-size:18px;font-weight:bold"><?=$weather['days']['day4']['tempMinN']?>&deg;</span>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">Low</span>
							</td>
						</tr>
					</table>
				</td>
				<td class="ccollapse100" style="width:110px;padding-left:10px;">
					<table class="weather-col" width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 110px; margin:0; background-color:#FFF;">
						<tr>
							<td class="weather-icon-date" style="width:60px">
								<span class="weather-date" style="font-size:10px;font-weight:bold;"><?=strtoupper(date('l', strtotime($weather['days']['day5']['date'])))?></span>
								<? if($weather['days']['day5']['imgCode'] == '') {?>
									<br class="linebreak" />
									<span class="weather-icon" style="font-size:15px;font-weight:bold;">???</span>
								<? } else { ?>
									<img class="weather-icon" src="<?=bloginfo('stylesheet_directory')?>/img/weather/<?=$weather['days']['day5']['imgCode']?>.png" />
								<? } ?>
							</td>
							<td class="weather-temps">
								<? if($weather['days']['day5']['tempMaxN'] == '') {?>
									<span class="temp" style="font-size:18px;font-weight:bold">?</span>
								<? } else { ?>
									<span class="temp" style="font-size:18px;font-weight:bold"><?=$weather['days']['day5']['tempMaxN']?>&deg;</span>
								<? } ?>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">High</span>
								<br class="linebreak" />
								<? if($weather['days']['day5']['tempMinN'] == '') {?>
									<span class="temp" style="font-size:18px;font-weight:bold">?</span>
								<? } else { ?>
									<span class="temp" style="font-size:18px;font-weight:bold"><?=$weather['days']['day5']['tempMinN']?>&deg;</span>
								<? } ?>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">Low</span>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div class="clear">&nbsp;</div>
	</td>
</tr>
<?php } ?>