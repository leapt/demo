<?php

declare(strict_types=1);

namespace App\Controller;

use App\Datalist\Type\NewsDatalistType;
use App\Repository\NewsRepository;
use Leapt\CoreBundle\Datalist\Datalist;
use Leapt\CoreBundle\Datalist\DatalistFactory;
use Leapt\CoreBundle\Datalist\Datasource\DoctrineORMDatasource;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/datalist', name: 'app_datalist_')]
final class DatalistController extends AbstractController
{
    public function __construct(
        private readonly DatalistFactory $datalistFactory,
        private readonly NewsRepository $newsRepository,
    ) {}

    #[Route('/default-grid', name: 'default_grid')]
    public function defaultGrid(Request $request): Response
    {
        return $this->render('datalist/default_grid.html.twig', [
            'datalist' => $this->getDatalist($request, 'default'),
        ]);
    }

    #[Route('/default-tiled', name: 'default_tiled')]
    public function defaultTiled(Request $request): Response
    {
        return $this->render('datalist/default_tiled.html.twig', [
            'datalist' => $this->getDatalist($request, 'default'),
        ]);
    }

    #[Route('/bootstrap-3-grid', name: 'bootstrap_3_grid')]
    public function bootstrap3Grid(Request $request): Response
    {
        return $this->render('datalist/bootstrap_3_grid.html.twig', [
            'datalist' => $this->getDatalist($request, 'bootstrap3'),
        ]);
    }

    #[Route('/bootstrap-3-tiled', name: 'bootstrap_3_tiled')]
    public function bootstrap3Tiled(Request $request): Response
    {
        return $this->render('datalist/bootstrap_3_tiled.html.twig', [
            'datalist' => $this->getDatalist($request, 'bootstrap3'),
        ]);
    }

    #[Route('/bootstrap-4-grid', name: 'bootstrap_4_grid')]
    public function bootstrap4Grid(Request $request): Response
    {
        return $this->render('datalist/bootstrap_4_grid.html.twig', [
            'datalist' => $this->getDatalist($request, 'bootstrap4'),
        ]);
    }

    #[Route('/bootstrap-4-tiled', name: 'bootstrap_4_tiled')]
    public function bootstrap4Tiled(Request $request): Response
    {
        return $this->render('datalist/bootstrap_4_tiled.html.twig', [
            'datalist' => $this->getDatalist($request, 'bootstrap4'),
        ]);
    }

    #[Route('/bootstrap-5-grid', name: 'bootstrap_5_grid')]
    public function bootstrap5Grid(Request $request): Response
    {
        return $this->render('datalist/bootstrap_5_grid.html.twig', [
            'datalist' => $this->getDatalist($request, 'bootstrap5'),
        ]);
    }

    #[Route('/bootstrap-5-tiled', name: 'bootstrap_5_tiled')]
    public function bootstrap5Tiled(Request $request): Response
    {
        return $this->render('datalist/bootstrap_5_tiled.html.twig', [
            'datalist' => $this->getDatalist($request, 'bootstrap5'),
        ]);
    }

    private function getDatalist(Request $request, string $theme): Datalist
    {
        $queryBuilder = $this->newsRepository->createQueryBuilder('n')
            ->orderBy('n.publicationDate', 'DESC');

        $isTiled = str_contains($request->attributes->get('_route'), 'tiled');
        $datalist = $this->datalistFactory
            ->createBuilder(NewsDatalistType::class, [
                'is_tiled' => $isTiled,
                'limit_per_page' => $isTiled ? 12 : 10,
                'theme' => $theme,
            ])
            ->getDatalist();

        $datalist->setRoute($request->attributes->get('_route'))
            ->setRouteParams($request->query->all());
        $datasource = new DoctrineORMDatasource($queryBuilder);
        $datalist->setDatasource($datasource);
        $datalist->bind($request);

        return $datalist;
    }
}
