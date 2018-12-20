<?php

namespace App\Controller;

use App\Entity\Expense;
use App\Entity\ShareGroup;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class ExpenseController
 * @package App\Controller
 * @Route("/expense")
 */

class ExpenseController extends BaseController
{
    /**
     * @Route("/group/{slug}", name="expense", methods="GET")
     */

    public function showExpense (ShareGroup $shareGroup)
    {
        $expenses = $this->getDoctrine()->getRepository(Expense::class)

            ->createQueryBuilder('e')
            ->select('e', 'ep', 'ec')
            ->innerjoin('e.person', 'ep')
            ->innerjoin('e.category', 'ec')
            ->where('ep.shareGroup = :group')
            ->setParameter(':group', $shareGroup)
            ->getQuery()
            ->getArrayResult();


            return $this->json($expenses);

    }
}
