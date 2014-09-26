<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @since 1.0.0
 */
get_header();

function cleanInput($input) {
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	return $input;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$firstname = cleanInput($_POST['pg_billto_postal_name_first']);
	$lastname = cleanInput($_POST['pg_billto_postal_name_last']);
	$address = cleanInput($_POST['pg_billto_postal_street_line1']);
	$address2 = cleanInput($_POST['pg_billto_postal_street_line2']);
	$city = cleanInput($_POST['pg_billto_postal_city']);
	$state = cleanInput($_POST['pg_billto_postal_stateprov']);
	$zip = cleanInput($_POST['pg_billto_postal_postalcode']);
	$cardNum = cleanInput($_POST['pg_payment_card_number']);
	$cardName = cleanInput($_POST['pg_payment_card_name']);
	$cardType = cleanInput($_POST['pg_payment_card_type']);
	$expMonth = cleanInput($_POST['pg_payment_card_expdate_month']);
	$expYear = cleanInput($_POST['pg_payment_card_expdate_year']);
	$apiLoginID = 'esT77y1AC8';

	$fields = array(
		'pg_billto_postal_name_first' => $firstname,
		'pg_billto_postal_name_last' => $lastname,
		'pg_billto_postal_street_line1' => $address,
		'pg_billto_postal_street_line2' => $address2,
		'pg_billto_postal_city' => $city,
		'pg_billto_postal_stateprov' => $state,
		'pg_billti_postal_postalcode' => $zip,
		'pg_payment_card_number' => $cardNum,
		'pg_payment_card_name' => $cardName,
		'pg_payment_card_type' => $cardType,
		'pg_payment_card_expdate_month' => $expMonth,
		'pg_payment_card_expdate_year' => $expYear,
		'pg_api_login_id' => $apiLoginID
	);	

	http_redirect('https://swp.paymentgateway.net/default.aspx', $fields);


} else {

?>
	<div class="container">
		<div class="row">
			<div id="primary" <?php bavotasan_primary_attr(); ?>>
				<h1>Tithes and Offerings</h1>
				<div class="col-md-12">
					<form METHOD="POST" ACTION="<?php the_permalink(); ?>">
						<?php $apiLoginId = 'esT77y1AC8'; ?>
						<h3>Billing Information</h3>
						<div class="row">
							<div class="col-md-3">
								<div class='form-group'>
									<label for='tb_firstname' class='control-label'>First Name</label>
									<input name='pg_billto_postal_name_first' type='text' id='tb_firstname' class='form-control' />
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for='tb_lastname' class='control-label'>Last Name</label>
									<input name='pg_billto_postal_name_last' type='text' id='tb_lastname' class='form-control' />
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="tb_address" class="control-label">Address</label>
									<input name='pg_billto_postal_street_line1' type='text' id='tb_address' class='form-control' />
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="tb_address1" class="control-label">Apt/Suite<label>
									<input name='pg_billto_postal_street_line2' type="text" id="tb_address2" class="form-control" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="tb_city" class="control-label">City</label>
									<input name='pg_billto_postal_city' type="text" id="tb_city" class="form-control" />
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="ddl_state" class="control-label">State</label>
									<select name='pg_billto_postal_stateprov' id="ddl_state" class="dropdown form-control">
										<option value="AL">Alabama</option>
										<option value="AK">Alaska</option>
										<option value="AZ">Arizona</option>
										<option value="AR">Arkansas</option>
										<option value="CA">California</option>
										<option value="CO">Colorado</option>
										<option value="CT">Connecticut</option>
										<option value="DE">Delaware</option>
										<option value="DC">District Of Columbia</option>
										<option value="FL">Florida</option>
										<option value="GA">Georgia</option>
										<option value="HI">Hawaii</option>
										<option value="ID">Idaho</option>
										<option value="IL">Illinois</option>
										<option value="IN">Indiana</option>
										<option value="IA">Iowa</option>
										<option value="KS">Kansas</option>
										<option value="KY">Kentucky</option>
										<option value="LA">Louisiana</option>
										<option value="ME">Maine</option>
										<option value="MD">Maryland</option>
										<option value="MA">Massachusetts</option>
										<option value="MI">Michigan</option>
										<option value="MN">Minnesota</option>
										<option value="MS">Mississippi</option>
										<option value="MO">Missouri</option>
										<option value="MT">Montana</option>
										<option value="NE">Nebraska</option>
										<option value="NV">Nevada</option>
										<option value="NH">New Hampshire</option>
										<option value="NJ">New Jersey</option>
										<option value="NM">New Mexico</option>
										<option value="NY">New York</option>
										<option value="NC">North Carolina</option>
										<option value="ND">North Dakota</option>
										<option value="OH">Ohio</option>
										<option value="OK">Oklahoma</option>
										<option value="OR">Oregon</option>
										<option value="PA">Pennsylvania</option>
										<option value="RI">Rhode Island</option>
										<option value="SC">South Carolina</option>
										<option value="SD">South Dakota</option>
										<option value="TN">Tennessee</option>
										<option value="TX">Texas</option>
										<option value="UT">Utah</option>
										<option value="VT">Vermont</option>
										<option value="VA">Virginia</option>
										<option value="WA">Washington</option>
										<option value="WV">West Virginia</option>
										<option value="WI">Wisconsin</option>
										<option value="WY">Wyoming</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="tb_zip" class="control-label">Zip</label>
									<input name='pg_billto_postal_postalcode' type="text" id="tb_zip" class="form-control" />
								</div>
							</div>
						</div>
						<h3>Payment Information</h3>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="tb_ccn" class="control-label">Credit Card Number</label>
									<input name='pg_payment_card_number' type="text" id="tb_ccn" class="form-control" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="tb_cardName" class="control-label">Name of Card</label>
									<input name='pg_payment_card_name' type='text' id="tb_cardName" class="form-control" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="ddl_cardType" class="control-label">Credit Card Type<label>
									<select name='pg_payment_card_type' type='text' class='dropdown form-control'>
										<option value="visa">Visa</option>
										<option value="mast">Master Card</option>
										<option value="disc">Discover</option>
										<option value="amer">American Express</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="ddl_expMonth" class="control-label">Expiration Month</label>
									<select name='pg_payment_card_expdate_month' type='text' class='dropdown form-control'>
										<option value="01">01</option>	
										<option value="02">02</option>
										<option value="03">03</option>
										<option value="04">04</option>
										<option value="05">05</option>
										<option value="06">06</option>
										<option value="07">07</option>
										<option value="08">08</option>
										<option value="09">09</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="ddl_expYear" class="control-label">Expiration Year</label>
									<select name='pg_payment_card_expdate_year' type='text' class='dropdown form-control'>
										<option value='2014'>2014</option>
										<option value='2015'>2015</option>
										<option value='2016'>2016</option>
										<option value='2017'>2017</option>
										<option value='2018'>2018</option>
										<option value='2019'>2019</option>
										<option value='2020'>2020</option>
									</select>
								</div>
							</div>
						</div>
						<input type='hidden' name='pg_api_login_id' value='<?php echo $apiLoginId; ?>' />
						<div class="row">
							<div class="col-md-3">
								<input type="submit" class="btn btn-lg btn-primary"/>
							</div>
						</div>
					</form>
				</div>
			</div>
			<?php //get_sidebar(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>
