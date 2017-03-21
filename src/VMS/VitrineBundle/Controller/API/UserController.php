<?php

namespace VMS\VitrineBundle\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    public function getUserAction($id, Request $request)
    {
        $user = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:User')->find($id);
        $formatted = [];

        $formatted[] = [
            'id' => $user->getId(),
            'username' => $user->getUsername(),
            'mail' => $user->getEmail(),
        ];

        if (empty($user)) {
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
                'username' => $user->getUsername(),
                'mail' => $user->getEmail(),
            ];

        if (empty($users)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($formatted);
    }

}
