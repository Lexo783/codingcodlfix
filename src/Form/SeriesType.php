<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\Series;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeriesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('short_summary')
            ->add('summary')
            ->add('status')
            ->add('release_date')
            ->add('idimg')
            ->add('genre',EntityType::class,[
                'label' => 'genre',
                'class' => Genre::class,
                'choice_label' => 'Genre_name',
                'multiple' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Series::class,
        ]);
    }
}
