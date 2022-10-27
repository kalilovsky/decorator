<?php

namespace App\Classes;

use App\Classes\Gout\Gout;
use Doctrine\Common\Collections\Collection;

class Dessert
{

    private float $prix;
    private Collection $gouts;

    public function __construct(Gout ...$gouts)
    {
        $this->setGouts($gouts);
    }
    /**
     * @return string
     */
    public function getGout(): string
    {
        return $this->gouts;
    }

    public function setGout(Gout $gout): self
    {
        if(!$this->gouts->contains($gout)){
            $this->gouts->add($gout);
        }
        return $this;
    }

    public function setGouts(array $gouts): self
    {
        if(!count($gouts)){
            return $this;
        }

        foreach ($gouts as $gout){
            $this->setGout($gout);
        }

        return $this;
    }

    /**
     * @return float
     */
    public function getPrix(): float
    {
        return $this->prix;
    }


}