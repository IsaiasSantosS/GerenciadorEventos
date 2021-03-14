<?php

namespace App\Controller;

use App\Repository\EventosRepository;
use Doctrine\DBAL\Types\DateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
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
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $eventos = $this->eventosRepository->findAll();
        return $this->render('home/index.html.twig', [
            'eventos' => $eventos,
        ]);
    }
}
