<?php

namespace App\Controller;


use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class CategoryController
 * @package App\Controller
 * @Route("/category", name="category")
 */

class CategoryController extends AbstractController
{

    /**
     * @Route("/", name="category", methods="GET")
     */
    // Request est un objet qui indique que la fonction doit faire un request

    public function showCategory(Request $request): Response
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)

            ->createQueryBuilder('c')
            ->getQuery()
            ->getArrayResult();


            return $this->json($categories);
        }

}
