<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Services\SpeedCounter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function list(ArticleRepository $articleRepository, SpeedCounter $speedCounter): Response
    {
        $articles = $articleRepository->findAll();

        $readingTimeData = $speedCounter->getReadingTimeData($articles);

        return $this->render('pages/index.html.twig', [
            'articles' => $articles,
            'readingTimeData' => $readingTimeData,
        ]);
    }
}
