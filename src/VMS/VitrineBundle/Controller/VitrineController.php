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
use VMS\VitrineBundle\Form\FilterProductForm;
use VMS\VitrineBundle\Repository\CategorieRepository;
use VMS\VitrineBundle\Repository\ProduitRepository;

class  VitrineController extends Controller
{
    public function indexAction(Request $request)
    {
        /** @var ProduitRepository $productRepository */
        $productRepository = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Produit');

        $form = $this->createForm(FilterProductForm::class);

        //on récupère les paramètres envoyés du formulaire de filtres
        $paramFilters = [];
        $paramFilters['min_price'] = $request->get('min_price');
        $paramFilters['max_price'] = $request->get('max_price');
        $paramFilters['category']  = $request->get('category');
        $paramFilters['text']      = $request->get('text');

        if (!empty(array_filter($paramFilters))) {
            /** @var CategorieRepository $categoryRepository */
            $categoryRepository = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Categorie');
            //array_filter vide les case "vide" du tableau avant de les envoyer a empty
            $listProduits = $productRepository->findFilters(
                $categoryRepository->findOneBy(['id' => $paramFilters['category']]),
                $paramFilters['min_price'],
                $paramFilters['max_price'],
                $paramFilters['text']
            );
        } else {
            $listProduits = $productRepository->findAll();
        }

        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         * 8 objets par page
         */
        $paginator = $this->get('knp_paginator');
        $result    = $paginator->paginate(
            $listProduits,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 8)
        );
        $result->setCustomParameters($paramFilters);

        //si on trouve aucun produit on affiche un message
        if (empty($listProduits)) {
            $this->get('session')->getFlashBag()->add('error', 'Aucun article ne correspond à vos critères');
        }

        return $this->render('VMSVitrineBundle:Default:vitrine.html.twig',
            array(
                //pour la vitrine
                'listProduits' => $result,
                'form' => $form->createView()
            ));
    }

    public function filterAction(Request $request)
    {
        $form = $this->createForm(FilterProductForm::class);
        $form->handleRequest($request);
        $data = [];
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
        }
        return $this->redirectToRoute('vms_vitrine', $data);
    }

    public function vueAction($id)
    {
        /** @var ProduitRepository $produitRepository */
        $produitRepository = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Produit');

        $produit = $produitRepository->find($id);
        $categorieProduit = $produit->getCategorie();

        $listProduitAll = $produitRepository->findByDateLimit(4);
        $listProduitSameCategorie = $produitRepository->findByCategoryLimit($categorieProduit, 99, $id);
        

        return $this->render('VMSVitrineBundle:Default:product.html.twig', array(
            "produit" => $produit,
            "listProduitSameCategorie" => $listProduitSameCategorie,
            "listProduitAll" => $listProduitAll
        ));
    }

    public function searchAction(Request $request)
    {
        /** @var ProduitRepository $repository */
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
}
