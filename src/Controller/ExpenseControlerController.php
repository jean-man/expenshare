<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ExpenseControlerController extends AbstractController
{
    /**
     * @Route("/expense/controler", name="expense_controler")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ExpenseControlerController.php',
        ]);
    }
}
