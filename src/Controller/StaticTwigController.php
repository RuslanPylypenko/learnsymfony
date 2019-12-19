<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StaticTwigController extends AbstractController
{
    /**
     * @Route("/static/twig", name="static_twig")
     */
    public function index()
    {
        return $this->render('static_twig/index.html.twig', [
            'controller_name' => 'StaticTwigController',
        ]);
    }
}
