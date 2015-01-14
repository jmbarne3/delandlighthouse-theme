<?php
/**
 * The template for creating the emails.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @since 1.0.0
 */

define(EVENTS_URL, 'http://delandlighthouse.com/events/');
define(NEWS_URL, 'http://delandlighthouse.com/news/');
$start_date = getdate();
$end_date = getdate(mktime(0, 0, 0, date('m'), date('d') + 6, date('Y')));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="initial-scale=1.0"><!-- So that mobile webkit will display zoomed in -->
		<title>This Week at TLC</title>
		<style type="text/css">
			<!--
			html, body { margin:0; padding:0; background-color:#FFF; color:#333; font-family:Helvetica, sans-serif; }
			-->
			/* CSS Resets */
			.ReadMsgBody { width: 100%; background-color: #ffffff;}
			.ExternalClass {width: 100%; background-color: #ffffff;}
			.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100%;}
			body {-webkit-text-size-adjust:none; -ms-text-size-adjust:none;}
			body {margin:0; padding:0;}
			table {border-spacing:0;}
			table td {border-collapse:collapse;}
			ul {padding-left:25px;}
			li {padding-bottom:10px;}
			.yshortcuts a {border-bottom: none !important;}
			* {zoom:1;}
			a {color:#993300;text-decoration:none;}
			div, p, a, li, td { -webkit-text-size-adjust:none; } /* ios likes to enforce a minimum font size of 13px; kill it with this */
			p.month, p.date, p.start, p.end { margin-top: 0; margin-bottom: 5px; text-align: center; }
			p.month { color: #428bca; }
			p.date { color: #777; }
			p.permalink { text-align:center; } 
			@media all and (max-width: 640px) {
				/* The outermost wrapper table */
				table[class="t600o"] {
					width: 100% !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
					padding-left: 15px;
					padding-right: 15px;
				}
				/* The firstmost inner tables, which should be padded at mobile sizes */
				table[class="t600"] {
					width: 100% !important;
					padding-left: 0;
					padding-right: 0;
					padding-top: 15px !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
					margin: 0 !important;
				}
				/* Generic class for a table column that should collapse to 100% width at mobile sizes (with bottom padding) */
				td[class="ccollapse100pb"] {
					display: block !important;
					overflow: hidden;
					width: 100% !important;
					float: left;
					clear: both;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					padding-bottom: 20px !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Generic class for a table column that should collapse to 100% width at mobile sizes (with light bottom padding) */
				td[class="ccollapse100pbs"] {
					display: block !important;
					overflow: hidden;
					width: 100% !important;
					float: left;
					clear: both;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					padding-bottom: 5px !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Generic class for a table column that should collapse to 100% width at mobile sizes (with top padding) */
				td[class="ccollapse100pt"] {
					display: block !important;
					overflow: hidden;
					width: 100% !important;
					float: left;
					clear: both;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					padding-top: 20px !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Generic class for a table column that should collapse at mobile sizes (with side, top padding). Use when no parent table with side padding exists. */
				td[class="ccollapseautopt"] {
					display: block !important;
					overflow: hidden;
					width: auto !important;
					float: left;
					clear: both;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					padding-top: 20px !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Generic class for a table column that should collapse to 100% width at mobile sizes (with top, bottom padding) */
				td[class="ccollapse100p"] {
					display: block !important;
					overflow: hidden;
					width: 100% !important;
					float: left;
					clear: both;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					padding-top: 20px !important;
					padding-bottom: 20px !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Generic class for a table column that should collapse to 100% width at mobile sizes */
				td[class="ccollapse100"] {
					display: block !important;
					overflow: hidden;
					clear: both;
					width: 100% !important;
					float: left !important;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Generic class for a table within a column that should be forced to 100% width at mobile sizes */
				table[class="tcollapse100"] {
					width: 100% !important;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Forces an image to fit 100% width of its parent */
				img[class="responsiveimg"] {
					width: 100% !important;
					height: auto !important;
				}

				img.responsiveimg {
					width: 100% !important;
					height: auto !important;
				}

				/* Specific ID overrides */
				td[id="preferred-name"] {
					font-size: 16px !important;
				}
				td[id="week-at-tlc-wrap"] {
					padding-top: 5px !important;
				}
				td[id="week-at-tlc"] {
					font-size: 28px !important;
				}
				td[id="week-at-tlc-date"] {
					font-size: 21px !important;
					text-align: left !important;
					padding-bottom: 10px;
				}
				/* Weather overrides */
				br[class="linebreak"] {
					display: none !important;
				}
				table[id="weather"] {
					padding-top: 0 !important;
				}
				table[class="weather-col"] {
					width: 100% !important;
				}
				td[class="weather-icon-date"] {
					width: 40% !important;
					display: table;
					float: left;
				}
				span[class="weather-date"] {
					width: 85px;
					display: table-cell;
					text-align: center;
					vertical-align: middle;
				}
				img[class="weather-icon"],
				span[class="weather-icon"] {
					width: 30px !important;
					height: 30px !important;
					display: table-cell;
					vertical-align: middle;
					padding-left: 5px;
				}
				td[class="weather-temps"] {
					display: table;
					float: left;
					width: 60% !important;
				}
				span[class="temp"] {
					display: table-cell;
					height: 30px;
					width: 40px;
					vertical-align: middle;
					padding-left: 20px;
				}
				span[class="highlow"] {
					display: table-cell;
					height: 30px;
					vertical-align: middle;
				}
				/* Events overrides */
				span[class="event-date"] {
					font-size: 16px !important;
					font-weight: bold !important;
					padding-right: 0 !important;
				}
				a[class="view-day-events"] {
					font-size: 11px !important;
				}
				span[class="time-group-header"] {
					display: block;
					width: 100%;
					padding-bottom: 10px;
					font-size: 13px !important;
					font-weight: bold !important;
				}
				span[class="fallback-event-msg"] {
					font-size: 13px !important;
				}
				span[class="time"] {
					font-size: 12px !important;
				}
				div[class="event"] {
					margin-top: 3px;
					margin-bottom: 7px !important;
				}
				a[class="event-link"] {
					font-size: 13px !important;
				}
				/* More Events overrides */
				span[id="more-events"] {
					font-size: 18px !important;
				}
				table[id="footer"] {
					padding-top: 30px !important;
				}
			}
		</style>
	</head>
	<body bgcolor="#FFF">
		<table class="t600o" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" callspacing="0" style="width: 600px; margin:0 auto; background-color:#FFF;">
			<tr>
				<td id="week-at-tlc-wrap" style="padding-top:30px;border-bottom:1px solid #dddddd;">
					<table class="t600" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0; background-color:#FFF;">
						<tr>
							<td class="ccollapse100" id="week-at-tlc" style="width:365px;font-size:24px;font-weight:200;">
								This Week @ <span style="color:#428bca;font-weight:bold">The Lighthouse Church</span>
							</td>
							<td class="ccollapse100" id="week-at-tlc-date" style="width:150px;font-size:24px;font-weight:200;text-align:right">
								<?php 
								echo date('n/j', $start_date[0]) . '-' . date('n/j', $end_date[0]); ?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<?php include('includes/weekday-weather.php'); ?>

			<?php 
				$args = array(
					'category_name'  => 'News Story',
					'posts_per_page'     => 1,
				);

				$hl_post = get_posts( $args );

				if ( $hl_post ) :

			?>
			<tr>
				<td class="ccollapse100p" style="border-top:1px solid #ddd;border-bottom:1px solid #ddd;padding-top:15px;padding-bottom:15px;font-size:24px;font-weight:200;text-align:center">
					<?php echo $hl_post[0]->post_title; ?>
				</td>
			</tr>
			<tr>
				<td class="ccollapse100p">
					<?php 
						$src = wp_get_attachment_image_src(get_post_thumbnail_id( $hl_post[0]->ID), 'email-top-story'); 
						echo '<img src="' . $src[0] .'" style="border:none;" class="responsiveimg" />';
					?>
				</td>
			</tr>
			<tr>
				<td class="ccollapse100p">
					<p><?php echo $hl_post[0]->post_excerpt; ?></p>
					<p class="permalink"><a href="<?php echo get_permalink($hl_post[0]->ID); ?>">Read the full story!</a></p>
				</td>
			</tr>
			<?php
				endif;
			?>

			<?php
				$ue_scope = date("Y-m-d", $start_date[0]) . "," . date("Y-m-d", $end_date[0]);

				$ue_output = EM_Events::get( array (
						'limit' => 5,
						'category' => '-bible-studies',
						'scope' => $scope
					)
				);

				if ( $ue_output ) :
			?>

			<tr>
				<td class="ccollapse100p" style="border-top:1px solid #ddd;border-bottom:1px solid #ddd;padding-top:15px;padding-bottom:15px;font-size:24px;font-weight:200;text-align:center">
					Upcoming Events
				</td>
			</tr>

			<?php
				foreach ( $ue_output as $item ) { ?>
					<tr>
						<td style="padding-top:30px;border-bottom:1px solid #dddddd;">
							<table class="t600" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="50" style="width: 600px; margin:0; background-color:#FFF;">
								<tr>
									<td class="ccollapse100" style="width:100px;font-size:24px;font-weight:200;">
										<?php 
											$start_date = new DateTime($item->event_start_date);
											echo '<p class="month">' . $start_date->format('M') . '</p>';
											echo '<p class="date">' . $start_date->format('d') . '</p>';
										?>
									</td>
									<td class="ccollapse100" style="width:100px;font-size:14px;font-weight:200;">
										<?php
											$start_time = new DateTime($item->event_start_time);
											$end_time = new DateTime($item->event_end_time);
											echo '<p class="start">' . $start_time->format('h:i A') . ' - </p>';
											echo '<p class="end">' . $end_time->format('h:i A') . '</p>';
										?>
									</td>
									<td class="ccollapse100" style="width:450px;font-size:24px;font-weight:200;">
										<a class="event-link" href="<?php echo EVENTS_URL . $item->slug; ?>" style="font-size:18px;color:#222222;text-decoration:underline;">
											<?php echo $item->event_name; ?>
										</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				<?php } ?>

				<tr>
					<td style="padding-top:30px;padding-bottom:30px;border-bottom:1px solid #dddddd;text-align:center">
						<a href="<?php echo NEWS_URL; ?>">See More Events</a>
					</td>
				</tr>

				<?php endif;

				$bs_scope = date("Y-m-d", $start_date) . "," . date("Y-m-d", $end_date);

				$bs_output = EM_Events::get( array ( 
					'limit' => 5, 
					'category' => 'bible-studies', 
					'scope' => $scope 
					) 
				);

				if ( $bs_output ) :
			?>
			<tr>
				<td class="ccollapse100p" style="border-top:1px solid #ddd;border-bottom:1px solid #ddd;padding-top:15px;padding-bottom:15px;font-size:24px;font-weight:200;text-align:center">
					Bible Studies this Week
				</td>
			</tr>
			<?php 

				foreach ( $bs_output as $item ) { ?>
					<tr>
						<td style="padding-top:30px;border-bottom:1px solid #dddddd;">
							<table class="t600" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="50" style="width: 600px; margin:0; background-color:#FFF;">
								<tr>
									<td class="ccollapse100" style="width:100px;font-size:24px;font-weight:200;">
										<?php 
											$start_date = new DateTime($item->event_start_date);
											echo '<p class="month">' . $start_date->format('M') . '</p>';
											echo '<p class="date">' . $start_date->format('d') . '</p>';
										?>
									</td>
									<td class="ccollapse100" style="width:100px;font-size:14px;font-weight:200;">
										<?php
											$start_time = new DateTime($item->event_start_time);
											$end_time = new DateTime($item->event_end_time);
											echo '<p class="start">' . $start_time->format('h:i A') . ' - </p>';
											echo '<p class="end">' . $end_time->format('h:i A') . '</p>';
										?>
									</td>
									<td class="ccollapse100" style="width:450px;font-size:24px;font-weight:200;">
										<a class="event-link" href="<?php echo EVENTS_URL . $item->slug; ?>" style="font-size:18px;color:#222222;text-decoration:underline;">
											<?php echo $item->event_name; ?>
										</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				<?php } ?>
				<tr>
					<td style="padding-top:30px;padding-bottom:30px;border-bottom:1px solid #dddddd;text-align:center">
						<a href="<?php echo NEWS_URL; ?>">See More Bible Studies</a>
					</td>
				</tr>
			<?php endif; ?>
		</table>
	</body>
</html>