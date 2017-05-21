<?php

namespace VMS\VitrineBundle\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use VMS\VitrineBundle\Entity\Origine;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class OrigineController extends Controller
{
    /**
     * @Rest\Get("/api/origines")
     */
    public function getOriginesAction(Request $request)
    {
        $origines = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Origine')->findAll();
        $formatted = [];

        foreach ($origines as $origine)
            $formatted[] = [
                'id'      => $origine->getId(),
                'libelle' => $origine->getLibelle()
            ];

        if (empty($origines)) {
            return new JsonResponse(['message' => 'Origines non trouvées'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Rest\Get("/api/origines/{id}")
     */
    public function getOrigineAction($id, Request $request)
    {
        $origine = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Origine')->find($id);
        $formatted = [];

        $formatted[] = [
            'id'          => $origine->getId(),
            'libelle'     => $origine->getLibelle()
        ];

        if (empty($origine)) {
            return new JsonResponse(['message' => 'Origine non trouvée'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($formatted);
    }
}