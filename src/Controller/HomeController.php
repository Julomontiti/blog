<?php
/**
 * Created by PhpStorm.
 * User: wilder13
 * Date: 29/10/18
 * Time: 14:34
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('home.html.twig');
    }
}