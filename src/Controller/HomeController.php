<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/secret", name="secret")
     * @IsGranted("ROLE_USER")
     */
    public function secret(): Response
    {
        return $this->render('home/secret.html.twig');
    }

    /**
     * @Route("/cgu", name="cgu")
     */
    public function cgu(): Response
    {
        return $this->render('home/cgu.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {
        return $this->render('home/about.html.twig');
    }

    /**
     * @Route("/summary", name="summary")
     */
    public function summary(): Response
    {
        return $this->render('summary/index.html.twig');
    }

     /**
     * @Route("/profile", name="profile")
     */
    public function profile(): Response
    {
        return $this->render('home/profile.html.twig');
    }

     /**
     * @Route("/settings", name="settings")
     */
    public function settings(): Response
    {
        return $this->render('home/settings.html.twig');
    }
}
