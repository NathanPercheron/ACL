<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user->setPassword($passwordEncoder->encodePassword($user,$form->get('password')->getData()));

            $entityManager = $this->getDoctrine()->getManager();
            $user->addRole("ROLE_USER");
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('accueil');
        }

        return $this->render('inscription/inscription.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/connexion", name="security_connexion")
     */
    public function connexion(AuthenticationUtils $authenticationUtils){

        // récupère l'erreur de login si il y'en à un
        $error = $authenticationUtils->getLastAuthenticationError();

        // le dernier username entré par l'utilisateur
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('connexion/connexion.html.twig', [
            'controller_name' => 'SecurityController',
        ]);

    }

    /**
     * @Route("/security/logout", name="security_logout")
     */
    public function logout(){
        
    }
}
