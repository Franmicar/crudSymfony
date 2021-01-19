<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'title' => $this -> getParameter('title_page'),
            'facebook' => $this -> getParameter('facebook'),
            'twitter' => $this -> getParameter('twitter'),
            'instagram' => $this -> getParameter('instagram'),
        ]);
    }
}
