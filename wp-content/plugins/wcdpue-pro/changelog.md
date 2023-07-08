### v2.0.10
- [Fix] Plugin would not work on WordPress versions lower than 5.5 because of undefined wp_get_environment_type() function error.
### v2.0.9
- [New] {product_table} magic tag; output a product table within your update email. [Learn More.](https://wcdpue.com/available-magic-tags/)
- [Fix] {what_changed} magic tag did not work for variable products.
- [Info] Tested on WP 5.8
- [Info] Tested on WC 5.6
### v2.0.8
- [New] What Changed textarea added to the Product Update metabox. Let customers know what changed in your latest update.
- [Info] Tested on WC 5.4

### v2.0.7
- [New] Added support for WooCommerce Subscription Products.
- [Fix] Test emails weren't working for WordPress installations installed in subfolders.
- [Info] Tested on WC 5.3

### v2.0.6
- Added option to show unsubscibe button on user accounts

### v2.0.5
- Fix constant name issue with flatsome theme.

### v2.0.4
- Better differentiate between guest and customer orders
- Handle cases where wc_product does not return an object
- Prevent sending emails with blank downloads if the option to include downloads in emails is checked but no download is returned

### v2.0.3
- New: Added basic Dokan Marketplace Plugin support. Product Vendors can send product update emails to their customers if the option is checked in WCDPUE's settings.
- New: Option to prevent plugin from sending product update emails for guest purchases.
- Info: Tested on WP 5.6
- Info: Tested on WC 4.8

### v2.0.2
- Fix: Don't output duplicate registered schedules.
- Fix: Minor silent PHP errors.
- Info: Tested on WP 5.5
- Info: Tested on WC 4.5

### v2.0.1

- Change: Admins can now either allow customers to either opt-in, or opt-out of update emails when they're checking out. Admins can also turn off the option.
- Change: Moved opt-in/opt-out preference above checkout button.
- Info: Tested on WP 5.4
- Info: Tested on WC 4.1
- Info: Added some Spanish translations

### v2.0.0

- New: Option to send test email to admin
- New: Allow customers to opt out of receiving update emails
- New: Checks added to determine whether or not there might be problems with Cron on a website.
- Change: UI improvements
- Info: Rewrote plugin in OOP PHP
- Info: Made plugin text strings translatable
- Info: Tested on WP 5.3
- Info: Tested on WC 3.8

### v1.4.1

-New: reintroduced direct download magic tag {download_url} (user will not have access to new downloads they didn't already buy, this is a WC limitation)
-New: {download_name} magic tag (shows the updated download name(s))
-New: {full_name} magic tag (customer full name)
-Fix: show welcome screen only once
-Fix: Plugin's metabox will no longer show on non-downloadable products
-Info: Compatible with WooCommerce 3.5

### v1.4.0

-New: Product image magic tag {product_img}.
-New: Log feature.
-Tweak: Removed immediate update sending feature by default, option can be turned on in settings page.
-Tweak: Settings page redesign.
-Fix: wrong link to settings page on the welcome page

### v1.3.1

-Fix: Compatible with WooCommerce 3.2

### v1.3.0

-New: Clear queue button on settings page
-Fix: Scheduled emails were not being cleared from queue.

### v1.2.0

-Fix: Issue where plugin would count duplicate download permissions.
-Tweak: Changed "Buyers with access" text to "Unique download access count".
-Tweak: Removed {download_url} magic tag.
-Tweak: Removed {download_trim} magic tag.
-Tweak: Plugin will only send 1 email per buyer on product update. Even though a buyer has multiple active download permissions from purchasing the product multiple times; they will only receive one email about the update.
-Tested on WC 3.0

### v1.1.0

- New: 2 additional Email variables for direct download link: {download_url} and direct download link without protocol: {download_url_trim}
- New: Subject field now supports email variables.
- New: Setting to use default WooCommerce email styles for emails.
- New: Added admin notice for review.
- New: Plugin shows warning admin notice if WooCommerce is not activated.
- New: Variable downloadable products now show how many buyers each variation has next to the Variation ID
- Tweak: Changed settings page menu title to "WCDPUE Pro".
- Tweak: Code optimization.
- Fix: Email variables with trim now work on https sites also.
- Info: Tested with WP 4.7

### v1.0.0

-Initial release
