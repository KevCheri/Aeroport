<?php

namespace App\Controller;

use FOS\UserBundle\Controller\RegistrationController;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\UserBundle\Controller\RegistrationController as BaseController;


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
    /**
     * @Route("/gestionnaireAccount", name="gestionnaireAccount")
     */
    /*public function createAccount(Request $request): Response
    {
        $registration = new RegistrationController();
        return $registration->registerAction($request);

    }*/
}
