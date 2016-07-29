<?php
/**
 * Created by PhpStorm.
 * User: garethellis
 * Date: 27/07/2016
 * Time: 21:38
 */

namespace Garethellis\SpiresTldr;


use Spires\Plugins\BangMessage\Inbound\BangMessage;

class DanInsultDetector
{
    public function detectInsultDan(BangMessage $message) {
        if (substr($message->text(), 0, 6) == "fu dan") {
            return DanInsultMessage::from($message);
        }
    }
}