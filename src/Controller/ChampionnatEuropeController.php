<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChampionnatEuropeController extends AbstractController
{
    /**
     * @Route("/championnat/europe", name="championnat_europe")
     */
    public function index()
    {
        return $this->render('championnat_europe/championnat_europe.html.twig', [
            'controller_name' => 'ChampionnatEuropeController',
        ]);
    }
}
