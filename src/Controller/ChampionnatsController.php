<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChampionnatsController extends AbstractController
{
    /**
     * @Route("/championnats/championnat_bretagne", name="bretagne")
     */
    public function championnatBretagne()
    {
        return $this->render('championnats/championnat_bretagne.html.twig', [
            'controller_name' => 'ChampionnatsController',
        ]);
    }

    /**
     * @Route("/championnats/championnat_france", name="france")
     */
    public function championnatFrance()
    {
        return $this->render('championnats/championnat_france.html.twig', [
            'controller_name' => 'ChampionnatsController',
        ]);
    }

    /**
     * @Route("/championnats/championnat_europe", name="europe")
     */
    public function championnatEurope()
    {
        return $this->render('championnats/championnat_europe.html.twig', [
            'controller_name' => 'ChampionnatsController',
        ]);
    }
}
