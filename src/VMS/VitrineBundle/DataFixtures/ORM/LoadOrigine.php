<?php
/**
 * Created by PhpStorm.
 * User: AeroZzSkyline
 * Date: 15/05/2017
 * Time: 15:00
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VMS\VitrineBundle\Entity\Origine;

class LoadOrigine extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $origine1 = new Origine();
        $origine1->setLibelle('France');
        $manager->persist($origine1);

        $origine2 = new Origine();
        $origine2->setLibelle('Italie');
        $manager->persist($origine2);
        
        $origine3 = new Origine();
        $origine3->setLibelle('Etats-Unis');
        $manager->persist($origine3);

        $origine4 = new Origine();
        $origine4->setLibelle('Brésil');
        $manager->persist($origine4);

        $origine5 = new Origine();
        $origine5->setLibelle('Chine');
        $manager->persist($origine5);

        $origine6 = new Origine();
        $origine6->setLibelle('Japon');
        $manager->persist($origine6);


        $manager->flush();

        $this->addReference('France', $origine1);
        $this->addReference('Italie', $origine2);
        $this->addReference('Etats-Unis', $origine3);
        $this->addReference('Brésil', $origine4);
        $this->addReference('Chine', $origine5);
        $this->addReference('Japon', $origine6);
    }
    public function getOrder()
    {
        return 3;
    }

}
