<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VMS\VitrineBundle\Entity\Categorie;
use VMS\VitrineBundle\Entity\Produit;

class LoadProduit implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $produit1 = new Produit();
        $produit1 ->setPrix('378.00');
        $produit1 ->setStock(15);
        $produit1 ->setLibelleProduit('Lame d\'Infini');
        $produit1 ->setDescriptionProduit('Cette lame émane une lueur jaune.');
        $produit1 ->setTaille('24');
        $produit1 ->setMateriauxLame('Inox');
        $produit1 ->setPoids('154');
        $produit1 ->setOrigine('Chine');
        $produit1 ->setTauxReduc('0');
        $produit1->setImagePath('couteau_infini.jpg');
        $produit1->setCategorie(3);
        $manager->persist($produit1);

        $produit2 = new Produit();
        $produit2 ->setPrix('187.00');
        $produit2 ->setStock(11);
        $produit2 ->setLibelleProduit('Cooked');
        $produit2 ->setDescriptionProduit('Couteau parfait pour la cuisine !');
        $produit2 ->setTaille('26');
        $produit2 ->setMateriauxLame('Acier/Inox');
        $produit2 ->setPoids('78');
        $produit2 ->setOrigine('France');
        $produit2 ->setTauxReduc('0');
        $produit2->setImagePath('couteau_cooked.jpg');
        $produit2->setCategorie(3);
        $manager->persist($produit2);

        $produit3 = new Produit();
        $produit3 ->setPrix('74.00');
        $produit3 ->setStock(52);
        $produit3 ->setLibelleProduit('Rappeuse');
        $produit3 ->setDescriptionProduit('Ce couteau découppe extrêmement bien tout ce qu\'il touche.');
        $produit3 ->setTaille('11');
        $produit3 ->setMateriauxLame('Inox');
        $produit3 ->setPoids('19');
        $produit3 ->setOrigine('Chine');
        $produit3 ->setTauxReduc('0');
        $produit3->setImagePath('couteau_rappeuse.jpg');
        $produit3->setCategorie(3);
        $manager->persist($produit3);

        $produit4 = new Produit();
        $produit4 ->setPrix('130.00');
        $produit4 ->setStock(7);
        $produit4 ->setLibelleProduit('Hachoir');
        $produit4 ->setDescriptionProduit('Parfait pour découper le poisson !');
        $produit4 ->setTaille('30');
        $produit4 ->setMateriauxLame('Fer');
        $produit4 ->setPoids('450');
        $produit4 ->setOrigine('France');
        $produit4 ->setTauxReduc('0');
        $produit4->setImagePath('couteau_hachoir.jpg');
        $produit4->setCategorie(4);
        $manager->persist($produit4);

        $produit5 = new Produit();
        $produit5 ->setPrix('139.00');
        $produit5 ->setStock(16);
        $produit5 ->setLibelleProduit('FGX');
        $produit5 ->setDescriptionProduit('Parfait pour découper les SISR !');
        $produit5 ->setTaille('17');
        $produit5 ->setMateriauxLame('Fibre de verre');
        $produit5 ->setPoids('97');
        $produit5 ->setOrigine('France');
        $produit5 ->setTauxReduc('0');
        $produit5->setImagePath('couteau_fgx.jpg');
        $produit5->setCategorie(2);
        $manager->persist($produit5);


        $produit6 = new Produit();
        $produit6 ->setLibelleProduit('Affuteur');
        $produit6 ->setPrix('25.00');
        $produit6 ->setOrigine('Brésil');
        $produit6 ->setDescriptionProduit('Utile dans toutes les situations.');
        $produit6 ->setMateriauxLame('Inox');
        $produit6 ->setPoids('45');
        $produit6 ->setStock(6);
        $produit6 ->setTaille('12');
        $produit6 ->setTauxReduc('0');
        $produit6->setImagePath('couteau_affuteur.jpg');
        $produit6->setCategorie(3);
        $manager->persist($produit6);

        $produit7 = new Produit();
        $produit7 ->setLibelleProduit('Military Police');
        $produit7 ->setPrix('63.00');
        $produit7 ->setOrigine('USA');
        $produit7 ->setDescriptionProduit('Véritable couteau de la police américaine.');
        $produit7 ->setMateriauxLame('Acier');
        $produit7 ->setPoids('59');
        $produit7 ->setStock(60);
        $produit7 ->setTaille('12');
        $produit7 ->setTauxReduc('0');
        $produit7->setImagePath('couteau_millitarypolice.jpg');
        $produit7->setCategorie(3);
        $manager->persist($produit7);

        $produit8 = new Produit();
        $produit8 ->setLibelleProduit('Colombian Jungle Sawback');
        $produit8 ->setPrix('63.00');
        $produit8 ->setOrigine('Colombie');
        $produit8 ->setDescriptionProduit('Machette de survie');
        $produit8 ->setMateriauxLame('Acier');
        $produit8 ->setPoids('254');
        $produit8 ->setStock(13);
        $produit8 ->setTaille('34');
        $produit8 ->setTauxReduc('0');
        $produit8->setImagePath('couteau_colombian.jpg');
        $produit8->setCategorie(4);
        $manager->persist($produit8);

        $produit9 = new Produit();
        $produit9 ->setLibelleProduit('Rainbow');
        $produit9 ->setPrix('63.00');
        $produit9 ->setOrigine('USA');
        $produit9 ->setDescriptionProduit('Reprodution du populaire couteau russe de 1996.');
        $produit9 ->setMateriauxLame('Acier');
        $produit9 ->setPoids('47');
        $produit9 ->setStock(13);
        $produit9 ->setTaille('16');
        $produit9 ->setTauxReduc('0');
        $produit9->setImagePath('couteau_rainbow.jpg');
        $produit9->setCategorie(3);
        $manager->persist($produit9);

        $produit10= new Produit();
        $produit10->setLibelleProduit('Tiger Steel');
        $produit10->setPrix('129.00');
        $produit10->setOrigine('France');
        $produit10->setDescriptionProduit('Parfait pour ce débarrasser du chat en toute discrétion !');
        $produit10->setMateriauxLame('Acier');
        $produit10->setPoids('64');
        $produit10->setStock(10);
        $produit10->setTaille('13');
        $produit10->setImagePath('couteau_tigersteel.jpg');
        $produit10->setTauxReduc('0');
        $produit10->setCategorie(2);
        $manager->persist($produit10);

        $produit11= new Produit();
        $produit11->setLibelleProduit('Lame dechue');
        $produit11->setPrix('49.00');
        $produit11->setOrigine('France');
        $produit11->setDescriptionProduit('Parfait pour voler des vies.');
        $produit11->setMateriauxLame('Acier');
        $produit11->setPoids('19');
        $produit11->setStock(10);
        $produit11->setTaille('27');
        $produit11->setTauxReduc('0');
        $produit11->setImagePath('couteau_lamedechue.jpg');
        $produit11->setCategorie(1);
        $manager->persist($produit11);

        $produit12= new Produit();
        $produit12->setLibelleProduit('Excalibur');
        $produit12->setPrix('547.00');
        $produit12->setOrigine('France');
        $produit12->setDescriptionProduit('La lame légendaire.');
        $produit12->setMateriauxLame('Acier');
        $produit12->setPoids('345');
        $produit12->setStock(10);
        $produit12->setTaille('50');
        $produit12->setTauxReduc('0');
        $produit12->setImagePath('couteau_excalibur.jpg');
        $produit12->setCategorie(4);
        $manager->persist($produit12);

        $produit13 = new Produit();
        $produit13->setPrix('25.00');
        $produit13->setStock(365);
        $produit13->setLibelleProduit('Peroquet');
        $produit13->setDescriptionProduit('Multiples couleurs scintillantes.');
        $produit13->setTaille('24');
        $produit13->setMateriauxLame('Fer');
        $produit13->setPoids('52');
        $produit13->setOrigine('Pérou');
        $produit13->setTauxReduc('0');
        $produit13->setImagePath('couteau_papillon.jpg');
        $produit13->setCategorie(1);
        $manager->persist($produit13);

        $produit14 = new Produit();
        $produit14->setPrix('238.00');
        $produit14->setStock(15);
        $produit14->setLibelleProduit('L\'Oprime');
        $produit14->setDescriptionProduit('Ce couteau déborde de d\'oppression.');
        $produit14->setTaille('17');
        $produit14->setMateriauxLame('Fibre de verre');
        $produit14->setPoids('50');
        $produit14->setOrigine('Inconnue');
        $produit14->setTauxReduc('0');
        $produit14->setImagePath('couteau_peur.jpg');
        $produit14->setCategorie(1);
        $manager->persist($produit14);

        $produit15 = new Produit();
        $produit15->setPrix('239.00');
        $produit15->setStock(5);
        $produit15->setLibelleProduit('The Banana');
        $produit15->setDescriptionProduit('Ce type de couteau se récolte sur certains bananiers.');
        $produit15->setTaille('15');
        $produit15->setMateriauxLame('Fibre de banane trésée');
        $produit15->setPoids('50');
        $produit15->setOrigine('Bananiers');
        $produit15->setTauxReduc('0');
        $produit15->setImagePath('couteau_banane.jpg');
        $produit15->setCategorie(1);
        $manager->persist($produit15);

        $produit16 = new Produit();
        $produit16->setPrix('297.00');
        $produit16->setStock(3);
        $produit16->setLibelleProduit('Le 4ieme');
        $produit16->setDescriptionProduit('Ce couteau est le 4ième d\'une ancienne collection extrêmement rare.');
        $produit16->setTaille('45');
        $produit16->setMateriauxLame('Ancienne pierre runique');
        $produit16->setPoids('Lourd');
        $produit16->setOrigine('Inconnue');
        $produit16->setTauxReduc('0');
        $produit16->setImagePath('couteau_4.jpg');
        $produit16->setCategorie(3);
        $manager->persist($produit16);

        $produit17 = new Produit();
        $produit17->setPrix('789.00');
        $produit17->setStock(48);
        $produit17->setLibelleProduit('Enormus');
        $produit17->setDescriptionProduit('Ce couteau est d\'une beauté et d\'une finition incroyablement extraordinaire !');
        $produit17->setTaille('22');
        $produit17->setMateriauxLame('Fibre de diamant noir');
        $produit17->setPoids('46');
        $produit17->setOrigine('Le générateur de couteaux parfait');
        $produit17->setTauxReduc('0');
        $produit17->setImagePath('couteau_enormus.jpg');
        $produit17->setCategorie(1);
        $manager->persist($produit17);

        $produit18 = new Produit();
        $produit18->setPrix('146.00');
        $produit18->setStock(2);
        $produit18->setLibelleProduit('Krimson Web');
        $produit18->setDescriptionProduit('Parfait pour passer le temps.');
        $produit18->setTaille('14');
        $produit18->setMateriauxLame('Toile rouge');
        $produit18->setPoids('41');
        $produit18->setOrigine('Russie');
        $produit18->setTauxReduc('0');
        $produit18->setImagePath('couteau_krimsonweb.jpg');
        $produit18->setCategorie(2);
        $manager->persist($produit18);

        $produit18 = new Produit();
        $produit18->setPrix('146.00');
        $produit18->setStock(2);
        $produit18->setLibelleProduit('Faded Red');
        $produit18->setDescriptionProduit('Un Magnifique Karambit faded de couleur vives.');
        $produit18->setTaille('14');
        $produit18->setMateriauxLame('Fibre de verre multicolore');
        $produit18->setPoids('49');
        $produit18->setOrigine('Russie');
        $produit18->setTauxReduc('0');
        $produit18->setImagePath('couteau_faded.jpg');
        $produit18->setCategorie(2);
        $manager->persist($produit18);


        $manager->flush();
    }
}
