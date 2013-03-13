# Foursquare SDK - Laravel Bundle

A simple Laravel wrapper for https://github.com/stephenyoung/php-foursquare

## Installation

### Aritsan

	php artisan bundle:install foursquare-sdk

### Bundle Registration

Add the following to your **application/bundles.php** file:

	'foursquare-sdk' => array('auto' => true),

## Configuration

Add the following to your **application/config/foursquare.php** file:

	return array(
		'app_id' => '',
		'secret' => '',
	);
	
## Usage

	Foursquare::SetAccessToken('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
	$self = Foursquare::GetPrivate('users/self');	
	
OR

	$foursquare = IoC::resolve('foursquare-sdk');
	$foursquare->SetAccessToken('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
	$self = $foursquare->GetPrivate('users/self');	

Fork of https://github.com/stephenyoung/php-foursquare