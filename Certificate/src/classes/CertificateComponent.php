<?php

class CertificateComponent
{

    // Coordinates
    public $x;
    public $y;

    // Coordinates-Offset
    public $offsetX = 0;

    // String to draw
    public $string;

    // Fontsize
    public $fontsize = DEFAULT_FONT_SIZE;

    // Color of the component (default: black)
    public $r = 0;
    public $g = 0;
    public $b = 0;

    public function __construct($string, $x, $y, $fontsize = null)
    {
        $this->string  =  $string;
        $this->x       =  $x;
        $this->y       =  $y;
        
        if ($fontsize != null) {
            $this->fontsize = $fontsize;
        }
    }

    public function setColor($r, $g, $b)
    {
        $this->r = $r;
        $this->g = $g;
        $this->b = $b;
    }

    public function setOffsetX($offsetX)
    {
        $this->offsetX = $offsetX;
    }
}
