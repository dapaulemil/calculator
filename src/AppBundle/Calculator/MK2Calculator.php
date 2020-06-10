<?php

declare(strict_types=1);

namespace AppBundle\Calculator;


use AppBundle\Model\Change;

class MK2Calculator implements CalculatorInterface
{

    /**
     * @inheritDoc
     */
    public function getSupportedModel(): string
    {
        return 'mk2';
    }

    /**
     * @inheritDoc
     */
    public function getChange(int $amount): ?Change
    {
        $nbBill5 = 0;

        if ($amount%2 !== 0){
            //Lorsqu'on retire 5 d'un nombre impair on aura un reste pair qu'on pourra gérer avec des billets de 10 et des pièces de 2
            if (($amount - 5) > 0){
                $nbBill5 = 1;
                $amount -= 5;
            } else {
                //Si on retire 5 au montant et que le reste est inférieur à 0 alors on ne pourra pas rendre la monnaie
                return null;
            }
        }
        $change = new Change();
        $change->bill5 = $nbBill5;
        $change->bill10 =  (int) ($amount/10);
        $amount -= $change->bill10 * 10;
        $change->coin2 = (int) ($amount / 2);

        return $change;
    }
}