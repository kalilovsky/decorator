<?php

namespace App\Classes\Gout;

class Chocolat implements Gout
{
    const PRIX = 1.1;
    const GOUT = 'Chocolat';


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
        return self::GOUT . $this->gout->getGout();
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