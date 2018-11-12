<?php
/**
 * Created by PhpStorm.
 * User: wilder13
 * Date: 12/11/18
 * Time: 10:00
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{id}", name="categories_show")
     */
    public function show(Category $category): Response
    {
        return $this->render('blog/categories.html.twig', ['category' => $category]);
    }

}

//namespace App\Controller;
//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Routing\Annotation\Route;
//use App\Entity\Article;
//
//
//class ArticleController extends AbstractController
//{
//    /**
//     * @Route("/article/{id}", name="article_show")
//     */
//    public function show(Article $article): Response
//    {
//        return $this->render('blog/articles.html.twig', ['article'=>$article]);
//    }
//
//}