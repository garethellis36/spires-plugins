<?php
/**
 * Created by PhpStorm.
 * User: garethellis
 * Date: 27/07/2016
 * Time: 20:43
 */

namespace Garethellis\SpiresTldr;


use Spires\Plugins\BangMessage\Inbound\BangMessage;

class BangTldrMessage extends BangMessage
{
    public function getCommand()
    {
        $parts = explode(" ", $this->text(), 3);
        if (count($parts) >= 2) {
            return $parts[1];
        }
        return "";
    }

    public function getOperatingSystem()
    {
        $parts = explode(" ", $this->text(), 3);
        if (count($parts) >= 3) {
            return $parts[2];
        }
        return "";
    }
}