<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeguridadController extends AbstractController
{
    #[Route('/entrar', name: 'app_login')]
    public function login(): Response
    {
        return $this->render('security/entrada.html.twig');
    }
    #[Route('/salir', name: 'app_logout')]
    public function logout(): Response
    {
        throw $this->createAccessDeniedException();
    }
}