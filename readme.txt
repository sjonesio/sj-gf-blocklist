=== SJ Gravity Forms Blocklist ===

Contributors: sjonesio
Donate link: https://sjones.digital
Tags: gravity forms, blocklist, blacklist, email
Tested up to: 6.8
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Blocks specified website domains and email addresses from being submitted to Gravity Forms.


== Description ==

SJ Gravity Forms Blocklist allows you to set specific website domains, email addresses and email domain extensions that you do not want to be able to submit posts. 
This can act as an additional barrier to help block Gravity Forms spam.
Currently this is automatically added on all forms, see "To Do" section below for roadmap.


There is no Admin Options page, but you can configure everything from your wp-config.php file by adding the following before:
/* That's all, stop editing! Happy publishing. */

E.g.

define( 'SJGFBLOCKLIST_URLS', [ 'tinyurl.com', 'bit.ly' ] );
define( 'SJGFBLOCKLIST_EMAILS', [ 'test@test.ru' ] );
define( 'SJGFBLOCKLIST_EXTENSIONS', [ 'ru', 'cn' ] );
/* That's all, stop editing! Happy publishing. */


== To Do ==

1) Allow configuration of validation message.
2) Validation message translatable.
3) Create a UI in WP Admin.
4) Allow to configure form ID.


== Installation ==

If downloading from github then you will need to unzip the file and rename the folder to sj-gf-blocklist before moving it to your plugins directory.


== Changelog ==

= 1.0.0 =

Start of plugin.