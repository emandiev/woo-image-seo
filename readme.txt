=== Woo Image SEO ===
	Contributors: emandiev
	Tags:  WooCommerce, Woo, Woo SEO, product alt, product seo
	Requires PHP: 5.4
	Stable tag: 1.2.3
	Requires at least: 4.1
	Tested up to: 5.6
	License: GPLv3 or later
	License URI: https://www.gnu.org/licenses/gpl-3.0.html

	Boost your WooCommerce SEO and get more traffic to your store! This plugin will add alt tags and title attributes to all product images using the product's name, category or tag (customizable).

== Description ==

"Woo Image SEO" will boost your store's SEO by automatically adding "alt" and "title" attributes to your product's images.<br />
No configuration is required.<br />
However, you can choose to customize the automatic attributes using the attribute builder.<br />
It lets you build a dynamic attribute from the product's title, category, tag, or custom text in any order.<br />
This plugin works only with the <a href="https://wordpress.org/plugins/woocommerce/">WooCommerce</a> plugin.<br />

== Installation ==

1. Visit <strong>Plugins > Add New</strong>
2. Search for "<strong>Woo Image SEO</strong>"
3. Download and Activate the plugin.

== Frequently Asked Questions ==

= What are the requirements? =

The WooCommerce plugin by Automattic.

= What are image "alt" tags or attributes? =

Alt text, also known as "alt attributes" or "alt tags", are used in HTML to describe the contents of an image.
Adding alternative text to photos is a principle of web accessibility. Visually impaired users using screen readers will be read an alt attribute to better understand an on-page image.
Alt tags will be displayed in place of an image if an image file cannot be loaded.
Alt tags provide better image context/descriptions to search engine crawlers, helping them to index an image properly.

= Why should I care? =

Adding appropriate alt attributes will improve your SEO. Better ranking should lead to more traffic!

= What will the plugin actually do? =

The plugin will use each product's title (name) to add alt and title attributes to the product's images.
Example:
You have a product called "Amazing Shirt".
The plugin's images will get alt="Amazing Shirt" and title="Amazing Shirt".

You can also enable/disable the generation of each attribute and choose whether to allow for user-specified attributes by going to WooCommerce -> Woo Image SEO.
You can also customize the way this plugin creates attributes.
For exmple you may want to include each product's category in the alt tags, or even it's tag.

Your actual files or database won't be modified.
Once you disable the plugin, the automatically generated attributes will be gone.

= Will this plugin affect the performance in a bad way? =

No.
The plugin will not cause any noticeable slowdown.
It's designed to help improve your website's SEO.
The plugin won't load any additional files.

= Any other recommendations? =

Only if you are using the Divi Builder and wish to improve your loading speed, performance, PageSpeed Insights score, etc.
<a href="https://wordpress.org/plugins/responsive-divi-backgrounds/">Responsive Divi Backgrounds</a>
<a href="https://wordpress.org/plugins/lazy-load-divi-slider-backgrounds/">Lazy Load Divi Slider Backgrounds</a>
<a href="https://wordpress.org/plugins/lazy-load-divi-section-backgrounds/">Lazy Load Divi Section Backgrounds</a>

== Changelog ==

= 1.0.0 =
* 21/12/2018:
Initial release;

= 1.0.1 =
* 11/3/2019:
Code improvements.
The plugin will no longer generate PHP notices.

= 1.0.2 =
* 18/8/2020:
Improved settings page.
Prepare for WordPress 5.5

= 1.1.0 =
* 19/12/2020:
First major update!
Added the ability to use your custom texts in the attribute builder.
Improved settings page styling, help texts.
Fixed a few minor bugs.
Added full support for WordPress 5.6

= 1.2.0 =
* 01/24/2021:
Added the ability to append image numbers (indexes) to attributes.
Added more social share links.
Improved settings page styling.

= 1.2.1 =
* 01/25/2021:
Fix PHP notice

= 1.2.2 =
* 04/12/2021:
Remove deprecated jQuery code.
Add WooCommerce version requirements.
Add Russian translation.
Add Bulgarian translation.
Add help text in media library modal.
Improve settings page styling.

= 1.2.3 =
* 05/18/2021:
Fix possible JS errors in admin dashboard.
Ensure WooCommerce 5.3 compatibility.
