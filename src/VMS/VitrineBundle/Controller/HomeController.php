<?php
/**
 * Created by PhpStorm.
 * User: AeroZzSkyline
 * Date: 18/11/2016
 * Time: 13:21
 */
namespace VMS\VitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use VMS\VitrineBundle\Repository\MarqueRepository;
use VMS\VitrineBundle\Repository\ProduitRepository;


class HomeController extends Controller
{
    public function indexAction()
    {
        /** @var ProduitRepository $produitRepository */
        $produitRepository = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Produit');

        $listProduit5 = $produitRepository->findByDateLimit(5);
        $listProduit3 = $produitRepository->findByDateLimit(3);

        /** @var MarqueRepository $marqueRepository */
        $marqueRepository = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Marque');

        $listMarques = $marqueRepository->findAll();

        return $this->render('VMSVitrineBundle:Default:index.html.twig', array(
            'listProduit' => $listProduit5,
            'listProduit3' => $listProduit3,
            'listMarques' => $listMarques
        ));
    }   
    
}
