<?php

namespace App\Controller;

use App\Entity\Arbitro;
use App\Entity\Equipo;
use App\Entity\Sede;
use App\Form\ArbitroType;
use App\Repository\ArbitroRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InicioController extends AbstractController
{
    #[Route(path: '/', name: 'portada')]
    public function portada(): Response
    {
        return $this->render('portada.html.twig');
    }
}