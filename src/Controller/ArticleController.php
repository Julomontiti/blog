<?php
/**
 * Created by PhpStorm.
 * User: wilder13
 * Date: 09/11/18
 * Time: 17:47
 */

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

}