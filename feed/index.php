<?php
chdir(dirname(__DIR__));
require_once 'inc/inc.config.php';
header('Content-Type: application/rss+xml; charset=UTF-8');
$base = rtrim(CONF_TAG_BASE, '/');
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    <title><?= htmlspecialchars(CONF_SITE_NAME, ENT_XML1 | ENT_QUOTES, 'UTF-8') ?></title>
    <link><?= htmlspecialchars($base . '/', ENT_XML1 | ENT_QUOTES, 'UTF-8') ?></link>
    <description>Feed do site</description>
    <language>pt-BR</language>
    <atom:link href="<?= htmlspecialchars($base . '/feed/', ENT_XML1 | ENT_QUOTES, 'UTF-8') ?>" rel="self" type="application/rss+xml"/>
  </channel>
</rss>
