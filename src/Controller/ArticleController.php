<?php
/**
 * Created by PhpStorm.
 * User: wilder13
 * Date: 09/11/18
 * Time: 17:47
 */

namespace App\Controller;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;


class ArticleController extends AbstractController
{
    /**
     * @Route("/article/{id}", name="article_show")
     */
    public function show(Article $article): Response
    {
        return $this->render('blog/articles.html.twig', ['article'=>$article]);
    }

    /**
     *@Route ("/article/add" , name = "article_new", methods="Get|POST")
     *
     */
    public function add(Request $request):Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class,$article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('blog_home');
        }
        return $this->render('category/allArticle.html.twig', [  'article' => $article ,
            'form'=> $form->createView(),
        ]);

    }

}