<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditController extends AbstractController
{
    #[Route('/article/edit/{id}', name: 'article_edit')]
    public function edit(): Response
    {

        return $this->render('edit/index.html.twig', [
            'controller_name' => 'EditController',
        ]);
    }
}
