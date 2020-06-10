<?php
declare(strict_types=1);

namespace AppBundle\Calculator;


use AppBundle\Model\Change;

class MK1Calculator implements CalculatorInterface
{

    /**
     * @inheritDoc
     */
    public function getSupportedModel(): string
    {
        return 'mk1';
    }

    /**
     * @inheritDoc
     */
    public function getChange(int $amount): ?Change
    {
        $change = new Change();
        $change->coin1 = $amount; // Ici le nombre de pièce de un sera égal au montant saisi.
        return $change;
    }
}