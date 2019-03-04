<?php

// src/Controller/LuckyController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Formations;
use App\Entity\Loisirs;
use App\Entity\Experience;
use Symfony\Component\Routing\Annotation\Route;

class PierreController extends controller
{
    public function number()
    {
        $number = random_int(0, 100);

        $forma = $this->getDoctrine()
        ->getRepository(Formations::class)
        ->findAll();

        $loisir = $this->getDoctrine()
        ->getRepository(Loisirs::class)
        ->findAll();

        $experience = $this->getDoctrine()
        ->getRepository(Experience::class)
        ->findAll();

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
            'formations' => $forma,
            'loisirs' => $loisir,
            'experiences' => $experience,
        ]);
    }

    /**
     * @Route("/admin")
     */
    public function admin()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }
}
