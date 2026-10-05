# Configuring EU Withdrawal Button

Configuration > EU Withdrawal Button:

| Setting | Default | What it does |
|---|---|---|
| Enable the Withdrawal Button? | true | The footer button and the withdrawal page. Off, the page sends visitors to the home page. |
| Show Withdrawal Button To | All Visitors | All Visitors, or Selected Countries. Only the button is hidden; the page always answers. |
| Selected Countries | EU 27, IS, LI, NO | Two-letter codes, comma-separated. |
| Country Server Variable | HTTP_CF_IPCOUNTRY | The server variable with a guest's country (Cloudflare's header). Others: GEOIP_COUNTRY_CODE, MM_COUNTRY_CODE. |
| Who the Page Is For (Optional) | blank | A line above the form. |
| Store Time Zone | blank (PHP's) | The zone of the submission time in the acknowledgment, for example Europe/Madrid. |
| Notify E-Mail Address | blank (store owner) | Who gets the store's notice. Several, comma-separated. |
| Orders to List (Days) | 90 | A logged-in customer picks from their orders of the last this-many days. 1 to 3650. |
| Order Status on Withdrawal | 0 (unchanged) | A matched order moves to this status; no email to the customer. |
| Show the Customer a Note on Their Order? | false | Adds "Withdrawal received on (date and time)." to the customer-visible history. |
| Keep Done Withdrawals (Days) | 0 (keep) | Done statements are deleted after this many days. |
| Delete Withdrawal Records on Uninstall? | false | Whether uninstalling deletes the statements. |

## Who sees the button

With Selected Countries, the visitor's country is, first answer wins: the order's delivery (else billing) country on a customer's order page; a logged-in customer's default address; the Country Server Variable; unknown, which shows the button. Without Cloudflare or a host GeoIP module, guests' country is always unknown.
