=== WP Automatic Updates ===
Contributors: ak.singla
Tags: automatic, background, updates, admin, plugin, core, theme
Requires at least: 3.7
Tested up to: 4.2.2
Stable tag: 1.1.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Configure WordPress updates settings through UI (User Interface).

== Description ==

An easy-to-use plugin settings panel where you can set automatic updates options for themes, plugins, and core udpates. 

= Features =

* Show/hide Updates notification
* Use default Wordpress behaviors
* Enable/Disable Updates capabilities to Administrator users
* Set Major Core Automatic Background Updates
* Set Minor Core Automatic Background Updates
* Set Plugin Automatic Background Updates
* Set Theme Automatic Background Updates
* Set Translation files Automatic Background Updates
* Set Auto Core Update Notification emails.
* Add Updates panel (Settings > Updates)
* Contextual Help
* Translation MO/PO files
* Multisite
* Desactivate restore default WordPress behavior
* Uninstall restore default WordPress behavior

= Languages =

* English
* French

== Installation ==

1. Download and extract plugin files to wp-content/plugin directory.
2. Activate the plugin through the WordPress admin interface.

You will find 'Updates' menu in your WordPress Settings panel.

== Upgrade Notice ==

* Fixed: Grammatical corrections
* Fixed notices faced with WP_debug
* Like "undefined index" for "minor", "major" and "translation updates"

== Screenshots ==

1. Plugin Settings that you can change

== Frequently Asked Questions ==

= I can't activate WP Automatic Updates =

* WP Automatic Updates could be activated on WordPress 3.7.x and more. If you are using an older version, WP Automatic Updates can't be activated.

== Changelog ==

= 1.1.3 =
* Fixed: Grammatical corrections in the admin section of the plugin.

= 1.1.2 =
* Improved admin options page to look more appealing

= 1.1.1 =
* Default values changed to have plugins updated automatically

= 1.1 =
* Fixed notices faced with debug mode enabled

= 1.0.0 =
* Initial version

* Code improvement

* Fix : Default Auto Core Update Notification emails setting.

* Feature : Auto Core Update Notification emails.

* Prevent activation on WordPress 3.6.x (and less)
* Fix : Settings Updates panel CSS is limitated to this panel

* Fix : previous plugin settings on update

* Deactivate restore default WordPress behavior
* Settings Updates panel CSS

* Multisite
* Optimize admin_init actions
* Fix activate/unactivate plugin loss of previously saved settings
* Translation improvement