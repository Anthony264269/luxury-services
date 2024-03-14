<?php

namespace App\Form;

use App\Entity\Candidacy;
use App\Entity\Candidat;
use App\Entity\Experience;
use App\Entity\File;
use App\Entity\Gender;
use App\Entity\JobCategory;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('adress')
            ->add('country')
            ->add('nationality')
            ->add('currentLocation')
            ->add('birthAt', null, [
                'widget' => 'single_text',
            ])
            ->add('placeOfBirth')
            ->add('description')
            ->add('passportFile', EntityType::class, [
                'class' => File::class,
                'choice_label' => 'id',
            ])
            ->add('curriculumVitae', EntityType::class, [
                'class' => File::class,
                'choice_label' => 'id',
            ])
            ->add('profilPicture', EntityType::class, [
                'class' => File::class,
                'choice_label' => 'id',
            ])
            ->add('jobCategory', EntityType::class, [
                'class' => JobCategory::class,
                'choice_label' => 'category',
            ])
            ->add('genre', EntityType::class, [
                'class' => Gender::class,
                'choice_label' => 'genre',
            ])
            // ->add('candidacy', EntityType::class, [
            //     'class' => Candidacy::class,
            //     'choice_label' => 'id',
            // ])
            ->add('experience', EntityType::class, [
                'class' => Experience::class,
                'choice_label' => 'name',
            ])
     
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
