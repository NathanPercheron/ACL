<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article/new", name="article_new")
     */
    public function index(Request $request)
    {
      // 1) build the form
      $article = new Article();
      $form = $this->createForm(ArticleType::class, $article);

      // 2) handle the submit (will only happen on POST)
      $form->handleRequest($request);
      if ($form->isSubmitted())
      {
        $file=$article->getImage();
        $file = $request->files->get('article')['image'];

        $uploads_directory = $this->getParameter('uploads_directory');

        $filename = md5(uniqid()) .'.'. $file->guessExtension();

        $file->move(
            $uploads_directory,
            $filename
          );


          // 4) save the User!
          $article->setImage($filename);
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($article);
          $entityManager->flush();

          // ... do any other work - like sending them an email, etc
          // maybe set a "flash" success message for the user

          return $this->redirectToRoute('article_show');
      }

      return $this->render(
          'article/new.html.twig',
          array('form' => $form->createView())
      );
    }

    /**
     * @Route("/article/show", name="article_show")
     */
     public function getArticles(ArticleRepository $repo)
     {
       $articles = $repo->findAll();
       return $this->render('article/show.html.twig', [
           'controller_name' => 'ArticleController',
           'articles' => $articles
       ]);
     }
  }
