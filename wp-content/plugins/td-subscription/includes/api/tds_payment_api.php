<?php

class tds_payment_api {

	static function get_payment_subscription($method = '') {

		$subscription = '';

		switch ($method) {
			case 'paypal':
				$subscription = 'apply for paypal subscription';
				break;
		}

		return $subscription;
	}
}
