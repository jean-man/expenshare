<?php

namespace App\Controller;


use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */

    // Request est un objet qui indique que la fonction doit faire un request

    public function index(Request $request): Response
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)
            ->createQueryBuilder('c')
            ->getQuery()
            ->getArrayResult();

        if ($request->isXmlHttpRequest()) {
            return $this->json($categories);
        }
    }
}
