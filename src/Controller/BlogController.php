<?php
/**
 * Created by PhpStorm.
 * User: wilder13
 * Date: 29/10/18
 * Time: 17:43
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\Category;

class BlogController extends AbstractController
{
//    /**
//     * @Route("/blog/{page}", requirements={"page"="\d+"}, name="blog_list")
//     */
//    public function list($page)
//    {
//        return $this->render('blog/page.html.twig', ['page' => $page]);
//    }

    /**
     * @Route("/blog/{slug}", requirements={"slug"="[a-z0-9-]+"}, name="blog_show")
     */
    public function show($slug = 'article-sans-titre')
    {
        return $this->render('blog/page.html.twig', ['slug' => ucwords(str_replace ('-', ' ', $slug))]);
    }


    /**
     * @Route("/category/{categoryName}", name="blog_show_category")
     */
    public function showByCategory(string $categoryName)
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findOneByName($categoryName);
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findBy(
                array('category' => $category),
                array('id' => 'DESC'),
                3
            );
        return $this->render(
            'blog/category.html.twig',
            [
                'articles' => $articles,
                'category' => $category,
            ]
        );
    }


}