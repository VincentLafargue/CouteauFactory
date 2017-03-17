<?php

namespace VMS\VitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use VMS\VitrineBundle\Entity\Produit;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProduitController extends Controller
{
    public function getProduitAction($id, Request $request)
    {
        $product = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Produit')->find($id);
        $formatted = [];

        $formatted[] = [
            'id' => $product->getId(),
            'libelle' => $product->getlibelleProduit(),
            'prix' => $product->getPrix(),
        ];

        if (empty($product)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($formatted);
    }

    public function getProduitsAction(Request $request)
    {
        $products = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Produit')->findAll();
        $formatted = [];

        foreach ($products as $product)
        $formatted[] = [
        'id' => $product->getId(),
        'libelle' => $product->getlibelleProduit(),
        'prix' => $product->getPrix(),
        ];

        if (empty($products)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($formatted);
    }

}
