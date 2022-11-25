<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Contact;
use App\Entity\Post;
use App\Form\ContactFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;

class PageController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $repository = $doctrine->getRepository(Category::class);
    
        $categories = $repository->findAll();
    
        return $this->render('page/index.html.twig', ['categories' => $categories]);
    }
    
    
    #[Route('/about', name: 'about')]
public function about(): Response
{
    return $this->render('page/about.html.twig', []);
}

#[Route('/contact', name: 'contact')]
public function contact(ManagerRegistry $doctrine, Request $request): Response
{
    $contact = new Contact();
    $form = $this->createForm(ContactFormType::class, $contact);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        $contacto = $form->getData();    
        $entityManager = $doctrine->getManager();    
        $entityManager->persist($contacto);
        $entityManager->flush();
        return $this->redirectToRoute('thankyou', []);
    }
    return $this->render('page/contact.html.twig', array(
        'form' => $form->createView()    
    ));
}

#[Route('/blog', name: 'blog')]
public function blog(): Response
{
    return $this->render('page/blog.html.twig', []);
}

#[Route('/single', name: 'single')]
public function single(): Response
{
    return $this->render('page/single.html.twig', []);
}

#[Route('/blog/new', name: 'new_post')]
public function newPost(ManagerRegistry $doctrine, Request $request, SluggerInterface $slugger): Response
{
    $post = new Post();
    $form = $this->createForm(PostFormType::class, $post);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        $post = $form->getData();   
        $post->setSlug($slugger->slug($post->getTitle()));
        $post->setPostUser($this->getUser());
        $post->setNumLikes(0);
        $post->setNumComments(0);
        $entityManager = $doctrine->getManager();    
        $entityManager->persist($post);
        $entityManager->flush();
        return $this->render('blog/new_post.html.twig', array(
            'form' => $form->createView()    
        ));
    }
    return $this->render('/new_post.html.twig', array(
        'form' => $form->createView()    
    ));
}



#[Route('/thankyou', name: 'thankyou')]
    public function thankyou(): Response
    {
        return $this->render('page/thankyou.html.twig', []);
    }


}
