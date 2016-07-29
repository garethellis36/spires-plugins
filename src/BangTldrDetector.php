<?php

namespace Garethellis\SpiresTldr;


use Spires\Plugins\BangMessage\Inbound\BangMessage;

class BangTldrDetector
{
    public function detectBangTldr(BangMessage $message)
    {
        if ($this->isBangTldrMessage($message->text())) {
            return BangTldrMessage::from($message);
        }
    }

    private function isBangTldrMessage($text)
    {
        return substr($text, 0, 4) === "tldr";
    }
}