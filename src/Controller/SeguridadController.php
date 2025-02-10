<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SeguridadController extends AbstractController
{
    #[Route('/entrar', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $ultUsuario = $authenticationUtils->getLastUsername();
        return $this->render('security/entrada.html.twig', [
            'error' => $error,
            'ultimo_usuario' => $ultUsuario
        ]);
    }
    #[Route('/salir', name: 'app_logout')]
    public function logout(): Response
    {
        throw $this->createAccessDeniedException();
    }
}