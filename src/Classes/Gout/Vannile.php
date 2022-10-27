<?php

namespace App\Classes\Gout;

class Vannile implements Gout
{
    const PRIX = 1.1;
    const GOUT = 'Vanille';

    public function __construct(private readonly ?Gout $gout = null)
    {

    }

    /**
     * @return string
     */
    public function getGout(): string
    {
        if(!$this->gout instanceof Gout){
            return self::GOUT;
        }
        return self::GOUT . $this->getGout();
    }

    /**
     * @return float
     */
    public function getPrix(): float
    {
        if(!$this->gout instanceof Gout) {
            return self::PRIX;
        }
        return self::PRIX + $this->gout->getPrix();
    }
}