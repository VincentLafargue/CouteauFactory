<?php
/**
 * Created by PhpStorm.
 * User: AeroZzSkyline
 * Date: 18/11/2016
 * Time: 13:21
 */
namespace VMS\VitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Produit');

        $listProduit5 = $repository->findBydateLimit(5);

        $listProduit3 = $repository->findBydateLimit(3);

        return $this->render('VMSVitrineBundle:Default:index.html.twig', array(
            'listProduit' => $listProduit5,
            'listProduit3' => $listProduit3
        ));
    }
}
