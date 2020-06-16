<?php
declare(strict_types=1);

namespace AppBundle\Calculator;


use AppBundle\Model\Change;

class Mk1Calculator implements CalculatorInterface
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
        $change->coin1 = $amount;
        if ($amount <= 0){
            return null;
        }

        return  $change;
    }
}