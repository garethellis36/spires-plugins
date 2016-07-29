<?php
/**
 * Created by PhpStorm.
 * User: garethellis
 * Date: 27/07/2016
 * Time: 20:51
 */

namespace Garethellis\SpiresTldr;

use GarethEllis\Tldr\Fetcher\PageFetcherInterface;

class TldrCommandFetcher
{
    /**
     * @var PageFetcherInterface
     */
    private $pageFetcher;

    public function __construct(PageFetcherInterface $pageFetcher)
    {
        $this->pageFetcher = $pageFetcher;
    }

    public function lookupCommand(BangTldrMessage $message)
    {
        try {
            $reply = "Trying to fetch information on command '{$message->getCommand()}'";
            $options = [];
            if ($message->getOperatingSystem()) {
                $reply .= " for OS '{$message->getOperatingSystem()}'";
                $options = [
                    "operatingSystem" => $message->getOperatingSystem()
                ];
            }
            reply($reply);
            $page = $this->pageFetcher->fetchPage($message->getCommand(), $options);
            reply($page->getContent());
        } catch (\Exception $e) {
            reply("Couldn't fetch page");
        }
    }
}