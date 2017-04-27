<?php
/**
 * Created by PhpStorm.
 * User: AeroZzSkyline
 * Date: 26/04/2017
 * Time: 15:42
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VMS\VitrineBundle\Entity\Categorie;

class LoadCategorie implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $categorie1 = new Categorie();
        $categorie1 ->setLibelle('Couteaux papillon');
        $categorie1 ->setDescription('Les couteaux papillons se distingue par ses deux lames en libres mouvements.');
        $manager->persist($categorie1);

        $categorie2 = new Categorie();
        $categorie2 ->setLibelle('Karambit');
        $categorie2 ->setDescription('Le karambit se distingue par sa lame courbée.');
        $manager->persist($categorie2);


        $categorie3 = new Categorie();
        $categorie3 ->setLibelle('Couteaux à cran');
        $categorie3 ->setDescription('Les couteaux à cran se distinguent par leur système de déploiement rapide et de blocage de la lame par un cran d\'arret.');
        $manager->persist($categorie3);

        $categorie4 = new Categorie();
        $categorie4 ->setLibelle('Autres');
        $categorie4 ->setDescription('Categorie regroupant les autres produits.');
        $manager->persist($categorie4);

        
        $manager->flush();
    }
}
