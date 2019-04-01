<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Responsable;
use App\Form\ResponsableType;
use App\Repository\ResponsableRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/responsable")
 */
class ResponsableController extends AbstractController
{
    /**
     * @Route("/", name="responsable_index", methods={"GET"})
     * @param ResponsableRepository $responsableRepository
     * @return Response
     */
    public function index(ResponsableRepository $responsableRepository): Response
    {
        return $this->render('responsable/index.html.twig', [
            'responsables' => $responsableRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="responsable_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $responsable = new Responsable();
        $form = $this->createForm(ResponsableType::class, $responsable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($responsable);
            $entityManager->flush();
            $user = new User();
            /**
             * A partir d'ici, nous allons encodé le mot de passe pour pouvoir le réutilisé.
             */
            /**
            $userManager = $this->get('fos_user.user_manager');
            //$user = $userManager->createUser();
            $user->setPlainPassword('azerty');
            $userManager->updateUser($user);
             *  */

            //$user->setPassword("");
            $user->setUsername($responsable->getNom());
            $user->setEmail($responsable->getEmail());
            $user->setRoles(["ROLE_RESPONSABLE"]);
            $user->setResponsable($responsable);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('responsable_index');
        }

        return $this->render('responsable/new.html.twig', [
            'responsable' => $responsable,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="responsable_show", methods={"GET"})
     * @param Responsable $responsable
     * @return Response
     */
    public function show(Responsable $responsable): Response
    {
        return $this->render('responsable/show.html.twig', [
            'responsable' => $responsable,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="responsable_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Responsable $responsable
     * @return Response
     */
    public function edit(Request $request, Responsable $responsable): Response
    {
        $form = $this->createForm(ResponsableType::class, $responsable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('responsable_index', [
                'id' => $responsable->getId(),
            ]);
        }

        return $this->render('responsable/edit.html.twig', [
            'responsable' => $responsable,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="responsable_delete", methods={"DELETE"})
     * @param Request $request
     * @param Responsable $responsable
     * @return Response
     */
    public function delete(Request $request, Responsable $responsable): Response
    {
        if ($this->isCsrfTokenValid('delete'.$responsable->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($responsable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('responsable_index');
    }
}
