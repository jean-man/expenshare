<?php

namespace App\Controller;

use App\Entity\Persons;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class PersonsController
 * @package App\Controller
 * @Route("/persons")
 */

class PersonsController extends AbstractController
{
    /**
     * Class ExpenseController
     * @package App\Controller
     * @Route("/", name="persons", methods="GET")
     */

    // Request est un objet qui indique que la fonction doit faire un request

    public function showPersons(Request $request) :Response

    {
        $persons = $this->getDoctrine()->getRepository(Persons::class)

            ->createQueryBuilder('p')
            ->select('p', 's')
            ->innerjoin('p.shareGroup','s')
            ->getQuery()
            ->getArrayResult();

        if ($request->isXmlHttpRequest()) {
            return $this->json($persons);
        }
    }
}