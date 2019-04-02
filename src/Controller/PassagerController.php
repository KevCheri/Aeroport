<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Passager;
use App\Form\PassagerType;
use App\Repository\PassagerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/passager")
 */
class PassagerController extends AbstractController
{
    /**
     * @Route("/", name="passager_index", methods={"GET"})
     * @param PassagerRepository $passagerRepository
     * @return Response
     */
    public function index(PassagerRepository $passagerRepository): Response
    {
        return $this->render('passager/index.html.twig', [
            'passagers' => $passagerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/office", name="office_passager", methods={"GET","POST"})
     */

    public function officePassager()
    {

        return $this->render('passager/office.html.twig', [
            'controller_name' => 'PassagerController']);

    }

    /**
     * @Route("/registerinfosPassager", name="registerinfosPassager", methods={"GET", "POST"})
     * @param PassagerRepository $passagerRepository
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     */
    public function registerinfosPassager(PassagerRepository $passagerRepository, Request $request, UserPasswordEncoderInterface $encoder):Response
    {
        $passager = new Passager();
        $form = $this->createForm(PassagerType::class, $passager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $user = new User();
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

            $entityManager = $this->getDoctrine()->getManager();

            $passager->setEmail($user->getEmail());
            $entityManager->persist($passager);
            $entityManager->flush();

            $user->setRoles(["ROLE_PASSAGER"]);
            $user->setPassager($passager);
            $entityManager->persist($user);
            $entityManager->flush();


            return $this->redirectToRoute("vol_indexpassager");
        }
        return $this->render('passager/registerinfosPassager.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new", name="passager_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    /**public function new(Request $request): Response
    {
        $passager = new Passager();
        $form = $this->createForm(PassagerType::class, $passager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($passager);
            $entityManager->flush();
            $user = new User();
            $user->setPassword("root");
            $user->setUsername($passager->getNom());
            $user->setEmail($passager->getEmail());
            $user->setRoles(["ROLE_PASSAGER"]);
            $user->setPassager($passager);
            $entityManager->persist($user);
            $entityManager->flush();


            return $this->redirectToRoute('vol_listingvolPassager');
        }

        return $this->render('passager/registerinfosPassager.html.twigg', [
            'passager' => $passager,
            'form' => $form->createView(),
        ]);
    }*/

    /**
     * @Route("/{id}", name="passager_show", methods={"GET"})
     */
    public function show(Passager $passager): Response
    {
        return $this->render('passager/show.html.twig', [
            'passager' => $passager,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="passager_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Passager $passager): Response
    {
        $form = $this->createForm(PassagerType::class, $passager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('passager_index', [
                'id' => $passager->getId(),
            ]);
        }

        return $this->render('passager/edit.html.twig', [
            'passager' => $passager,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="passager_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Passager $passager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$passager->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($passager);
            $entityManager->flush();
        }

        return $this->redirectToRoute('passager_index');
    }
}
