<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class XtrialController extends AbstractController
{
    /**
     * @Route("/xtrial", name="xtrial")
     */
    public function index()
    {
        return $this->render('xtrial/xtrial.html.twig', [
            'controller_name' => 'XtrialController',
        ]);
    }
}
