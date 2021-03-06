<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Entity\Photo;
use Leapt\CoreBundle\Form\Type\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class PhotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('file', ImageType::class, [
            'label'        => 'Image',
            'file_path'    => 'path',
            'required'     => false,
            'allow_delete' => false,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefault('data_class', Photo::class);
    }
}
