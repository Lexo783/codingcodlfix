<?php

namespace App\Form;

use App\Entity\MediaSeries;
use App\Entity\Season;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaSeriesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('number')
            ->add('media_url')
            ->add('release_date')
            ->add('season',EntityType::class, [
            'label' => 'Saison',
            'class' => Season::class,
            'choice_label' => 'title',
            'multiple' => false,
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
            'data_class' => MediaSeries::class,
        ]);
    }
}
