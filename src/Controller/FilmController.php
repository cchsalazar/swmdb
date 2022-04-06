<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController
{
    /**
     * @Route("/film", name="app_film")
     */
    public function index(): Response
    {
        return $this->render('film/index.html.twig', [
            'controller_name' => 'FilmController',
        ]);
    }

    /**
     * @Route("/film/{id}", name="app_film_detail")
     */
    public function detail(int $id): Response
    {
        return $this->render('film/detail.html.twig', [
            'controller_name' => 'FilmController',
        ]);
    }
}
