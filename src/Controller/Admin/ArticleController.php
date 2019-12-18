<?php


namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/admin/articles", name="AdminArticles")
     */
    public function index()
    {
        return $this->render('/admin/articles/list.html.twig');
    }
}