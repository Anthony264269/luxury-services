<?php

namespace App\Controller;

use App\Entity\Job;
use App\Form\JobType;
use App\Repository\JobRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class JobsController extends AbstractController
{//liste de tous les jobs
    // #[Route('/jobs', name: 'app_jobs')]
    // public function index(JobRepository $jobRepository): Response
    // {   
   
    //     return $this->render('jobs/index.html.twig', [
    //         'controller_name' => 'JobsController',
    //     ]);
    // }

    #[Route('/job', name: 'app_jobs', methods: ['GET', 'POST'])]
    public function index( JobRepository $jobRepository): Response
    {

        $jobs = $jobRepository ->findAll();
        return $this->render('jobs/index.html.twig', [
            'jobs' => $jobs,
            
        ]);
    }
// deuxieme rout e pour le detail d' un job!!!!!!!!!!!!!!!!!!!!!!!!!A FAIRE PAR L4 ID JE PENSE
    #[Route('/jobs/show', name: 'app_show')]
    public function show(): Response
    {
        return $this->render('jobs/show.html.twig', [
            'controller_name' => 'JobsController',
        ]);
    }

}
