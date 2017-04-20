<?php
// Display errors generated by srv-idp.
// The URL of this page should be set in the "errorPageURL" configuration parameter of srv-idp.

require __DIR__.'/process.php';

$json = checkJSON(extractJSON('e'));

if (empty($json['data'])) {
    $json['data'] = 'Unknown error';
} else {
    filter_var($json['data'], FILTER_SANITIZE_STRING);
}

$out = getPageHeader('SSO ERROR');

$out .= '<p class="message error">'.$json['data'].'</p>'."\n";

if (!empty($json)) {
    $out .= '<div class="code"><pre><code>'.json_encode($json, JSON_PRETTY_PRINT).'</code></pre></div>';
}

$out .= getPageFooter();

echo $out;
