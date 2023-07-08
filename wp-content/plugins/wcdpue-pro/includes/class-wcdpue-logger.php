<?php

class Logger {

	public static function create_log( $level = 0, $message, $where = 'A Site Specific plugin', $log_name = 'log' ) {

		switch ( $level ) {
			case 0:
				$level = 'Info';
				break;
			case 1:
				$level = 'Alert';
				break;
			case 2:
				$level = 'Warning';
				break;
			case 3:
				$level = 'Error';
				break;
			default:
				$level = 'Info';
				break;
		}

		if ( ! is_string( $message ) ) {
			$message = print_r( $message, true );
		}

		$now                 = new Datetime( 'now', new DateTimeZone( 'America/St_Lucia' ) );
		$formatted_date_time = $now->format( 'd-M-Y h:i:s' );
		$log_message         = '[' . $formatted_date_time . '][' . $where . ']' . $level . ': ' . $message . PHP_EOL;

		$path = plugin_dir_path( __FILE__ ) . $log_name . '.txt';
		// without final param this will not prepend but rather overwrite the file.
		file_put_contents( $path, $log_message );

	}

}
