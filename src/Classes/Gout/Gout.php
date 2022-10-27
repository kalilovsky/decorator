<?php

namespace App\Classes\Gout;

interface Gout
{

    const PRIX = 0;
    const GOUT = '';



    public function __construct(?Gout $gout = null);

    /**
     * @return string
     */
    public function getGout(): string;


    /**
     * @return float
     */
    public function getPrix(): float;

}