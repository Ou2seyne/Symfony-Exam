<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MamieController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('mamie/index.html.twig', [
        ]);
    }

    #[Route('/produit', name: 'app_produit')]
 public function produit(): Response
 {
 return $this->render('mamie/produit.html.twig', [

 ]);
 }

}
