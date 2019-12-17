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
     * @Route("/news/",  name="newslist")
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
     * @return Response
     * @Route("/news/create", name="create_article")
     */
    public function createNew():Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $new = new Article();
        $new->setCreatedAt(new \DateTime());
        $new->setImage('/news/default.jpg');
        $new->setStatus(1);
        $new->setText("This is a first article in symfony project");
        $new->setTitle("First new");
        $new->setUpdatedAt(new \DateTime());

        $entityManager->persist($new);

        //$entityManager->flush();

        return new Response("Saved new product with id {$new->getId()}");
    }
}