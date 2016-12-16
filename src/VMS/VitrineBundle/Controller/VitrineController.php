<?php
/**
 * Created by PhpStorm.
 * User: AeroZzSkyline
 * Date: 18/11/2016
 * Time: 13:59
 */

namespace VMS\VitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class  VitrineController extends Controller
{
    public function indexAction(Request $request)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('VMSVitrineBundle:Produit')
        ;

        $session = $request->getSession();

        $products = $session->get('products');

        if(isset($products))
        {
            $listProduits = $products;
            $session->remove('products');
        }
        else
        {
            $listProduits = $repository->findAll();
        }

        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $listProduits,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',8)
        );



        return $this->render('VMSVitrineBundle:Default:vitrine.html.twig',
            array(
                'listProduits' => $result
            ));
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
        $listProduitSameCategorie = $repository->findByCategoryLimit($categorieProduit, 99, $id);
        

        return $this->render('VMSVitrineBundle:Default:product.html.twig', array(
            "produit" => $produit,
            "listProduitSameCategorie" => $listProduitSameCategorie,
            "listProduitAll" => $listProduitAll
        ));
    }
   
    public function searchAction(Request $request)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('VMSVitrineBundle:Produit')
        ;

        $text = $request->query->get('text');

        $session = $request->getSession();

        $products = $repository->findLikeText($text);

        $session->set('products', $products);

        return $this->redirect($this->generateUrl('vms_vitrine'));
    }

    public function filtersAction(Request $request)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('VMSVitrineBundle:Produit')
        ;

        $category = $request->query->get('category');
        $priceMin = $request->query->get('priceMin');
        $priceMax = $request->query->get('priceMax');


        $session = $request->getSession();

        $products = $repository->findFilters($category, $priceMin, $priceMax);

        $session->set('products', $products);

        return $this->redirect($this->generateUrl('vms_vitrine'));
    }

}
