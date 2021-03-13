<?php

namespace App\Controller;

use App\Entity\Palestrante;
use App\Repository\PalestranteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PalestranteController extends AbstractController
{
    /**
     * @var PalestranteRepository
     */
    private PalestranteRepository $palestranteRepository;

    public function __construct(PalestranteRepository $palestranteRepository)
    {
        $this->palestranteRepository = $palestranteRepository;
    }

    /**
     * @Route("/palestrantes", name="palestrantes")
     */
    public function index(): Response
    {
        $palestrantes = $this->palestranteRepository->findAll();
        return $this->render('palestrante/index.html.twig', [
            'palestrantes' => $palestrantes,
        ]);
    }

    /**
     * @Route ("/palestrantes/criar", name="palestrante_criar")
     */
    public function criar(Request $request)
    {
        $palestrante = new Palestrante();
        $form = $this->criarForm($palestrante);

        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $palestrante = $form->getData();

            $entityManeger = $this->getDoctrine()->getManager();
            $entityManeger->persist($palestrante);
            $entityManeger->flush();

            return $this->redirectToRoute('palestrantes');
        }

        return $this->render('palestrante/novo.html.twig',
        [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route ("/palestrantes/atualizar/{id}", name="palestrante_atualizar")
     */
    public function atualizar(Request $request, Palestrante $palestrante)
    {
        $form = $this->criarForm($palestrante);

        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $palestrante = $form->getData();

            $entityManeger = $this->getDoctrine()->getManager();
            $entityManeger->persist($palestrante);
            $entityManeger->flush();

            return $this->redirectToRoute('palestrantes');
        }

        return $this->render('palestrante/novo.html.twig',
            [
                'form' => $form->createView(),
            ]);
    }

    /**
     * @Route ("palestrante/deletar/{id}", name="palestrante_deletar")
     */
    public function deletar(Palestrante $palestrante)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($palestrante);
        $entityManager->flush();

        return $this->redirectToRoute('palestrantes');
    }

    /**
     * @Route("palestrante/mostrar/{id}", name="palestrante_mostrar")
     */
    public function mostrar(Palestrante $palestrante)
    {
        return $this->render('palestrante/mostrar.html.twig', [
            'palestrante' => $palestrante
        ]);
    }

    /**
     * @param Palestrante $palestrante
     * @return \Symfony\Component\Form\FormInterface
     */
    private function criarForm(Palestrante $palestrante)
    {
        return $form = $this->createFormBuilder($palestrante)
            ->add('nome', TextType::class, ['label' => 'Nome'])
            ->add('especialidade', TextType::class, ['label' => 'Especialidade'])
            ->add('descricao', TextareaType::class, [
                'label' => 'Descrição',
                'required' => false
            ])
            ->add('salvar', SubmitType::class, ['label' => 'Salvar'])
            ->add('limpar', ResetType::class, ['label' => 'Limpar'])
            ->getForm();
    }
}
