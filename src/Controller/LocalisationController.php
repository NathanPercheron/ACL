<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LocalisationController extends AbstractController
{
    /**
     * @Route("/localisation", name="localisation")
     */
    public function index()
    {
        return $this->render('localisation/localisation.html.twig', [
            'controller_name' => 'LocalisationController',
        ]);
    }
}
