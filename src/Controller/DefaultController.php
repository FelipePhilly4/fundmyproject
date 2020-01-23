<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Contribution;
use App\Entity\Project;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $projects = $this->getDoctrine()->getRepository(Project::class)->findAll();
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $contributions = $this->getDoctrine()->getRepository(Contribution::class)->findAll();
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();


        return $this->render('default/index.html.twig', [
            'projects' => $projects,
            'categories'=> $categories,
            'contributions'=> $contributions,
            'users'=> $users
        ]);
    }
}
