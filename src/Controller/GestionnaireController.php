<?php

namespace App\Controller;

use App\Entity\Gestionnaire;
use App\Entity\User;
use App\Form\GestionnaireType;
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
     * @Route("/new_gestionnaire", name="gestionnaire_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $gestionnaire = new Gestionnaire();
        $form = $this->createForm(GestionnaireType::class, $gestionnaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gestionnaire);
            $entityManager->flush();
            $user = new User();
            $user->setPassword();
            $user->setUsername($gestionnaire->getNom());
            $user->setEmail($gestionnaire)->getEmail();
            $user->setPilote($gestionnaire);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('gestionnaire_index');
        }

        return $this->render('pilote/new.html.twig', [
            'gestionnaire' => $gestionnaire,
            'form' => $form->createView(),
        ]);
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
