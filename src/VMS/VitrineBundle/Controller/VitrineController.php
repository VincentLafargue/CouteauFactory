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
        //recupere toute les categories pour les afficher dans le menu deroulant des filtres de recherche
        $categories = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Categorie')->findAll();

        $repository = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Produit');

        //on recupere les produits envoyés depuis la session
        $products = $request->getSession()->get('products');

        //si le paramètre products=tous est passé on affiche tout les produits(cas ou on arrive sur la vitrine depuis le bandeau de lien)
        if($request->query->get('products') == "tous" )
        {
            $listProduits = $repository->findAll();
        }
        //si il y a des produits envoyés depuis la session et que la variable n'est pas vide(cas ou on utilise les filtres)
        elseif(isset($products) && !empty($products))
        {
            $listProduits = $products;
        }
        //sinon on affiche tout les produits
        else
        {
            $listProduits = $repository->findAll();
        }

        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         * 8 objets par page
         */
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $listProduits,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',8)
        );

        return $this->render('VMSVitrineBundle:Default:vitrine.html.twig',
            array(
                //pour la vitrine
                'listProduits' => $result,
                //pour le menu deroulant des filtres
                'listCategories' => $categories
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
        $categorie = $request->query->get('categorie');
        $priceMin = $request->query->get('priceMin');
        $priceMax = $request->query->get('priceMax');

        // on recupere les produits recherchés avec la methode findfilters
        $products = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Produit')->findFilters($categorie, $priceMin, $priceMax);

        //on envoie les produits a afficher dans la session
        $request->getSession()->set('products', $products);

        //on redirige vers la page d'afffichage dde la vitrine
        return $this->redirect($this->generateUrl('vms_vitrine', ['products', $products]));
    }

}
