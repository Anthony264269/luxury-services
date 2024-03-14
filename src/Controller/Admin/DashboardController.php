<?php

namespace App\Controller\Admin;

use App\Entity\Candidacy;
use App\Entity\Compagny;
use App\Entity\Experience;
use App\Entity\Gender;
use App\Entity\Job;
use App\Entity\JobCategory;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Luxury Services');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'far fa-laugh-beam', User::class);
        yield MenuItem::linkToCrud('Compagny', 'fas fa-school', Compagny::class);
        yield MenuItem::linkToCrud('Job', 'fas fa-hammer', Job::class);
        yield MenuItem::linkToCrud('JobCategory', 'fas fa-sync-alt', JobCategory::class);
        yield MenuItem::linkToCrud('Candidacy', 'fas fa-file-alt', Candidacy::class);
        yield MenuItem::linkToCrud('Genre', 'fas fa-file-alt', Gender::class);
        yield MenuItem::linkToCrud('Experience', 'fas fa-file-alt', Experience::class);


    }

  
}
