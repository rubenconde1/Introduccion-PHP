<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog')]
    public function about(): Response
    {
        return $this->render('blog/blog.html.twig', []);
    }

    #[Route('/singlepost', name: 'singlepost')]
    public function singlepost(): Response
    {
        return $this->render('blog/singlepost.html.twig', []);
    }
}
