<?php


namespace App\Controller\Admin;

use App\Entity\Article;
use App\Form\Type\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\Request;
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


    /**
     * @Route("/admin/articles/create", name="admin_create_article")
     */
    public function create(Request $request)
    {
        $article = new Article();
        $article->setStatus(1);
        $article->setImage('/news/default.jpg');
        $article->setUpdatedAt(new \DateTime());
        $article->setCreatedAt(new \DateTime());
        $article->setTitle("Write a title...");

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $article = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            $this->addFlash('success', "Your changes were saved!");

            return $this->redirectToRoute('AdminArticles');
        }

        return $this->render('/admin/articles/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}