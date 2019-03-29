<?php

namespace App\Controller;

use App\Entity\Passager;
use App\Entity\Pilote;
use App\Entity\Avion;
use App\Entity\Vol;
use App\Form\VolType;
use App\Repository\VolRepository;
use App\Repository\PassagerRepository;
use App\Repository\PiloteRepository;
use App\Repository\AvionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vol")
 */
class VolController extends AbstractController
{
    /**
     * @Route("/", name="vol_index", methods={"GET"})
     * @param VolRepository $volRepository
     * @return Response
     */
    public function index(VolRepository $volRepository): Response
    {
        return $this->render('vol/index.html.twig', [
            'vols' => $volRepository->findAll(),
        ]);
    }

    /**
     * @Route("/indexPassager", name="vol_indexpassager", methods={"GET"})
     * @param VolRepository $volRepository
     * @return Response
     */
    public function indexpPassager(VolRepository $volRepository): Response
    {
        return $this->render('vol/indexPassager.html.twig', [
            'vols' => $volRepository->findAll(),
        ]);
    }

    /**
     * @Route("/indexPassagerConfirm/{id}", name="vol_indexPassagerConfirm", methods={"GET"})
     * @param Vol $vol
     * @param PassagerRepository $passagerRepository
     * @param VolRepository $volRepository
     * @return Response
     */
    public function affectationPassager(Vol $vol, PassagerRepository $passagerRepository, VolRepository $volRepository): Response
    {
        $passager = $passagerRepository->find(1);
        $entityManager = $this->getDoctrine()->getManager();
        $vol->addPassager($passager);
        $entityManager->persist($vol);
        $entityManager->flush();
        return $this->render('vol/indexPassagerConfirm.html.twig', [
            'vols' => $volRepository->findAll(),
        ]);
    }

    /**
     * @Route("/listingvolPassager", name="vol_listingvolPassager", methods={"GET"})
     * @return Response
     */
    public function listingvolPassager():Response
    {
        $em = $this->getDoctrine()->getManager();
        $passager = $em->getRepository(Passager::class)->find(1);
        return $this->render('vol/listingvolPassager.html.twig',[
            'passager' => $passager
        ]);

    }

    /**
     * @Route("/listingvolPilote", name="vol_listingvolPilote", methods={"GET"})
     * @return Response
     */
    public function listingvolPilote():Response
    {
        $em = $this->getDoctrine()->getManager();
        $pilote = $em->getRepository(Pilote::class)->find(1);
        return $this->render('vol/listingvolPilote.html.twig',[
            'pilote' => $pilote
        ]);
    }

    /**
     * @Route("/listingvoldepartResponsable", name="vol_listingvoldepartResponsable", methods={"GET"})
     * @return Response
     */
    public function listingvoldepartResponsable():Response
    {
        $em = $this->getDoctrine()->getManager();
        $vols = $em->getRepository(Vol::class)->findAll();
        return $this->render('vol/listingvoldepartResponsable.html.twig',[
            'vols' => $vols
        ]);
    }

    /**
     * @Route("/listingvolAvion", name="vol_listingvolAvion", methods={"GET"})
     * @return Response
     */
    public function listingvolAvion():Response
    {
        $em = $this->getDoctrine()->getManager();
        $avions = $em->getRepository(Avion::class)->findAll();
        return $this->render('vol/listingvolAvion.html.twig',[
            'avions' => $avions
        ]);
    }

    /**
     * @Route("/listingVolparavion", name="vol_listingVolparavion", methods={"GET"})
     * @return Response
     */
    public function listingVolparavion(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $avion = $em->getRepository(Avion::class)->find(1);
        return $this->render('vol/listingVolparavion.html.twig', [
            'avion' => $avion,
        ]);
    }


    /**
     * @Route("/ajout", name="vol_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $vol = new Vol();
        $form = $this->createForm(VolType::class, $vol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vol);
            $entityManager->flush();

            return $this->redirectToRoute('vol_index');
        }

        return $this->render('vol/new.html.twig', [
            'vol' => $vol,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vol_show", methods={"GET"})
     */
    public function show(Vol $vol): Response
    {
        return $this->render('vol/show.html.twig', [
            'vol' => $vol,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="vol_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Vol $vol): Response
    {
        $form = $this->createForm(VolType::class, $vol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vol_index', [
                'id' => $vol->getId(),
            ]);
        }

        return $this->render('vol/edit.html.twig', [
            'vol' => $vol,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vol_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Vol $vol): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vol->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vol);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vol_index');
    }

}
