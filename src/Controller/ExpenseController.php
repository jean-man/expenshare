<?php

namespace App\Controller;

use App\Entity\Expense;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ExpenseController extends AbstractController
{
    /**
     * Class ExpenseController
     * @package App\Controller
     * @Route("/expense")
     */

    // Request est un objet qui indique que la fonction doit faire un request

    public function showExpense(Request $request) :Response
    {
        $expenses = $this->getDoctrine()->getRepository(Expense::class)

            ->createQueryBuilder('c')
            ->getQuery()
            ->getArrayResult();

        if ($request->isXmlHttpRequest()) {
            return $this->json($expenses);
        }
    }
}
