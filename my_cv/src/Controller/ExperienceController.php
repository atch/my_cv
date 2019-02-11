<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Experience;
use App\Form\ExperienceType;

class ExperienceController extends AbstractController
{
    public function create()
{
    $experience = new Experience();
    $form = $this->createForm(ExperienceType::class, $experience);
    
    return $this->render('experience/create.html.twig', [
        'entity' => $experience,
        'form' => $form->createView(),
        ]
        );
}
}