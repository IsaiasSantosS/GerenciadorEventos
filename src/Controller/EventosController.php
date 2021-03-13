<?php

namespace App\Controller;

use App\Entity\Eventos;
use App\Repository\EventosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventosController extends AbstractController
{
    /**
     * @var EventosRepository
     */
    private EventosRepository $eventosRepository;

    public function __construct(EventosRepository $eventosRepository)
    {
        $this->eventosRepository = $eventosRepository;
    }

    /**
     * @Route("/eventos", name="eventos")
     */
    public function index(): Response
    {
        $eventos = $this->eventosRepository->findAll();
        return $this->render('eventos/index.html.twig', [
            'eventos' => $eventos,
        ]);
    }

    /**
     * @Route ("eventos/mostrar/{id}" , name="evento_mostrar")
     */
    public function mostrar(Eventos $evento)
    {
        return $this->render('eventos/mostrar.html.twig', [
            'evento' => $evento
        ]);
    }

    /**
     * @Route("eventos/criar", name="evento_criar")
     */
    public function criar(Request $request): Response
    {
        $eventos = new Eventos();

        $form = $this->criarForm($eventos);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $evento = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($evento);
            $entityManager->flush();

            return $this->redirectToRoute('eventos');
        }

        return $this->render('eventos/novo.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("eventos/atualizar/{id}", name="evento_atualizar")
     */
    public function atualizar(Request $request, Eventos $evento)
    {
        $form = $this->criarForm($evento);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $evento = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($evento);
            $entityManager->flush();

            return $this->redirectToRoute('eventos');
        }

        return $this->render('eventos/novo.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route ("eventos/deletar/{id}", name="evento_deletar")
     */
    public function deletar(Eventos $evento)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($evento);
        $entityManager->flush();
        return $this->redirectToRoute('eventos');
    }

    /**
     * @param Eventos $eventos
     * @return \Symfony\Component\Form\FormInterface
     */
    private function criarForm(Eventos $eventos)
    {
        return $form = $this->createFormBuilder($eventos)
            ->add('titulo', TextType::class, ['label' => 'Título: '])
            ->add('dt_inicio', DateTimeType::class, ['label' => 'Data Início'])
            ->add('dt_fim', DateTimeType::class, ['label' => 'Data Fim'])
            ->add('descricao', TextareaType::class, ['label' => 'Descrição'])
            ->add('salvar', SubmitType::class, ['label' => 'Salvar'])
            ->add('limpar', ResetType::class, ['label' => 'Limpar'])
            ->getForm();
    }
}
