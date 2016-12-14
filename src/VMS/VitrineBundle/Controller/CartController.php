<?php
/**
 * Created by PhpStorm.
 * User: AeroZzSkyline
 * Date: 11/12/2016
 * Time: 01:39
 */

namespace VMS\VitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

class CartController extends Controller
{
    public function addAction(Request $request, $id)
    {
        $session = $request->getSession();

        if (!$session->has('cart')) 
        {
            $session->set('cart', array());
        }

        $cart = $session->get('cart');

        //$cart[ID PRODUCT] => QUANTITY

        // si le produit est déjà dans le panier
        if (array_key_exists($id, $cart))
        {
            if ($request->query->get('quantity') != null)
            {
                //on remplace la valeur par celle choisis sur la page du produit
                $cart[$id] = $request->query->get('quantity');
            }
        }
        else //le produit n'est pas déja dans la panier
        {
            if ($request->query->get('quantity') != null)
            {
                //on lui met la valeur choisis sur la page du produit
                $cart[$id] = $request->query->get('quantity');
            }
            else
                //sinon c'est sur une des autres page donc on en met 1 dans le panier
                $cart[$id] = 1;
        }

        $session->set('cart', $cart);
        $this->get('session')->getFlashBag()->add('success', 'Article ajouté avec succès');

        return $this->redirect($this->generateUrl('vms_cart'));
    }

    public function changeAction(Request $request, $id)
    {
        $session = $request->getSession();

        if (!$session->has('cart'))
        {
            $session->set('cart', array());
        }
        $cart = $session->get('cart');
        //$cart[ID PRODUCT] => QUANTITY

        //le produit est déjà dans le panier
        if (array_key_exists($id, $cart))
        {
            if ($request->query->get('quantity') != null)
            {
                //on remplace la valeur par celle choisis sur la page du produit
                $cart[$id] = $request->query->get('quantity');
            }
        }


        $session->set('cart', $cart);
        $this->get('session')->getFlashBag()->add('success', 'Quantitée modifiée avec succès');

        return $this->redirect($this->generateUrl('vms_cart'));
    }

    public function cartAction(Request $request)
    {
        $session = $request->getSession();

        if (!$session->has('cart'))
        {
            $session->set('cart', array());
        }
        //dump($session->get('cart'));
        //die();

        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('VMSVitrineBundle:Produit')->findArray(array_keys($session->get('cart')));

        return $this->render('VMSVitrineBundle:Default:cart.html.twig', array(
            'products' => $products,
            'cart' => $session->get('cart')
        ));
    }

    public function removeAction(Request $request, $id)
    {
        $session = $request->getSession();

        if (!$session->has('cart'))
        {
            $session->set('cart', array());
        }

        $cart = $session->get('cart');

        if (array_key_exists($id, $cart))
        {
            unset($cart[$id]);
            $session->set('cart',$cart);
            $this->get('session')->getFlashBag()->add('success', 'Article supprimé avec succès');
        }

        return $this->redirect($this->generateUrl('vms_cart'));
    }

    public function addressAction(Request $request)
    {
        $session = $request->getSession();


        return $this->render('VMSVitrineBundle:Default:address.html.twig', array(

        ));
    }

    public function checkoutAction()
    {
        if ($this->isGranted('ROLE_USER'))
        {
            return $this->render('VMSVitrineBundle:Default:checkout.html.twig', array(
            ));
        }
        else{
            $this->get('session')->getFlashBag()->add('error', 'Veuillez vous connecter pour passer votre commande');

            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }


    }

    public function infosAction(Request $request)
    {
        $session = $request->getSession();

        if(!$session->has('cart'))
        {
            $session->set('cart', array());
            $articles = 0;
            $price = 0;
        }
        else
        {
            $articles = count($session->get('cart'));

            $cart = $session->get('cart');

            $em = $this->getDoctrine()->getManager();

            $products = $em->getRepository('VMSVitrineBundle:Produit')->findArray(array_keys($session->get('cart')));

            $price = 0;

            foreach ($products as $product)
            {
                $price = $price + $product->getPrix() * $cart[$product->getId()] ;
            }

        }

        return $this->render('VMSVitrineBundle:Default:cartInfos/cartInfos.html.twig', array(
            'articles' => $articles,
            'price' => $price
        ));
    }
}
