<?php

namespace VMS\VitrineBundle\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use VMS\VitrineBundle\Entity\Marque;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class MarqueController extends Controller
{
    /**
     * @Rest\Get("/api/marques")
     */
    public function getMarquesAction(Request $request)
    {
        $marques = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Marque')->findAll();
        $formatted = [];

        foreach ($marques as $marque)
            $formatted[] = [
                'id'      => $marque->getId(),
                'libelle' => $marque->getLibelle()
            ];

        if (empty($marques)) {
            return new JsonResponse(['message' => 'Marques non trouvées'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Rest\Get("/api/marques/{id}")
     */
    public function getMarqueAction($id, Request $request)
    {
        $marque = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Marque')->find($id);
        $formatted = [];

        $formatted[] = [
            'id'          => $marque->getId(),
            'libelle'     => $marque->getLibelle()
        ];

        if (empty($marque)) {
            return new JsonResponse(['message' => 'Marque non trouvée'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($formatted);
    }
}