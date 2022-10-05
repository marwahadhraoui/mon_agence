<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PropertyRepository $repo): Response
    {
       $properties = $repo->findLatest();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'properties' =>$properties
        ]);
    }
}
