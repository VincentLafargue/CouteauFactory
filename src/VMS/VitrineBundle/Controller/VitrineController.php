<?php
/**
 * Created by PhpStorm.
 * User: AeroZzSkyline
 * Date: 18/11/2016
 * Time: 13:59
 */

namespace VMS\VitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use VMS\VitrineBundle\VMSVitrineBundle;

class  VitrineController extends Controller
{
    public function indexAction($page)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('VMSVitrineBundle:Produit')
        ;

        return $this->render('VMSVitrineBundle:Default:vitrine.html.twig');
    }

    public function vueAction($id)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('VMSVitrineBundle:Produit')
        ;

        $produit = $repository->find($id);
        $categorieProduit = $produit->getCategorie();

        $listProduitAll = $repository->findByDateLimit(4);
        $listProduitSameCategorie = $repository->findByCategoryLimit($categorieProduit, 3, $id);
        

        return $this->render('VMSVitrineBundle:Default:product.html.twig', array(
            "produit" => $produit,
            "listProduitSameCategorie" => $listProduitSameCategorie,
            "listProduitAll" => $listProduitAll
        ));
    }

    public function ajouterAction()
    {

    }

    public function editerAction($id)
    {

    }

    public function supprimerAction($id)
    {

    }

    public function panierAction()
    {

    }public function connexionAction()
{

}

    public function inscriptionAction()
    {

    }


}
