<?php

/****************ENQUEING STYLE IN CHILD THEME*********************/
// add_action('wp_enqueue_scripts', 'enqueue_parent_styles');
// function enqueue_parent_styles()
// {
// 	wp_enqueue_style('parent-style', get_stylesheet_directory_uri() . '/style.css');
// }


function add_numbers($a, $b)
{
	return $a + $b;
}

function register($data)
{
	// Extract data
	$first_name = $data['first_name'];
	$last_name = $data['last_name'];
	$email_address = $data['email_address'];
	$password = $data['password'];
	$confirm_password = $data['confirm_password'];
	$address_line1 = $data['address_line1'];
	$city = $data['city'];
	$postal_code = $data['postal_code'];
	$country = $data['country'];

	// Validate data
	if (empty($first_name) || empty($last_name) || empty($email_address) || empty($password) || empty($confirm_password) || empty($address_line1) || empty($city) || empty($postal_code) || empty($country)) {
		throw new Exception('All fields are required.');
	}

	if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
		throw new Exception('Invalid email address.');
	}

	if ($password !== $confirm_password) {
		throw new Exception('Passwords do not match.');
	}

	if (!is_numeric($postal_code)) {
		throw new Exception('Postal code should be a number.');
	}


	// Registration logic here

	return true;
}
