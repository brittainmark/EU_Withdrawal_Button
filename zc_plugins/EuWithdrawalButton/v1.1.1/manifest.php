<?php
/**
 * EU Withdrawal Button -- plugin manifest.
 *
 * pluginDescription is echoed unescaped into Plugin Manager's info box on every
 * release from v1.5.8 to v3.0.0, so the Read Me link lives here. On v1.5.8,
 * v2.0 and v2.1 the description and pluginId are written only when Plugin
 * Manager first sees the plugin, so both have to be right before the first
 * store installs it.
 *
 * Read Me, GitHub and Forum Support Thread are three buttons in one row (every
 * free dbltoe plugin has the thread button). The GitHub and forum buttons
 * render nothing while their URL is empty: a link that 404s is worse than none.
 *
 * @package  EuWithdrawalButton
 * @license  GNU General Public License v2.0 (https://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 */

$euwPluginDir = 'zc_plugins/EuWithdrawalButton/v1.1.1/';
$euwReadmeUrl = (defined('DIR_WS_CATALOG') ? DIR_WS_CATALOG : '/') . $euwPluginDir . 'readme.html';
$euwGithubUrl = 'https://github.com/dbltoe/EU_Withdrawal_Button';
$euwForumUrl = 'https://www.zen-cart.com/threads/207395';

$euwGap = '6px';
$euwButton = static function ($url, $label) use ($euwGap) {
    return '<a href="' . $url . '" target="_blank" rel="noopener noreferrer" class="btn btn-primary" role="button"'
        . ' style="margin:0 ' . $euwGap . ' 0 0">' . $label . '</a>';
};
$euwLinks = '<div style="margin:10px 0 0;padding:0 0 0 ' . $euwGap . '">'
    . $euwButton($euwReadmeUrl, 'Read Me')
    . ($euwGithubUrl !== '' ? $euwButton($euwGithubUrl, 'GitHub') : '')
    . ($euwForumUrl !== '' ? $euwButton($euwForumUrl, 'Forum Support Thread') : '')
    . '</div>';

return [
    'pluginVersion' => 'v1.1.1',
    'pluginName' => 'EU Withdrawal Button',
    'pluginDescription' =>
        'The withdrawal function EU law requires of online stores from 19 June 2026 (Article 11a, Directive (EU) 2023/2673): '
        . 'a "Withdraw From Contract Here" button on every page, a short form with a Confirm Withdrawal button, '
        . 'and an emailed acknowledgment with the statement and its date and time. Works for guests, matches the order, '
        . 'and lists every withdrawal under Customers > Withdrawals.'
        . $euwLinks,
    'pluginAuthor' => 'My Zen Cart Host (dbltoe)',
    // Plugins Library id. 0 until the Library assigns one (submissions are on
    // hold); it must be set before the first store installs from the Library.
    'pluginId' => 0,
    'zcVersions' => ['v158', 'v200', 'v210', 'v220', 'v230', 'v300'],
    'changelog' => 'changelog.txt',
    'github_repo' => $euwGithubUrl,
    'pluginGroups' => [],
];
