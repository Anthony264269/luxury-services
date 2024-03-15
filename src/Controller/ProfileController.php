<?php

namespace App\Controller;

use App\Entity\Candidat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\CandidatType;
use App\Repository\CandidatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile', methods: ['GET', 'POST'])]
    public function index(CandidatRepository $candidatRepository, Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        // vérifie si l'utilisateur est connecté, redirige s'il n'est pas connecté
        $this->redirectToLogin($user);
        
        $candidat = $candidatRepository->findOneBy([
            'user' => $user,
        ]);
        
        if (!$candidat){
             $candidat = new Candidat();
             $candidat->setUser($user);
             $entityManager->persist($candidat);
        }
              
        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()){
            // dd($candidat);
           $entityManager->flush();
        }

        return $this->render('profile/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

//     public function add(Request $request): Response
//     {
//     $candidat = new Candidat();
//     $form = $this->createForm(CandidatType::class, $candidat);
//     $form->handleRequest($request);
//     if ($form->isSubmitted() && $form->isValid()){
//         dd($candidat);
//     }
//     return $this->render('profil/index.html.twig', [
//         'form' => $form->createView()
//     ]);
// }
    public function redirectToLogin($user) {
        if(!$user) {
            $this->addFlash(
                'notLoggedIn',
                'You must be connected to access your profile'
            );
            return $this->redirectToRoute('app_login');
        }
    }
}
 