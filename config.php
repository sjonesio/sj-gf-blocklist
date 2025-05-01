<?php
/**
 * Config.
 *
 * The below defines can be used in wp-config.php above the wp-settings.php include.
 *
 * define( 'SJGFBLOCKLIST_URLS', [ 'tinyurl.com', 'bit.ly' ] );
 * define( 'SJGFBLOCKLIST_EMAILS', [ 'test@test.ru' ] );
 * define( 'SJGFBLOCKLIST_EXTENSIONS', [ 'ru', 'cn' ] );
 *
 * @package sj-gf-blocklist
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return [
	'blocked_urls' => defined( 'SJGFBLOCKLIST_URLS' ) && is_array( SJGFBLOCKLIST_URLS )
		? SJGFBLOCKLIST_URLS
		: [
			'tinyurl.com',
			'bit.ly',
			'shorturl.at',
			't.me',
		],

	'blocked_emails' => defined( 'SJGFBLOCKLIST_EMAILS' ) && is_array( SJGFBLOCKLIST_EMAILS )
		? SJGFBLOCKLIST_EMAILS
		: [
			'test@test.com',
			'blah@blah.com',
		],

	'blocked_extensions' => defined( 'SJGFBLOCKLIST_EXTENSIONS' ) && is_array( SJGFBLOCKLIST_EXTENSIONS )
		? SJGFBLOCKLIST_EXTENSIONS
		: [
			'ru',
		],
];
