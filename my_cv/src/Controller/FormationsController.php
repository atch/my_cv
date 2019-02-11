<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Formations;
use App\Form\FormationsType;


class FormationsController extends AbstractController
{
    public function create()
{
    $formations = new Formations();
    $form = $this->createForm(FormationsType::class, $formations);
    
    return $this->render('Formations/create.html.twig', [
        'entity' => $formations,
        'form' => $form->createView(),
        ]
        );
    }


  public function valid(Request $request)
{
    $formations = new Formations();
    $form = $this->createForm(FormationsType::class, $formations);

 $form->handleRequest($request);
    
    if ($form->isSubmitted() && $form->isValid()) {
        $formations = $form->getData();
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($formations);
        $entityManager->flush();
        
        return $this->redirectionToRoute('index');
        
    }
    
    return $this->render('Formations/create.html.twig', [
        'entity' => $formations,
        'form' => $form->createView(),
        ]
        );
    }
}

        
