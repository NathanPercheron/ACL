<?php

namespace App\Controller;

use App\Entity\ChampionnatBretagne;
use App\Repository\ChampionnatBretagneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChampionnatBretagneController extends AbstractController
{
    /**
     * @Route("/championnat/bretagne", name="championnat_bretagne_show")
     */
    public function show(ChampionnatBretagneRepository $repo)
    {
      $calandrier = $repo->findAll();
        return $this->render('championnat_bretagne/championnat_bretagne.html.twig', [
            'controller_name' => 'ChampionnatBretagneController',
            'calandrier' => $calandrier
        ]);
    }
}
