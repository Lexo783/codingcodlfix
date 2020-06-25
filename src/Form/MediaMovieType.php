<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\MediaMovie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaMovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextareaType::class,[
                'label' =>'titre',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('status',TextareaType::class,[
                'label' =>'status',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('release_date')
            ->add('summary',TextareaType::class,[
                'label' =>'description',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('trailer_url',TextareaType::class,[
                'label' =>'média-URL',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('genre',EntityType::class,[
                'label' => 'genre',
                'class' => Genre::class,
                'choice_label' => 'Genre_name',
                'multiple' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('shortSummary',TextareaType::class,[
                'label' =>'court descriptif',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('watch_duration',TextareaType::class,[
                'label' =>'temps de durée',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'hh:mm:ss'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MediaMovie::class,
        ]);
    }
}
