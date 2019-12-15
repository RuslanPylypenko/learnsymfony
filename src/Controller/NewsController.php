<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/news/")
     */
    public function index(Request $request)
    {
        $news = [1, 2, 3];

        return $this->render('/news/list.html.twig', [
            'news' => $news
        ]);
    }
}