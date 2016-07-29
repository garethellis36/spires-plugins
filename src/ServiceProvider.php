<?php
/**
 * Created by PhpStorm.
 * User: garethellis
 * Date: 27/07/2016
 * Time: 21:09
 */

namespace Garethellis\SpiresTldr;


use GarethEllis\Tldr\Fetcher\PageFetcherInterface;
use GarethEllis\Tldr\Fetcher\RemoteFetcher;
use GuzzleHttp\Client;

class ServiceProvider extends \Spires\Core\ServiceProvider
{
    public function plugins()
    {
        return [
            BangTldrDetector::class,
            TldrCommandFetcher::class,
            DanInsultDetector::class,
            DanInsulter::class
        ];
    }

    /**
     * (Optional) Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->core->bind(
            PageFetcherInterface::class,
            function () {
                $http = new Client();
                return new RemoteFetcher($http);
            }
        );
    }
}