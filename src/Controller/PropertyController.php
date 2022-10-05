<?php

namespace App\Controller;
use App\Entity\Property; 
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\PropertyRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PropertyController extends AbstractController
{
    #[Route('/property', name: 'app_property')]
    public function index(ManagerRegistry $doctrine,PropertyRepository $repo): Response

    {
        $prop = $repo->findAllVisible();
        dump($prop);
   
        return $this->render('property/index.html.twig', [
            'controller_name' => 'PropertyController',
        ]);
    }



    #[Route('/property/{title}-{id}', name: 'property.show')]

    public function show($title,$id,PropertyRepository $repo) :Response {
        $property = $repo->find($id);
        return $this->render('property/show.html.twig', [
            'property' =>$property, 
            'controller_name' => 'PropertyController',
        ]);

    }
}
