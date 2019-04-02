<?php

namespace App\Controller;

use App\Entity\Pilote;
use App\Entity\User;
use App\Form\PiloteType;
use App\Repository\PiloteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/pilote")
 */
class PiloteController extends AbstractController
{
    /**
     * @Route("/", name="pilote_index", methods={"GET"})
     * @param PiloteRepository $piloteRepository
     * @return Response
     */
    public function index(PiloteRepository $piloteRepository): Response
    {
        return $this->render('pilote/index.html.twig', [
            'pilotes' => $piloteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/office", name="office_pilote", methods={"GET","POST"})
     */

    public function officePilote()
    {

        return $this->render('pilote/office.html.twig', [
            'controller_name' => 'PiloteController']);

    }

    /**
     * @Route("/new", name="pilote_new", methods={"GET","POST"})
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     */

    public function new(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $pilote = new Pilote();
        $form = $this->createForm(PiloteType::class, $pilote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = new User();
            $entityManager = $this->getDoctrine()->getManager();
            $hash_password = $encoder->encodePassword($user, 'azerty');
            $user->setPassword($hash_password);
            $entityManager->persist($pilote);
            $entityManager->flush();
            $user->setUsername($pilote->getNom());
            $user->setRoles(["ROLE_PILOTE"]);
            $user->setEmail($pilote->getEmail());
            $user->setPilote($pilote);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('pilote_index');
        }

        return $this->render('pilote/new.html.twig', [
            'pilote' => $pilote,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pilote_show", methods={"GET"})
     * @param Pilote $pilote
     * @return Response
     */
    public function show(Pilote $pilote): Response
    {
        return $this->render('pilote/show.html.twig', [
            'pilote' => $pilote,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pilote_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Pilote $pilote
     * @return Response
     */
    public function edit(Request $request, Pilote $pilote): Response
    {
        $form = $this->createForm(PiloteType::class, $pilote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pilote_index', [
                'id' => $pilote->getId(),
            ]);
        }

        return $this->render('pilote/edit.html.twig', [
            'pilote' => $pilote,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pilote_delete", methods={"DELETE"})
     * @param Request $request
     * @param Pilote $pilote
     * @return Response
     */
    public function delete(Request $request, Pilote $pilote): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pilote->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pilote);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pilote_index');
    }
}
