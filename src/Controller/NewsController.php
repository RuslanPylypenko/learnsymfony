<?php


namespace App\Controller;


use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/novosti/",  name="newslist")
     */
    public function index(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Article::class);
        $news = $repository->findAll();

        return $this->render('/news/list.html.twig', [
            'news' => $news
        ]);
    }

    /**
     * @param Article $article
     * @return Response
     * @Route("/novosti/{id}", name="newView")
     */
    public function show(Article $article)
    {
        return $this->render('/news/view.html.twig', [
            'new' => $article
        ]);
    }


    /**
     * @return Response
     * @throws \Exception
     * @Route("/news/create", name="create_article")
     */
    public function createNew():Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $new = new Article();
        $new->setCreatedAt(new \DateTime());
        $new->setImage('/news/default.jpg');
        $new->setStatus(1);
        $new->setText("Что такое Голливуд? Это красивая жизнь, бесконечные развлечения, головокружительные вечеринки с селебритис и всепоглощающий культ кинематографа. И ресторан \"Public Cafe\" предлагает встретить Новый 2020 Год именно так!");
        $new->setTitle("Hollywood New Year в ресторане \"Public Cafe\"");
        $new->setUpdatedAt(new \DateTime());

        $entityManager->persist($new);

        $entityManager->flush();

        return new Response("Saved new product with id {$new->getId()}");
    }
}