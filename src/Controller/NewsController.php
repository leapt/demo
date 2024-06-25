<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\News;
use App\Form\Type\NewsType;
use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/news', name: 'app_news_')]
final class NewsController extends AbstractController
{
    public function __construct(private readonly NewsRepository $newsRepository) {}

    #[Route('/{slug}', name: 'view')]
    public function view(News $news): Response
    {
        return $this->render('news/view.html.twig', [
            'news' => $news,
        ]);
    }

    #[Route('/update/{id}', name: 'update')]
    public function update(Request $request, News $news): Response
    {
        $form = $this->createForm(NewsType::class, $news, [
            'method' => 'POST',
            'action' => $this->generateUrl('app_news_update', ['id' => $news->getId()]),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->newsRepository->save($news);

            return $this->redirectToRoute('app_datalist_bootstrap_5_grid');
        }

        return $this->render('news/update.html.twig', [
            'news' => $news,
            'form' => $form,
        ]);
    }
}
