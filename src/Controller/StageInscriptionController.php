<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Inscription;
use App\Form\InscriptionType;


class StageInscriptionController extends AbstractController
{
    /**
     * @Route("/stage/inscription", name="stage_inscription")
     */
    public function inscriptionstage(Request $request)
    {
        $inscription = new Inscription();
        $form = $this->createForm(InscriptionType::class, $inscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($inscription);
            $entityManager->flush();

            return $this->redirectToRoute('accueil');
        }

        return $this->render('stage_inscription/index.html.twig', array('form' => $form->createView()));
    }
}
