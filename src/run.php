<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';

use Spires\Irc\Client;

error_reporting(E_ALL);

/* Allow the script to hang around waiting for connections. */
set_time_limit(0);

/* Turn on implicit output flushing so we see what we're getting as it comes in. */
ob_implicit_flush();


$core = new \Spires\Core\Core(realpath(__DIR__));
$core->register(\Spires\Irc\ServiceProvider::class, [
    'connection.channel' => '#phpoxford',
    'connection.server' => 'irc.freenode.com',
    'connection.port' => 6667,
    'user.nickname' => 'garethellis_bot',
    'user.username' => 'garethellis_bot',
    'user.realname' => 'Spires ALPHA',
]);
$core->register(\Spires\Plugins\SystemMessage\ServiceProvider::class);
$core->register(\Spires\Plugins\ChannelOperations\ServiceProvider::class);
$core->register(\Spires\Plugins\PingPong\ServiceProvider::class);
$core->register(\Spires\Plugins\Message\ServiceProvider::class);
$core->register(\Spires\Plugins\BangMessage\ServiceProvider::class);
$core->register(\Garethellis\SpiresTldr\ServiceProvider::class);
$core->boot();

$client = $core->make(Client::class);

$client->logHeading('Spires booted');
$client->logDebug("Providers:");
foreach ($core->getLoadedProviders() as $provider => $active) {
    $client->logDebug("  - " . $provider);
}
$client->logDebug("Plugins:");
foreach ($core->getPlugins() as $name => $plugin) {
    $client->logDebug("  - " . $name);
}

$client->logHeading('Spires connecting');
$client->connect();

$client->logHeading('Spires listening');
$client->run();