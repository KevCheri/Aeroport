<?php

namespace App\Controller;

use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GestionnaireController extends AbstractController
{
    /**
     * @Route("/gestionnaire", name="gestionnaire")
     */
    public function index()
    {
        return $this->render('gestionnaire/index.html.twig', [
            'controller_name' => 'GestionnaireController',
        ]);
    }

    public function newVol()
    {
        $this->render('gestionnaire/vol.html.twig', [
            'controller_name' => 'GestionnaireController']);

    }
}
