<?php
/**
 * Created by PhpStorm.
 * User: wilder13
 * Date: 12/11/18
 * Time: 10:00
 */

namespace App\Controller;

use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        return $this->render('blog/category.html.twig', ['category' => $category]);
    }

//    /**
//     * @Route("/category", name="category_index")
//     * @param CategoryRepository $categoryRepository
//     * @return Response
//     */
////    public function index(CategoryRepository $categoryRepository) : Response
//    {
//        return $this->render('blog/allCategory.html.twig',['categories' => $categoryRepository ->findAll()]);
//    }

    /**
     *@Route ("/category" , name = "category_new", methods="Get|POST")
     *
     */
    public function add(Request $request):Response
    {
        //$categories = $this->getDoctrine() ->getRepository(Category::class) ->findAll();


        $category = new Category();
        $form = $this->createForm(CategoryType::class,$category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('blog_home');
        }
        return $this->render('category/allCategory.html.twig', [  'category' => $category ,
            'form'=> $form->createView(),
            //'categories'=>$categories
        ]);

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