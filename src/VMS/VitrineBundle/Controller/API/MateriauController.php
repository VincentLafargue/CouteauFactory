<?php

namespace VMS\VitrineBundle\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use VMS\VitrineBundle\Entity\Materiau;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class MateriauController extends Controller
{
    /**
     * @Rest\Get("/api/materiaux")
     */
    public function getMateriauxAction(Request $request)
    {
        $materiaux = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Materiau')->findAll();
        $formatted = [];

        foreach ($materiaux as $materiau)
            $formatted[] = [
                'id' => $materiau->getId(),
                'libelle' => $materiau->getLibelle()
            ];

        if (empty($categories)) {
            return new JsonResponse(['message' => 'Materiaux non trouvés'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Rest\Get("/api/materiaux/{id}")
     */
    public function getMateriauAction($id, Request $request)
    {
        $materiau = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Materiau')->find($id);
        $formatted = [];

        $formatted[] = [
            'id'          => $materiau->getId(),
            'libelle'     => $materiau->getLibelle()
        ];

        if (empty($materiau)) {
            return new JsonResponse(['message' => 'Materiau non trouvé'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($formatted);
    }
}