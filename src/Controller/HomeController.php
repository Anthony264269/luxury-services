<?php

namespace App\Controller;

use App\Form\JobType;
use App\Repository\JobRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(JobRepository $jobRepository): Response
    {
        $jobs = $jobRepository ->findAll();
        $form = $this->createForm(JobType::class);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
            'jobs' => $jobs
        ]);
    }
}
