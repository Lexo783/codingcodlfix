<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\MediaMovie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaMovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('status')
            ->add('release_date')
            ->add('summary')
            ->add('trailer_url')
            ->add('genre',EntityType::class,[
                'label' => 'genre',
                'class' => Genre::class,
                'choice_label' => 'Genre_name',
                'multiple' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('shortSummary')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MediaMovie::class,
        ]);
    }
}
