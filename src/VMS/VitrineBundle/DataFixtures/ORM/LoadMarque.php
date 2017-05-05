<?php
/**
 * Created by PhpStorm.
 * User: AeroZzSkyline
 * Date: 05/05/2017
 * Time: 10:50
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VMS\VitrineBundle\Entity\Marque;

class LoadMarque extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $marque1 = new Marque();
        $marque1->setLibelle('Fox Knives');
        $marque1->setImagePath('marque_fox_knives.jpg');
        $marque1->setImageAlt('Fox Knives');
        $manager->persist($marque1 );

        $marque2 = new Marque();
        $marque2->setLibelle('Benchmade');
        $marque2->setImagePath('marque_benchmade.png');
        $marque2->setImageAlt('Benchmade');
        $manager->persist($marque2 );


        $marque3 = new Marque();
        $marque3->setLibelle('Cold Steel');
        $marque3->setImagePath('marque_cold_steel.jpg');
        $marque3->setImageAlt('Cold Steel');
        $manager->persist($marque3 );

        $marque4 = new Marque();
        $marque4->setLibelle('Black Legion');
        $marque4->setImagePath('marque_black_legion.jpg');
        $marque4->setImageAlt('Black Legion');
        $manager->persist($marque4 );


        $manager->flush();

        $this->addReference('fox_knives', $marque1);
        $this->addReference('benchmade', $marque2);
        $this->addReference('cold_steel', $marque3);
        $this->addReference('black_legion', $marque4);
    }
    public function getOrder()
    {
        return 2;
    }

}
