<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BarController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        // comme on a installé TWIG il nous fait une vue TWIG
        return $this->render('bar/index.html.twig', [
            'controller_name' => 'BarController',
        ]);
    }
}
