<?php

namespace App\Controller;

use App\Entity\Equipo;
use App\Entity\Sede;
use App\Repository\ArbitroRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArbitroController extends AbstractController
{
    #[Route(path: '/arbitro/listar')]
    public function todos(ArbitroRepository $arbitroRepository): Response
    {
        $arbitros = $arbitroRepository->findOrdenadosPorApellidoYNombre();
        return $this->render('arbitro/listar.html.twig', [
            'arbitros' => $arbitros
        ]);
    }

    #[Route(path: '/arbitro/listar/{nombre}')]
    public function porNombre(ArbitroRepository $arbitroRepository, string $nombre): Response
    {
        $arbitros = $arbitroRepository->findByNombreOrdenados($nombre);
        return $this->render('arbitro/listar.html.twig', [
            'arbitros' => $arbitros
        ]);
    }
}