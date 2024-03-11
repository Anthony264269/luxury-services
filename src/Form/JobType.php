<?php

namespace App\Form;

use App\Entity\Candidacy;
use App\Entity\Compagny;
use App\Entity\Job;
use App\Entity\JobCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameJob')
            ->add('location')
            ->add('salary')
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('reference')
            ->add('jobType', ChoiceType::class, [
                'choices' => [
                    'HTML' => 'HTML',
                    'CSS' => 'CSS',
                    'Javascript' => 'Javascript',
                ],
            ])
            ->add('compagny', EntityType::class, [
                'class' => Compagny::class,
                'choice_label' => 'id',
            ])
            ->add('jobCategory', EntityType::class, [
                'class' => JobCategory::class,
                'choice_label' => 'id',
            ])
            ->add('candidacy', EntityType::class, [
                'class' => Candidacy::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
