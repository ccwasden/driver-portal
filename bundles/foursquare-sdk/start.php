<?php
/**
 * @author Han Lin Yap < http://yap.nu/ >
 * @copyright 2013 yap.nu
 * @license http://creativecommons.org/licenses/by-sa/3.0/
 * @package Facebook SDK (Laravel Bundle)
 * @version 1.1 - 2013-01-22
 */

Autoloader::map(array(
	'FoursquareApi' 	=> Bundle::path('foursquare-sdk').'foursquare/FoursquareAPI.class.php',
	'Foursquare' 		=> Bundle::path('foursquare-sdk').'foursquare/foursquare.php',
));

Laravel\IoC::singleton('foursquare-sdk', function()
{
    $config = array();
	$config['appId'] = Config::get('foursquare.app_id', Config::get('foursquare-sdk::foursquare.app_id'));
	$config['secret'] = Config::get('foursquare.secret', Config::get('foursquare-sdk::foursquare.secret'));

	return new FoursquareApi($config['appId'], $config['secret']);
});
