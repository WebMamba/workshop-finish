<?php

namespace App\Controller;

use App\Entity\Radio;
use App\Repository\RadioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Turbo\TurboBundle;

class HomeController extends AbstractController
{
    public function __construct(
        private readonly RadioRepository $radioRepository
    ) {}

    #[Route('/')]
    public function index(): Response
    {
        return $this->render('home.html.twig', [
            'radio' => $this->radioRepository->findOneBy(['name' => 'NOSTALGIE'])
        ]);
    }

    #[Route('/genre')]
    public function genres(): Response
    {
        return $this->render('genre.html.twig');
    }

    #[Route('/year')]
    public function years(): Response
    {
        return $this->render('years.html.twig');
    }

    #[Route('/player/{radio}')]
    public function playerStream(Request $request, Radio $radio): Response
    {
        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);

        return $this->render('player.stream.html.twig', [
            'song' => $radio->getCurrentSong()
        ]);
    }
}
