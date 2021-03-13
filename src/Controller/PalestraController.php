<?php

namespace App\Controller;

use App\Entity\Eventos;
use App\Entity\Palestra;
use App\Entity\Palestrante;
use App\Repository\PalestraRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PalestraController extends AbstractController
{
    /**
     * @var PalestraRepository
     */
    private PalestraRepository $palestraRepository;
    
    public function __construct(PalestraRepository $palestraRepository)
    {
        $this->palestraRepository = $palestraRepository;
    }

    /**
     * @Route("/palestras", name="palestras")
     */
    public function index(): Response
    {
        $palestras = $this->palestraRepository->findAll();
        return $this->render('palestra/index.html.twig', [
            'palestras' => $palestras,
        ]);
    }

    /**
     * @Route ("palestras/mostrar/{id}" , name="palestra_mostrar")
     * @param Palestras $palestra
     * @return Response
     */
    public function mostrar(Palestra $palestra): Response
    {
        return $this->render('palestra/mostrar.html.twig', [
            'palestra' => $palestra
        ]);
    }

    /**
     * @Route("palestras/criar", name="palestra_criar")
     * @param Request $request
     * @return Response
     */
    public function criar(Request $request): Response
    {
        $palestra = new Palestra();

        $form = $this->criarForm($palestra);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $palestra = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($palestra);
            $entityManager->flush();

            return $this->redirectToRoute('palestras');
        }

        return $this->render('palestra/novo.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("palestras/atualizar/{id}", name="palestra_atualizar")
     * @param Request $request
     * @param Palestra $palestra
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function atualizar(Request $request, Palestra $palestra)
    {
        $form = $this->criarForm($palestra);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $palestra = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($palestra);
            $entityManager->flush();

            return $this->redirectToRoute('palestras');
        }

        return $this->render('palestra/novo.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route ("palestras/deletar/{id}", name="palestra_deletar")
     * @param Palestra $palestra
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deletar(Palestra $palestra)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($palestra);
        $entityManager->flush();
        return $this->redirectToRoute('palestras');
    }

    /**
     * @param Palestra $palestra
     * @return \Symfony\Component\Form\FormInterface
     */
    private function criarForm(Palestra $palestra)
    {
        return $form = $this->createFormBuilder($palestra)
            ->add('titulo', TextType::class, ['label' => 'Título: '])
            ->add('data', DateType::class, ['label' => 'Data Início'])
            ->add('hora_inicio', TimeType::class, ['label' => 'Data Fim'])
            ->add('hora_fim', TimeType::class, ['label' => 'Data Fim'])
            ->add('descricao', TextareaType::class, ['label' => 'Descrição'])
            ->add('evento', EntityType::class, ['choice_label' => 'titulo',
                'class' => Eventos::class])
            ->add('palestrante', EntityType::class, ['choice_label' => 'nome',
                'class' => Palestrante::class])
            ->add('salvar', SubmitType::class, ['label' => 'Salvar'])
            ->add('limpar', ResetType::class, ['label' => 'Limpar'])
            ->getForm();
    }
}
