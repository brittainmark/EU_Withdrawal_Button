# Changelog

## [1.0.0] - 2026-10-05

First release.

- A "Withdraw From Contract Here" button in the footer of every page, with no template edits: inside the footer through `NOTIFY_FOOTER_AFTER_NAVSUPP` (2.1.0+, ZCA Bootstrap 3.8.0), else just before `</body>` through `NOTIFY_FOOTER_END` and moved up under the footer links.
- The withdrawal page (`main_page=eu_withdrawal`): name, order and email, an optional list of items, then a review screen with Confirm Withdrawal. No account needed; a logged-in customer's details and recent orders are filled in. One Page Checkout's guest placeholder is never treated as a customer.
- The acknowledgment of receipt (Article 11a(4)) with the statement and its date and time in the Store Time Zone, and the store's notice, reply-to the customer. Both saved after the statement, so a mail failure loses nothing; a failure is recorded and can be resent.
- Order matching: a customer's own order by number, anyone else's by number and email. Unmatched statements are saved and flagged, never refused.
- The spam trap holds a statement: saved, the store told, but nothing emailed to the address given and nothing written to the order until staff send the acknowledgment.
- A matched order's history note is hidden from the customer; an optional customer-visible line and status change.
- Customers > Withdrawals: list, filters, search, detail, status, staff note, Send Acknowledgment.
- Show Withdrawal Button To: All Visitors, or Selected Countries (EU 27 + IS, LI, NO by default) by the order's country, the customer's default address or a server variable (Cloudflare's by default). Unknown shows the button; the page always answers.
- The two legal labels, verbatim from the directive, for English, Dutch, Finnish, French, German, Italian and Spanish, chosen by language code. Other text falls back to English for a store language with no translation.
- Preview Email definitions for both emails.

[1.0.0]: https://github.com/dbltoe/EU_Withdrawal_Button/releases/tag/v1.0.0
