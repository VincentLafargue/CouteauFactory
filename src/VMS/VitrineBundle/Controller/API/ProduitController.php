<?php

namespace VMS\VitrineBundle\Controller\API;

use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use VMS\VitrineBundle\Entity\Produit;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class ProduitController extends Controller
{
    /**
     * @Rest\Get("/api/produits")
     */
    public function getProduitsAction(Request $request)
    {
        $products = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Produit')->findAll();
        $formatted = [];

        foreach ($products as $product)
            $formatted[] = [
                'id' => $product->getId(),
                'img' => $product->getImagePath(),
                'libelle' => $product->getlibelleProduit(),
                'description' => $product -> getDescriptionProduit(),
                'categorie' => $product->getCategorie(),
                'prix' => $product->getPrix(),
                'taux' => $product->getTauxReduc(),
                'origine' => $product -> getOrigine(),
                'poids' => $product -> getPoids(),
                'materiaux' =>$product -> getMateriauxLame(),
                'taille' => $product -> getTaille(),
                'stock' => $product -> getStock(),

            ];

        if (empty($products)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Rest\Get("/api/produits/{id}")
    */
    public function getIdAction($id, Request $request)
    {
        $product = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Produit')->find($id);
        $formatted = [];

        $formatted[] = [
            'id' => $product->getId(),
            'img' => $product->getImagePath(),
            'libelle' => $product->getlibelleProduit(),
            'description' => $product -> getDescriptionProduit(),
            'categorie' => $product->getCategorie(),
            'prix' => $product->getPrix(),
            'taux' => $product->getTauxReduc(),
            'origine' => $product -> getOrigine(),
            'poids' => $product -> getPoids(),
            'materiaux' =>$product -> getMateriauxLame(),
            'taille' => $product -> getTaille(),
            'stock' => $product -> getStock(),
        ];

        if (empty($product)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($formatted);
    }


    /**
     * @Rest\Delete("/api/produits/{id}")
     */
    public function deleteAction($id)
    {
        $data = new Produit;
        $sn = $this->getDoctrine()->getManager();
        $produit = $this->getDoctrine()->getRepository('VMSVitrineBundle:Produit')->find($id);
        if (empty($produit)) {
            return new JsonResponse("produit not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($produit);
            $sn->flush();
        }
        return new JsonResponse("deleted successfully", Response::HTTP_OK);
    }

    /**
     * @Rest\Post("/api/produits")
     */
    public function postAction(Request $request)
    {
        $data = new Produit;
        $img = $request->get('image');
        $prix = $request->get('prix');
        $stock = $request->get('stock');
        $categorie = $request->get('categorie');
        $libelle_produit = $request->get('libelle');
        $description_produit = $request->get('description');
        $taille = $request->get('taille');
        $materiaux = $request->get('materiaux');
        $poids = $request->get('poids');
        $origine = $request->get('origine');
        $reduc  = $request->get('reduc');
        if(empty($libelle_produit))
        {
            return new JsonResponse("LIBELLE NOT ALLOWED" , Response::HTTP_NOT_ACCEPTABLE);
        }
        $data->setImagePath($img);
        $data->setPrix($prix);
        $data->setStock($stock);
        $data->setCategorie($categorie);
        $data->setLibelleProduit($libelle_produit);
        $data->setDescriptionProduit($description_produit);
        $data->setTaille($taille);
        $data->setMateriauxLame($materiaux);
        $data->setPoids($poids);
        $data->setOrigine($origine);
        $data->setTauxReduc($reduc);
        $em = $this->getDoctrine()->getManager();
        $em->persist($data);
        $em->flush();
        return new JsonResponse("Produit Added Successfully", Response::HTTP_OK);
    }

    /**
     * @Rest\Put("/api/produits/{id}")
     */
    public function updateAction($id,Request $request)
    {
        $data = new Produit;
        $img = $request->get('image');
        $prix = $request->get('prix');
        $stock = $request->get('stock');
        $categorie = $request->get('categorie');
        $libelle_produit = $request->get('libelle');
        $description_produit = $request->get('description');
        $taille = $request->get('taille');
        $materiaux = $request->get('materiaux');
        $poids = $request->get('poids');
        $origine = $request->get('origine');
        $reduc  = $request->get('reduc');
        $sn = $this->getDoctrine()->getManager();
        $produit = $this->getDoctrine()->getRepository('VMSVitrineBundle:Produit')->find($id);
        if (empty($produit)) {
            return new JsonResponse("Produit not found", Response::HTTP_NOT_FOUND);
        }
        elseif(!empty($libelle_produit))
        {
            $produit->setImagePath($img);
            $produit->setPrix($prix);
            $produit->setStock($stock);
            $produit->setCategorie($categorie);
            $produit->setLibelleProduit($libelle_produit);
            $produit->setDescriptionProduit($description_produit);
            $produit->setTaille($taille);
            $produit->setMateriauxLame($materiaux);
            $produit->setPoids($poids);
            $produit->setOrigine($origine);
            $produit->setTauxReduc($reduc);
            $sn->flush();
            return new JsonResponse("Produit Updated Successfully", Response::HTTP_OK);
        }
        else return new JsonResponse("Need update all", Response::HTTP_NOT_ACCEPTABLE);
    }
}
