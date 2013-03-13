<?php

	class Foursquare {

		/**
		 * Dynamicly call function on Foursquare SDK
		 * @param  string $method    Method name for Foursquare SDK
		 * @param  array $parameters Paramaters to send with call.
		 * @return mixed             Result from Foursquare SDK
		 */
		public static function __callStatic($method, $parameters) {
			try {
				$foursquare = IoC::resolve('foursquare-sdk');
				return call_user_func_array(array($foursquare,$method), $parameters);
			} catch (Exception $e) {
				return false;
			}
		}

	}