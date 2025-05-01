<?php
/**
 * Checks Gravity Forms fields against the specified blocklist.
 *
 * @package sj-gf-blocklist
 */

namespace SJGFBLOCKLIST;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Blocker
 *
 * Integrates with the `gform_field_validation` filter and applies
 * logic to detect disallowed values in submitted form fields,
 * preventing spam.
 */
class Blocker {

	/**
	 * Configuration array.
	 *
	 * @var array
	 */
	protected static $config;

	/**
	 * Constructor.
	 */
	public function __construct() {
		self::$config = include SJGFBLOCKLIST_PLUGIN_DIR . 'config.php';

		add_filter( 'gform_field_validation', array( $this, 'sjgfblocklist_blocker' ), 10, 4 );
	}

	/**
	 * Validates form fields for blocked URLs and email addresses.
	 *
	 * @param array  $result The result array containing validation status and message.
	 * @param string $value  The submitted field value.
	 * @param array  $form   The form object.
	 * @param object $field  The field object.
	 * @return array Updated result array after validation.
	 */
	public static function sjgfblocklist_blocker( $result, $value, $form, $field ) {

		// Load the config file if not already.
		if ( empty( self::$config ) ) {
			new self();
		}

		if ( is_array( $value ) ) {
			$value = implode( ' ', $value );
		}

		$blocked_urls       = self::$config['blocked_urls'] ?? [];
		$blocked_emails     = self::$config['blocked_emails'] ?? [];
		$blocked_extensions = self::$config['blocked_extensions'] ?? [];

		// Block listed URLs.
		if ( ! empty( $blocked_urls ) ) {
			foreach ( $blocked_urls as $blocked_url ) {
				// Check the full domain.
				$blocked_url_pattern = '/(^|\s|[^\w])' . preg_quote( $blocked_url, '/' ) . '($|\s|[^\w])/i';

				if ( preg_match( $blocked_url_pattern, $value ) ) {
					$result['is_valid'] = false;
					$result['message']  = 'The URL you entered is not allowed. Please use a different link.';
					return $result;
				}
			}
		}

		// Check if the field is an email field.
		if ( 'email' === $field->type ) {
			$email = trim( strtolower( $value ) );

			// Block emails with specified domain extensions.
			if ( ! empty( $blocked_extensions ) ) {
				foreach ( $blocked_extensions as $ext ) {
					if ( preg_match( '/@[^@]+\.' . preg_quote( $ext, '/' ) . '$/i', $email ) ) {
						$result['is_valid'] = false;
						$result['message']  = 'Email addresses with this domain extension are not allowed.';
						return $result;
					}
				}
			}

			// Block specific email addresses.
			if ( ! empty( $blocked_emails ) ) {
				// Make sure only one email is used when a confirmation field is included.
				$single_email = strtolower( trim( explode( ' ', $value )[0] ) );

				$blocked_emails_lower = array_map( 'strtolower', $blocked_emails );

				// Compare the submitted email with the blocked ones.
				if ( in_array( $single_email, $blocked_emails_lower, true ) ) {
					$result['is_valid'] = false;
					$result['message']  = 'This email address is not allowed.';
					return $result;
				}
			}
		}

		return $result;

	}

}
