<?php

namespace VMS\VitrineBundle\Controller\API;

use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use VMS\VitrineBundle\Entity\Categorie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class CategorieController extends Controller
{
    /**
     * @Rest\Get("/api/categories")
     */
    public function getCategoriesAction(Request $request)
    {
        $categories = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Categorie')->findAll();
        $formatted = [];

        foreach ($categories as $categorie)
            $formatted[] = [
                'id' => $categorie->getId(),
                'libelle' => $categorie->getLibelle(),
                'description' => $categorie->getDescription(),
            ];

        if (empty($categories)) {
            return new JsonResponse(['message' => 'Categories not found'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Rest\Get("/api/categories/{id}")
     */
    public function getIdAction($id, Request $request)
    {
        $categorie = $this->getDoctrine()->getManager()->getRepository('VMSVitrineBundle:Categorie')->find($id);
        $formatted = [];

        $formatted[] = [
            'id' => $categorie->getId(),
            'libelle' => $categorie->getLibelle(),
            'description' => $categorie->getDescription(),
        ];

        if (empty($categorie)) {
            return new JsonResponse(['message' => 'Categories not found'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Rest\Delete("/api/categories/{id}")
     */
    public function deleteAction($id)
    {
        $sn = $this->getDoctrine()->getManager();
        $categorie = $this->getDoctrine()->getRepository('VMSVitrineBundle:Categorie')->find($id);
        if (empty($categorie)) {
            return new JsonResponse("categorie not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($categorie);
            $sn->flush();
        }
        return new JsonResponse("deleted successfully", Response::HTTP_OK);
    }

    /**
     * @Rest\Post("/api/categories/")
     */
    public function postAction(Request $request)
    {
        $data = new Categorie();
        $libelle = $request->get('libelle');
        $description = $request->get('description');

        if(empty($libelle))
        {
            return new JsonResponse("LIBELLE NOT ALLOWED" , Response::HTTP_NOT_ACCEPTABLE);
        }
        $data->setLibelle($libelle);
        $data->setDescription($description);
        $em = $this->getDoctrine()->getManager();
        $em->persist($data);
        $em->flush();
        return new JsonResponse("Categorie Added Successfully", Response::HTTP_OK);
    }

    /**
     * @Rest\Put("/api/categories/{id}")
     */
    public function updateAction($id,Request $request)
    {
        $data = new Categorie();
        $libelle = $request->get('libelle');
        $description = $request->get('description');
        $sn = $this->getDoctrine()->getManager();
        $categorie = $this->getDoctrine()->getRepository('VMSVitrineBundle:Categorie')->find($id);
        if (empty($categorie)) {
            return new JsonResponse("Produit not found", Response::HTTP_NOT_FOUND);
        }
        elseif(!empty($libelle))
        {
            $categorie->setLibelle($libelle);
            $categorie->setDescription($description);
            $sn->flush();
            return new JsonResponse("Produit Updated Successfully", Response::HTTP_OK);
        }
        else return new JsonResponse("Need update all", Response::HTTP_NOT_ACCEPTABLE);
    }
}
