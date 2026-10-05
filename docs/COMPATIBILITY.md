# Compatibility

## Versions

- Zen Cart 1.5.8, 2.0, 2.1, 2.2, 2.3 and 3.0.0 from one codebase.
- PHP 7.4 through 8.5. The source parses on 7.4 and is deprecation-clean on 8.5. mbstring is used when present, not required.
- Encapsulated: installs, upgrades and uninstalls from Plugin Manager; no core or template file is changed.

## Templates

- responsive_classic and template_default from 2.1.0, and ZCA Bootstrap 3.8.0, call `NOTIFY_FOOTER_AFTER_NAVSUPP` inside their footer: the button sits under the footer links.
- 1.5.8 and 2.0 templates don't: the button renders at `NOTIFY_FOOTER_END`, just before `</body>`, and a few lines of script move it up under `#navSuppWrapper` when the page has one.
- `NOTIFY_FOOTER_END` fires even on pages that turn the footer off, so the button is never missing.

## One Page Checkout

OPC's guests share one placeholder customer (`CHECKOUT_ONE_GUEST_CUSTOMER_ID`); `OnePageCheckout::startGuestOnePageCheckout()` puts its id in `$_SESSION['customer_id']`. The plugin never treats that id as a logged-in customer, so a guest never sees the placeholder's orders (every guest's).

## Things the code relies on, checked against every branch

- Zen Cart memoizes every SELECT for the length of a request and writes don't clear it, so every lookup the plugin makes passes `Execute()`'s `removeFromQueryCache` argument.
- The storefront's CSRF check applies to requests with an `action` parameter: every form the plugin posts carries `action` and the session token.
- `zen_mail()` answers `''` when sent, error text when it failed, and `false` when it sent nothing (Send E-Mails off, a skipped module, or a line break in a name, address or subject); the plugin records `false` as not sent, and strips line breaks from the name and email it stores.
- `zen_update_orders_history()` is in `includes/functions/functions_osh_update.php`, loaded on both sides by `config.core.php`. `notify_customer` -1 hides a note from the customer; 0 shows it on their order page.
- A plugin's `extra_definitions` load only from the session language's folder; there's no English fallback, so the plugin supplies one.
- `orders.delivery_country` and `billing_country` hold the country's name; `countries.countries_name` is single-language in every version.

## Tested

- Harness suite on PHP 7.4, 8.0, 8.1, 8.2, 8.3, 8.4 and 8.5, against clean checkouts of every branch.
- Spikes on a Zen Cart 2.2.2 store (responsive_classic, One Page Checkout 2.7.0): the footer button on every page at desktop and phone widths and the 1.5.8/2.0 fallback; guest, logged-in, unmatched, wrong-email, spam-trap, Change Details, Back and replayed-confirm cases; the acknowledgment and notice; the order note; the country rule for logged-in customers, order pages and guest country codes.
