# Customizing EU Withdrawal Button

## Wording

Every word of the page and both emails is in
`zc_plugins/EuWithdrawalButton/v1.0.0/catalog/includes/languages/english/extra_definitions/lang.eu_withdrawal.php`.
Copy a constant into an override language file to change it. The admin text is in the same path under `admin/`.

That English file is the single source: Zen Cart loads a plugin's language files only from the folder of the session's language, with no English fallback, so the plugin fills any constant a language doesn't define from it.

## The two legal labels

`EU_WITHDRAWAL_LABEL_LINK` and `EU_WITHDRAWAL_LABEL_CONFIRM`. The law fixes the words ("withdraw from contract here", "confirm withdrawal", or an unambiguous corresponding formulation). For a session whose language code is `de`, `es`, `fi`, `fr`, `it` or `nl` the plugin uses the directive's own wording (`EuWithdrawalCore::LEGAL_LABELS`), unless that language's own file defines the constant.

## Translating

Copy the English file to `catalog/includes/languages/YOUR_LANGUAGE/extra_definitions/lang.eu_withdrawal.php` inside the plugin's folder and translate the values. Leave out the two label lines to keep the directive's wording.

## The page

Copy `catalog/includes/templates/default/templates/tpl_eu_withdrawal_default.php` into your template's `templates` folder. Change its look freely; keep the Confirm Withdrawal button's words.

## The button

The footer button's markup and style come from `EuWithdrawalCore::buttonHtml()`. Its classes are `euw-wrap` and `euw-btn`; a store stylesheet can restyle them (keep it prominent, as the law asks).

## Hooks the plugin uses

| Notifier | Where | Why |
|---|---|---|
| `NOTIFY_FOOTER_AFTER_NAVSUPP` | footer, under its links (2.1.0+) | the button inside the footer |
| `NOTIFY_FOOTER_END` | just before `</body>` (every version) | the button where the first hook doesn't fire |
| `NOTIFY_EMAIL_DETERMINING_EMAIL_FORMAT` | `zen_mail()` | HTML for a guest's acknowledgment |

The emails go through `zen_mail()` with the modules `eu_withdrawal_ack` and `eu_withdrawal_notice`, so other email hooks (and Preview Email Pro's templates) can tell them apart.
