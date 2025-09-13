<?php

declare(strict_types=1);

namespace App\Controller;

use Leapt\SlugTypeBundle\Form\SlugType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/slug', name: 'app_slug_')]
final class SlugController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('slug/index.html.twig', [
            'form' => $this->getForm(),
        ]);
    }

    #[Route('/bootstrap-4', name: 'bootstrap_4', methods: ['GET'])]
    public function bootstrap4(): Response
    {
        return $this->render('slug/bootstrap_4.html.twig', [
            'form' => $this->getForm(),
        ]);
    }

    #[Route('/bootstrap-5', name: 'bootstrap_5', methods: ['GET'])]
    public function bootstrap5(): Response
    {
        return $this->render('slug/bootstrap_5.html.twig', [
            'form' => $this->getForm(),
        ]);
    }

    /**
     * @return FormInterface<mixed>
     */
    private function getForm(): FormInterface
    {
        return $this->createFormBuilder()
            ->add('name', TextType::class, ['attr' => ['autocomplete' => 'off']])
            ->add('slug', SlugType::class, ['target' => 'name'])
            ->getForm();
    }
}
