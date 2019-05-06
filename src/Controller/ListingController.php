<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Adherent;
use App\Repository\AdherentRepository;

class ListingController extends AbstractController
{
    /**
     * @Route("/listing", name="listing")
     */
    public function index(AdherentRepository $repo)
    {
      $adherents = $repo->findAll();
      return $this->render('listing/listing.html.twig', [
          'controller_name' => 'ListingController',
          'adherents' => $adherents
      ]);
    }
}
