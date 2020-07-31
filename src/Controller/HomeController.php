<?php
// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Creations;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        // $creation = new Creations();
        // $creation->setName('Salah Primeur')
        //     ->setDescription("Création d'un site pour un primeur")
        //     ->setPicture('')
        //     ->setLink('');
        // $em = $this->getDoctrine()->getManager();
        // $em->persist($creation);
        // $em->flush();
        $creations = $this->getDoctrine()->getRepository(Creations::class)->findLatest();
        return $this->render('pages/index.html.twig',[
            'creations' => $creations
        ]);
    }
}