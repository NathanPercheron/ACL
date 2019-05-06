<?php

namespace App\Controller;

use App\Form\AdherentType;
use App\Entity\Adherent;
use App\Repository\AdherentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\VarDumper\VarDumper;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     * Method({"GET", "POST"})
     */

    public function inscription(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
        $adherent = new Adherent();
        $form = $this->createForm(AdherentType::class, $adherent);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($adherent, $adherent->getPassword());
            $adherent->setPassword($password);
            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adherent);
            $entityManager->flush();


            $this->addFlash(
                'info',
                'Votre demande d\'adhésion à bien été prise en compte !'
            );

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('inscription');
        }

        return $this->render(
            'inscription/inscription.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/inscription/edit/{id}", name="edit_profil")
     * Method({"GET", "POST"})
     */

    public function edit(Request $request, $id)
    {
        // 1) build the form
        $adherent = new Adherent();
        $adherent = $this->getDoctrine()->getRepository(Adherent::class)->find($id);
        $form = $this->createForm(AdherentType::class, $adherent);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();


            $this->addFlash(
                'info_edit',
                'Votre profil à bien été mis à jour !'
            );

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('profil');
        }

        return $this->render(
            'inscription/edit_profil.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/inscription/profil", name="profil")
     */
    public function getAdherent(AdherentRepository $repo)
    {
      $profil = $repo->findAll();
      return $this->render('inscription/profil.html.twig', [
          'controller_name' => 'InscriptionController',
          'profil' => $profil
      ]);
    }
}
