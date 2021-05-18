<?php

class Toolbox
{

    /**
     * For proper encoding!
     *
     * @param string $string String to convert
     * @return string the given string converted to 'windows-1252' encoding
     */
    public static function convertString($string)
    {
        return iconv('UTF-8', 'windows-1252', $string);
    }
}
