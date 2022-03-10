<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InformationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Repository\UserRepository;

class InformationController extends AbstractController
{
    /**
     * @Route("/information", name="information")
     * @IsGranted("ROLE_USER")
     */
    public function index(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $this->getUser();
        $form = $this->createForm(InformationType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($user instanceof User) {
                $entityManager->persist($user);
                $entityManager->flush();
                return $this->redirectToRoute('school_index');
            }
        }
        return $this->renderForm('information/index.html.twig', [
            'form' => $form,
        ]);
    }
}
