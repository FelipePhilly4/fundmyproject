<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        //Rechercher les données en bdd puis envois des données à la vue
        $project = $this->getDoctrine()->getRepository(Project::class)->findAll();


        return $this->render('default/index.html.twig', [
            'project' => $project,
        ]);
    }
}
