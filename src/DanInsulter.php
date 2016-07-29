<?php
/**
 * Created by PhpStorm.
 * User: garethellis
 * Date: 27/07/2016
 * Time: 21:38
 */

namespace Garethellis\SpiresTldr;


class DanInsulter
{
    public function insultDan(DanInsultMessage $message) {
        reply("Dan is a " . $this->getInsult());
    }

    private function getInsult()
    {
        $insults = [
            "cockwomble",
            "turbodouche",
            "flangemonkey",
            "massive tool",
            "lovely guy",
            "top bloke",
        ];
        $key = array_rand($insults);
        return $insults[$key];
    }
}