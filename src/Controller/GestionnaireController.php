<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Gestionnaire;
use App\Form\GestionnaireType;
use App\Repository\GestionnaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/gestionnaire")
 */
class GestionnaireController extends AbstractController
{
    /**
     * @Route("/gestionnaire", name="gestionnaire", methods={"GET"})
     * @param GestionnaireRepository $gestionnaireRepository
     * @return Response
     */
    public function index(GestionnaireRepository $gestionnaireRepository): Response
    {
        return $this->render('gestionnaire/index.html.twig', [
            'gestionnaires' => $gestionnaireRepository->findAll(),
        ]);
    }

    public function newVol()
    {

        return $this->render('gestionnaire/vol.html.twig', [
            'controller_name' => 'GestionnaireController']);

    }

    /**
     * @Route("/office", name="office_gestionnaire", methods={"GET","POST"})
     */

    public function officeGestionnaire()
    {

        return $this->render('gestionnaire/office.html.twig', [
            'controller_name' => 'GestionnaireController']);

    }

    /**
     * Fonction qui nous créée un nouveau gestionnaire tout en créant un utilisateurs pour celui-ci
     */

    /**
     * @Route("/new", name="gestionnaire_new", methods={"GET","POST"})
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     */
    public function new(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $gestionnaire = new Gestionnaire();
        $form = $this->createForm(GestionnaireType::class, $gestionnaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = new User();
            $entityManager = $this->getDoctrine()->getManager();
            /**
             * Ici nous envoyant un password à la dur lors de la création du responsable, car en continuant le projet
             * un mail serait envoyé au employé pour pouvoir changer leurs mdp.
             */
            $hash_password = $encoder->encodePassword($user, 'azerty');
            $user->setPassword($hash_password);
            $entityManager->persist($gestionnaire);
            $entityManager->flush();
            $user->setUsername($gestionnaire->getNom());
            $user->setRoles(["ROLE_GESTIONNAIRE"]);
            $user->setEmail($gestionnaire->getEmail());
            $user->setGestionnaire($gestionnaire);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('gestionnaire');
        }

        return $this->render('gestionnaire/new.html.twig', [
            'gestionnaire' => $gestionnaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Fonction pour montrer un gestionnaire selectionner
     */

    /**
     * @Route("/{id}", name="gestionnaire_show", methods={"GET"})
     * @param Gestionnaire $gestionnaire
     * @return Response
     */
    public function show(Gestionnaire $gestionnaire): Response
    {
        return $this->render('gestionnaire/show.html.twig', [
            'gestionnaire' => $gestionnaire,
        ]);
    }

    /**
     * Fonction qui permet de modifier les données d'un gestionnaire
     */

    /**
     * @Route("/{id}/edit", name="gestionnaire_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Gestionnaire $gestionnaire
     * @return Response
     */
    public function edit(Request $request, Gestionnaire $gestionnaire): Response
    {
        $form = $this->createForm(GestionnaireType::class, $gestionnaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gestionnaire_index', [
                'id' => $gestionnaire->getId(),
            ]);
        }

        return $this->render('gestionnaire/edit.html.twig', [
            'gestionnaire' => $gestionnaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Cette fonction permet de supprimer un gestionnaire
     */

    /**
     * @Route("/{id}", name="gestionnaire_delete", methods={"DELETE"})
     * @param Request $request
     * @param Gestionnaire $gestionnaire
     * @return Response
     */
    public function delete(Request $request, Gestionnaire $gestionnaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gestionnaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gestionnaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gestionnaire_index');
    }
}
