<?php
/**
 * Created by PhpStorm.
 * User: AeroZzSkyline
 * Date: 15/05/2017
 * Time: 15:06
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VMS\VitrineBundle\Entity\Materiau;

class LoadMateriau extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $materiau1 = new Materiau();
        $materiau1->setLibelle('Acier');
        $manager->persist($materiau1);

        $materiau2 = new Materiau();
        $materiau2->setLibelle('Inox');
        $manager->persist($materiau2);

        $materiau3 = new Materiau();
        $materiau3->setLibelle('Plastique');
        $manager->persist($materiau3);

        $materiau4 = new Materiau();
        $materiau4->setLibelle('Fibre de verre');
        $manager->persist($materiau4);

        $materiau5 = new Materiau();
        $materiau5->setLibelle('Fer');
        $manager->persist($materiau5);

        $materiau6 = new Materiau();
        $materiau6->setLibelle('Fibre de banane trésée');
        $manager->persist($materiau6);

        $materiau7 = new Materiau();
        $materiau7->setLibelle('Ancienne pierre runique');
        $manager->persist($materiau7);

        $materiau8 = new Materiau();
        $materiau8->setLibelle('Fibre de diamant noir');
        $manager->persist($materiau8);

        $materiau9 = new Materiau();
        $materiau9->setLibelle('Toile rouge');
        $manager->persist($materiau9);

        $manager->flush();

        $this->addReference('Acier', $materiau1);
        $this->addReference('Inox', $materiau2);
        $this->addReference('Plastique', $materiau3);
        $this->addReference('Fibre de verre', $materiau4);
        $this->addReference('Fer', $materiau5);
        $this->addReference('Fibre de banane trésée', $materiau6);
        $this->addReference('Ancienne pierre runique', $materiau7);
        $this->addReference('Fibre de diamant noir', $materiau8);
        $this->addReference('Toile rouge', $materiau9);


    }
    public function getOrder()
    {
        return 4;
    }

}
