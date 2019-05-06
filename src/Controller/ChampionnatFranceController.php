<?php

namespace App\Controller;

use App\Entity\ChampionnatFrance;
use App\Repository\ChampionnatFranceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChampionnatFranceController extends AbstractController
{
    /**
     * @Route("/championnat/france", name="championnat_france_show")
     */
    public function show(ChampionnatFranceRepository $repo)
    {
      $calandrier = $repo->findAll();
        return $this->render('championnat_france/championnat_france.html.twig', [
            'controller_name' => 'ChampionnatFranceController',
            'calandrier' => $calandrier
        ]);
    }
}
