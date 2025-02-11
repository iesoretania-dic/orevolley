<?php

namespace App\Controller;

use App\Entity\Arbitro;
use App\Entity\Equipo;
use App\Entity\Sede;
use App\Form\ArbitroType;
use App\Repository\ArbitroRepository;
use App\Security\ArbitroVoter;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArbitroController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route(path: '/arbitro/listar', name: 'arbitro_listar')]
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

    #[Route('/arbitro/nuevo', name: 'arbitro_crear')]
    public function nuevo(Request $request, ArbitroRepository $arbitroRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $arbitro = new Arbitro();
        $arbitroRepository->persist($arbitro);
        return $this->formulario($request, $arbitroRepository, $arbitro);
    }

    #[Route(path: '/arbitro/{id}', name: 'arbitro_modificar', requirements: ['id' => '\d+'])]
    public function formulario(Request $request, ArbitroRepository $arbitroRepository, Arbitro $arbitro): Response
    {
        $this->denyAccessUnlessGranted(ArbitroVoter::MODIFICAR, $arbitro);
        $form = $this->createForm(ArbitroType::class, $arbitro);
        $form->handleRequest($request);
        $nuevo = $arbitro->getId() === null;
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $arbitroRepository->save();
                $this->addFlash('success', $nuevo ? 'Árbitro creado con éxito' : 'Cambios guardados con éxito');
                return $this->redirectToRoute('arbitro_listar');
            } catch (\Exception) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }
        return $this->render('arbitro/form.html.twig', [
            'form' => $form->createView(),
            'arbitro' => $arbitro
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route(path: '/arbitro/eliminar/{id}', name: 'arbitro_eliminar', requirements: ['id' => '\d+'])]
    public function eliminar(Request $request, ArbitroRepository $arbitroRepository, Arbitro $arbitro): Response
    {
        if ($request->request->has('confirmar')) {
            try {
                $arbitroRepository->remove($arbitro);
                $arbitroRepository->save();
                $this->addFlash('success', 'Árbitro eliminado con éxito');
                return $this->redirectToRoute('arbitro_listar');
            } catch (\Exception) {
                $this->addFlash('error', 'Ha ocurrido un error al eliminar el árbitro');
            }
        }
        return $this->render('arbitro/eliminar.html.twig', [
            'arbitro' => $arbitro
        ]);
    }
}