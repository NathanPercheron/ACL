<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Entity\Article;
use App\Repository\CategorieRepository;

class EcoleController extends AbstractController
{
    
    /**
     * @Route("/ecole", name="ecole")
     */
    public function index(CategorieRepository $repo)
    {
        return $this->render('ecole/ecole.html.twig', [
            'controller_name' => 'EcoleController'
        ]);
    }
    
}
