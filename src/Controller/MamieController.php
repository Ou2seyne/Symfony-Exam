<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AjoutCafeType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Cafe;
use Doctrine\ORM\EntityManagerInterface;

class MamieController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    { 
        return $this->render('mamie/index.html.twig', [
        ]);
    }

    #[Route('/ajout-produit', name: 'app_produit')]
 public function produit(Request $request,EntityManagerInterface $em): Response
 {
   $produit = new Cafe();
    $form = $this->createForm(AjoutCafeType::class,$produit);
    if($request->isMethod('POST')){
      $form->handleRequest($request);
      if ($form->isSubmitted()&&$form->isValid()){
         $em->persist($produit);
         $em->flush();
         $this->addFlash('success', 'Produit ajouté avec succès.');
         return $this->redirectToRoute('app_produit');
      }
      }
 return $this->render('mamie/produit.html.twig',[
    'form' => $form->createView()
 ]);
 }
}
