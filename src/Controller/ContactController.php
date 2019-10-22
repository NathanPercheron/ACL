<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
      // 1) build the form
      $contact = new Contact();
      $form = $this->createForm(ContactType::class, $contact);

      // 2) handle the submit (will only happen on POST)
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {

          // 4) save the User!
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($contact);
          $entityManager->flush();

            $message = (new \Swift_Message('Hello Email'))
                ->setFrom('percheron.nathan@outlook.fr')
                ->setTo('percheron.nathan@outlook.fr')
                ->setBody(
                    $this->renderView(
                        // templates/emails/contact.html.twig
                        'emails/contact.html.twig',
                        ['contact' => $contact]
                    ),
                    'text/html'
                )


                ;

            $mailer->send($message);

          $this->addFlash(
              'info',
              'Votre message nous à bien été transmis nous reviendrons vers vous au plus vite !'
          );

          // ... do any other work - like sending them an email, etc
          // maybe set a "flash" success message for the user

          return $this->redirectToRoute('contact');
      }

      return $this->render(
          'contact/contact.html.twig',
          array('form' => $form->createView())
      );
    }
}
