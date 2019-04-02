<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        if ($this->container->get('security.token_storage')->getToken()->getUser() == 'anon.')
            return $this->redirectToRoute('fos_user_security_login');
        else if ($this->container->get('security.token_storage')->getToken()->getUser()->getRoles() == ['ROLE_SUPER_ADMIN', 'ROLE_USER'])
            return $this->redirectToRoute('admin');
        else if ($this->container->get('security.token_storage')->getToken()->getUser()->getRoles() == ['ROLE_GESTIONNAIRE', 'ROLE_USER'])
            return $this->redirectToRoute('office_gestionnaire');
        else if ($this->container->get('security.token_storage')->getToken()->getUser()->getRoles() == ['ROLE_PILOTE', 'ROLE_USER'])
            return $this->redirectToRoute('office_pilote');
        else if ($this->container->get('security.token_storage')->getToken()->getUser()->getRoles() == ['ROLE_RESPONSABLE', 'ROLE_USER'])
            return $this->redirectToRoute('office_responsable');
        else if ($this->container->get('security.token_storage')->getToken()->getUser()->getRoles() == ['ROLE_PASSAGER', 'ROLE_USER'])
            return $this->redirectToRoute('office_passager');
    }
}
