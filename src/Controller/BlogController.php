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
}