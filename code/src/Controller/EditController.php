<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleEditType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditController extends AbstractController
{
    #[Route('/article/edit/{id}', name: 'article_edit')]
    public function edit(EntityManagerInterface $em, int $id): Response
    {
        $article = $em->getRepository(Article::class)->find($id);

        $form = $this->createForm(ArticleEditType::class, $article);

        return $this->render('edit/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
