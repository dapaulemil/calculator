<?php
declare(strict_types=1);

namespace AppBundle\Registry;


use AppBundle\Calculator\CalculatorInterface;

class CalculatorRegistry implements CalculatorRegistryInterface
{

    private $calculators;

    //Création de notre factory Calculator afin de pouvoir par la suite créer des méthode qui implémentent l'interface calculator et ne pas avoir besoin de rajouter le code
    //d'instanciation à chaque fois qu'on en créera une nouvelle

    public function __construct(iterable $calculators)
    {
        $this->calculators = $calculators;
    }

    /**
     * @inheritDoc
     */
    public function getCalculatorFor(string $model): ?CalculatorInterface
    {
        foreach ($this->calculators as $calculator){
            if ($model === $calculator->getSupportedModel()){
                return $calculator;
            }
        }
        return null;
    }
}