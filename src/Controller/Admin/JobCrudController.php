<?php

namespace App\Controller\Admin;

use App\Entity\Job;
use DateTime;
use Doctrine\ORM\Query\Expr\Select;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class JobCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Job::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $jobType = [
            'full time' => 'full time',
            'Part time' => 'Part time',
            'Temporary' => 'Temporary',
            'Freelance' => 'Freelance',
            'Seasonal' => 'Seasonal'
            
           
        ];

        return [
            TextField::new('nameJob'),
            AssociationField::new('compagny'),
            AssociationField::new('jobCategory'),
            TextField::new('location'),
            IntegerField::new('salary'),
            TextField::new('reference'),
            DateTimeField::new('createdAt'),
            ChoiceField::new('jobType')->setChoices($jobType),
            DateTimeField::new('startedAt')
        ];
    }
    
}
