<?php

namespace App\Controller;

use App\Entity\Partenaire;
use App\Form\PartenaireType;
use App\Repository\PartenaireRepository;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PartenaireController extends AbstractController
{
    /**
     * @Route("/partenaire", name="partenaire")
     */
    public function GetPartenaires(PartenaireRepository $repo)
    {
        $partenaire = $repo->findAll();
        return $this->render('partenaire/partenaire.html.twig', [
            'controller_name' => 'PartenaireController',
            'partenaire' => $partenaire
        ]);
    }

    /**
     * @Route("/partenaire/new", name="partenaire_new")
     */
    public function CreatePartenaire(Request $request){
        // Création du formulaire
        $partenaire = new Partenaire();
        $form = $this->createForm(PartenaireType::class, $partenaire);

        // Envoie du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $file=$partenaire->getImage();
            $file = $request->files->get('partenaire')['image'];

            $uploads_directory = $this->getParameter('uploads_directory');
            $filename = md5(uniqid()).'.'. $file->guessExtension();
            $file->move($uploads_directory, $filename);

            $partenaire->setImage($filename);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($partenaire);
            $entityManager->flush();

            return $this->redirectToRoute('partenaire');
        }
        return $this->render(
            'partenaire/new.html.twig',
            array('form' => $form->createView())
        );
    }
}
