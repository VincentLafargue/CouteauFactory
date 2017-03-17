<?php

namespace VMS\VitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UsersController extends Controller
{
    public function getUserAction($id, Request $request)
    {
        $product = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:User')->find($id);
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

    public function getUsersAction(Request $request)
    {
        $users = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:User')->findAll();
        $formatted = [];

        foreach ($users as $user)
            $formatted[] = [
                'id' => $user->getId(),
                'libelle' => $user->getlibelleProduit(),
                'prix' => $user->getPrix(),
            ];

        if (empty($products)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($formatted);
    }

}
