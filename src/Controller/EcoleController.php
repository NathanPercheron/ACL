<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EcoleController extends AbstractController
{
    /**
     * @Route("/ecole", name="ecole")
     */
    public function index()
    {
        return $this->render('ecole/ecole.html.twig', [
            'controller_name' => 'EcoleController',
        ]);
    }
}
