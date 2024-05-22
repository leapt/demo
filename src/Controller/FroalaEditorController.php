<?php

declare(strict_types=1);

namespace App\Controller;

use Leapt\FroalaEditorBundle\Form\Type\FroalaEditorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/froala-editor', name: 'app_froala_editor_')]
final class FroalaEditorController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(): Response
    {
        $form = $this->createFormBuilder()
            ->add('content', FroalaEditorType::class)
            ->add('content2', FroalaEditorType::class, [
                'label' => 'With some profile defined in config',
                'froala_profile' => 'basic'
            ])
            ->getForm();

        return $this->render('froala_editor/index.html.twig', [
            'form' => $form,
        ]);
    }
}
