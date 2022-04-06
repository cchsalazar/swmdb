<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CharacterController extends AbstractController
{
    /**
     * @Route("/character", name="app_character")
     */
    public function index(): Response
    {
        return $this->render('character/index.html.twig', [
            'controller_name' => 'CharacterController',
        ]);
    }

    /**
     * @Route("/character/{id}", name="app_character_detail")
     */
    public function detail(int $id): Response
    {
        return $this->render('character/detail.html.twig', [
            'controller_name' => 'CharacterController',
        ]);
    }
}
