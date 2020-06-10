<?php

declare(strict_types=1);

namespace AppBundle\Controller;

use AppBundle\Registry\CalculatorRegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route(
     *     path = "/automaton/{model}/change/{amount}",
     *      requirements={"amount"="\d+"},
     *     methods={"GET"}
     *     )
     */
    public function change(CalculatorRegistryInterface $calculatorRegistry, string $model, int $amount)
    {
        $calculator = $calculatorRegistry->getCalculatorFor($model);

        if (is_null($calculator)){
            return new JsonResponse(null, 404);
        }

        $change = $calculator->getChange($amount);
        $code = 200;
        if (is_null($change)){
            $code = 204;
        }

        return new JsonResponse($change, $code);

    }
}
