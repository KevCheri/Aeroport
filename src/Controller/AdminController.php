<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    /**
     * Fonction qui a été créer pour pouvoir lister les Utilisateurs
     */

    /**
     * @Route("/listingUsers", name="vol_listingUsers", methods={"GET"})
     */
    public function listingUsers()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(User::class)->findAll();
        return $this->render('user/index.html.twig',[
            'users' => $users
        ]);

    }
}
