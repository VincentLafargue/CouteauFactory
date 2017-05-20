<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VMS\VitrineBundle\Entity\Produit;


class LoadProduit extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $produit1 = new Produit();
        $produit1 ->setPrix('378.00');
        $produit1 ->setStock(15);
        $produit1 ->setLibelle('Lame d\'Infini');
        $produit1 ->setDescription('Cette lame émane une lueur jaune.');
        $produit1 ->setTaille('24');
        $produit1 ->setMateriau($this->getReference('Inox'));
        $produit1 ->setPoids('154');
        $produit1 ->setOrigine($this->getReference('Chine'));
        $produit1 ->setTauxReduc('0');
        $produit1 ->setImagePath('couteau_infini.jpg');
        $produit1 ->setCategorie($this->getReference('cran'));
        $produit1 ->setMarque($this->getReference('fox_knives'));
        $manager->persist($produit1);

        $produit2 = new Produit();
        $produit2 ->setPrix('187.00');
        $produit2 ->setStock(11);
        $produit2 ->setLibelle('Cooked');
        $produit2 ->setDescription('Couteau parfait pour la cuisine !');
        $produit2 ->setTaille('26');
        $produit2 ->setMateriau($this->getReference('Inox'));
        $produit2 ->setPoids('78');
        $produit2 ->setOrigine($this->getReference('France'));
        $produit2 ->setTauxReduc('0');
        $produit2->setImagePath('couteau_cooked.jpg');
        $produit2->setCategorie($this->getReference('cran'));
        $produit2->setMarque($this->getReference('fox_knives'));
        $manager->persist($produit2);

        $produit3 = new Produit();
        $produit3 ->setPrix('74.00');
        $produit3 ->setStock(52);
        $produit3 ->setLibelle('Rappeuse');
        $produit3 ->setDescription('Ce couteau découppe extrêmement bien tout ce qu\'il touche.');
        $produit3 ->setTaille('11');
        $produit3 ->setMateriau($this->getReference('Inox'));
        $produit3 ->setPoids('19');
        $produit3 ->setOrigine($this->getReference('Chine'));
        $produit3 ->setTauxReduc('0');
        $produit3->setImagePath('couteau_rappeuse.jpg');
        $produit3->setCategorie($this->getReference('cran'));
        $produit3->setMarque($this->getReference('fox_knives'));
        $manager->persist($produit3);

        $produit4 = new Produit();
        $produit4 ->setPrix('130.00');
        $produit4 ->setStock(7);
        $produit4 ->setLibelle('Hachoir');
        $produit4 ->setDescription('Parfait pour découper le poisson !');
        $produit4 ->setTaille('30');
        $produit4 ->setMateriau($this->getReference('Fer'));
        $produit4 ->setPoids('450');
        $produit4 ->setOrigine($this->getReference('France'));
        $produit4 ->setTauxReduc('0');
        $produit4->setImagePath('couteau_hachoir.jpg');
        $produit4->setCategorie($this->getReference('autres'));
        $produit4->setMarque($this->getReference('fox_knives'));
        $manager->persist($produit4);

        $produit5 = new Produit();
        $produit5 ->setPrix('139.00');
        $produit5 ->setStock(16);
        $produit5 ->setLibelle('FGX');
        $produit5 ->setDescription('Parfait pour découper les SISR !');
        $produit5 ->setTaille('17');
        $produit5 ->setMateriau($this->getReference('Fibre de verre'));
        $produit5 ->setPoids('97');
        $produit5 ->setOrigine($this->getReference('France'));
        $produit5 ->setTauxReduc('0');
        $produit5->setImagePath('couteau_fgx.jpg');
        $produit5->setCategorie($this->getReference('karambit'));
        $produit5->setMarque($this->getReference('fox_knives'));
        $manager->persist($produit5);


        $produit6 = new Produit();
        $produit6 ->setLibelle('Affuteur');
        $produit6 ->setPrix('25.00');
        $produit6 ->setOrigine($this->getReference('Brésil'));
        $produit6 ->setDescription('Utile dans toutes les situations.');
        $produit6 ->setMateriau($this->getReference('Inox'));
        $produit6 ->setPoids('45');
        $produit6 ->setStock(6);
        $produit6 ->setTaille('12');
        $produit6 ->setTauxReduc('0');
        $produit6 ->setImagePath('couteau_affuteur.jpg');
        $produit6 ->setCategorie($this->getReference('cran'));
        $produit6 ->setMarque($this->getReference('black_legion'));
        $manager->persist($produit6);

        $produit7 = new Produit();
        $produit7 ->setLibelle('Military Police');
        $produit7 ->setPrix('63.00');
        $produit7 ->setOrigine($this->getReference('Etats-Unis'));
        $produit7 ->setDescription('Véritable couteau de la police américaine.');
        $produit7 ->setMateriau($this->getReference('Acier'));
        $produit7 ->setPoids('59');
        $produit7 ->setStock(60);
        $produit7 ->setTaille('12');
        $produit7 ->setTauxReduc('0');
        $produit7->setImagePath('couteau_millitarypolice.jpg');
        $produit7->setCategorie($this->getReference('cran'));
        $produit7->setMarque($this->getReference('black_legion'));
        $manager->persist($produit7);

        $produit8 = new Produit();
        $produit8 ->setLibelle('Colombian Jungle Sawback');
        $produit8 ->setPrix('63.00');
        $produit8 ->setOrigine($this->getReference('Brésil'));
        $produit8 ->setDescription('Machette de survie');
        $produit8 ->setMateriau($this->getReference('Acier'));
        $produit8 ->setPoids('254');
        $produit8 ->setStock(13);
        $produit8 ->setTaille('34');
        $produit8 ->setTauxReduc('0');
        $produit8->setImagePath('couteau_colombian.jpg');
        $produit8->setCategorie($this->getReference('autres'));
        $produit8->setMarque($this->getReference('black_legion'));
        $manager->persist($produit8);

        $produit9 = new Produit();
        $produit9 ->setLibelle('Rainbow');
        $produit9 ->setPrix('63.00');
        $produit9 ->setOrigine($this->getReference('Etats-Unis'));
        $produit9 ->setDescription('Reprodution du populaire couteau russe de 1996.');
        $produit9 ->setMateriau($this->getReference('Acier'));
        $produit9 ->setPoids('47');
        $produit9 ->setStock(13);
        $produit9 ->setTaille('16');
        $produit9 ->setTauxReduc('0');
        $produit9->setImagePath('couteau_rainbow.jpg');
        $produit9->setCategorie($this->getReference('cran'));
        $produit9->setMarque($this->getReference('black_legion'));
        $manager->persist($produit9);

        $produit10= new Produit();
        $produit10->setLibelle('Tiger Steel');
        $produit10->setPrix('129.00');
        $produit10->setOrigine($this->getReference('France'));
        $produit10->setDescription('Parfait pour ce débarrasser du chat en toute discrétion !');
        $produit10->setMateriau($this->getReference('Acier'));
        $produit10->setPoids('64');
        $produit10->setStock(10);
        $produit10->setTaille('13');
        $produit10->setImagePath('couteau_tigersteel.jpg');
        $produit10->setTauxReduc('0');
        $produit10->setCategorie($this->getReference('karambit'));
        $produit10->setMarque($this->getReference('black_legion'));
        $manager->persist($produit10);

        $produit11= new Produit();
        $produit11->setLibelle('Lame dechue');
        $produit11->setPrix('49.00');
        $produit11->setOrigine($this->getReference('France'));
        $produit11->setDescription('Parfait pour voler des vies.');
        $produit11->setMateriau($this->getReference('Acier'));
        $produit11->setPoids('19');
        $produit11->setStock(10);
        $produit11->setTaille('27');
        $produit11->setTauxReduc('0');
        $produit11->setImagePath('couteau_lamedechue.jpg');
        $produit11->setCategorie($this->getReference('papillon'));
        $produit11->setMarque($this->getReference('black_legion'));
        $manager->persist($produit11);

        $produit12= new Produit();
        $produit12->setLibelle('Excalibur');
        $produit12->setPrix('547.00');
        $produit12->setOrigine($this->getReference('France'));
        $produit12->setDescription('La lame légendaire.');
        $produit12->setMateriau($this->getReference('Acier'));
        $produit12->setPoids('345');
        $produit12->setStock(10);
        $produit12->setTaille('50');
        $produit12->setTauxReduc('0');
        $produit12->setImagePath('couteau_excalibur.jpg');
        $produit12->setCategorie($this->getReference('autres'));
        $produit12->setMarque($this->getReference('cold_steel'));
        $manager->persist($produit12);

        $produit13 = new Produit();
        $produit13->setPrix('25.00');
        $produit13->setStock(365);
        $produit13->setLibelle('Peroquet');
        $produit13->setDescription('Multiples couleurs scintillantes.');
        $produit13->setTaille('24');
        $produit13->setMateriau($this->getReference('Fer'));
        $produit13->setPoids('52');
        $produit13->setOrigine($this->getReference('Brésil'));
        $produit13->setTauxReduc('0');
        $produit13->setImagePath('couteau_papillon.jpg');
        $produit13->setCategorie($this->getReference('papillon'));
        $produit13->setMarque($this->getReference('cold_steel'));
        $manager->persist($produit13);

        $produit14 = new Produit();
        $produit14->setPrix('238.00');
        $produit14->setStock(15);
        $produit14->setLibelle('L\'Oprime');
        $produit14->setDescription('Ce couteau déborde de d\'oppression.');
        $produit14->setTaille('17');
        $produit14->setMateriau($this->getReference('Fibre de verre'));
        $produit14->setPoids('50');
        $produit14->setOrigine($this->getReference('France'));
        $produit14->setTauxReduc('0');
        $produit14->setImagePath('couteau_peur.jpg');
        $produit14->setCategorie($this->getReference('papillon'));
        $produit14->setMarque($this->getReference('cold_steel'));
        $manager->persist($produit14);

        $produit15 = new Produit();
        $produit15->setPrix('239.00');
        $produit15->setStock(5);
        $produit15->setLibelle('The Banana');
        $produit15->setDescription('Ce type de couteau se récolte sur certains bananiers.');
        $produit15->setTaille('15');
        $produit15->setMateriau($this->getReference('Fibre de banane trésée'));
        $produit15->setPoids('50');
        $produit15->setOrigine($this->getReference('France'));
        $produit15->setTauxReduc('0');
        $produit15->setImagePath('couteau_banane.jpg');
        $produit15->setCategorie($this->getReference('papillon'));
        $produit15->setMarque($this->getReference('cold_steel'));
        $manager->persist($produit15);

        $produit16 = new Produit();
        $produit16->setPrix('297.00');
        $produit16->setStock(3);
        $produit16->setLibelle('Le 4ieme');
        $produit16->setDescription('Ce couteau est le 4ième d\'une ancienne collection extrêmement rare.');
        $produit16->setTaille('45');
        $produit16->setMateriau($this->getReference('Ancienne pierre runique'));
        $produit16->setPoids('Lourd');
        $produit16->setOrigine($this->getReference('France'));
        $produit16->setTauxReduc('0');
        $produit16->setImagePath('couteau_4.jpg');
        $produit16->setCategorie($this->getReference('cran'));
        $produit16->setMarque($this->getReference('cold_steel'));
        $manager->persist($produit16);

        $produit17 = new Produit();
        $produit17->setPrix('789.00');
        $produit17->setStock(48);
        $produit17->setLibelle('Enormus');
        $produit17->setDescription('Ce couteau est d\'une beauté et d\'une finition incroyablement extraordinaire !');
        $produit17->setTaille('22');
        $produit17->setMateriau($this->getReference('Fibre de diamant noir'));
        $produit17->setPoids('46');
        $produit17->setOrigine($this->getReference('France'));
        $produit17->setTauxReduc('0');
        $produit17->setImagePath('couteau_enormus.jpg');
        $produit17->setCategorie($this->getReference('papillon'));
        $produit17->setMarque($this->getReference('benchmade'));
        $manager->persist($produit17);

        $produit18 = new Produit();
        $produit18->setPrix('146.00');
        $produit18->setStock(2);
        $produit18->setLibelle('Krimson Web');
        $produit18->setDescription('Parfait pour passer le temps.');
        $produit18->setTaille('14');
        $produit18->setMateriau($this->getReference('Toile rouge'));
        $produit18->setPoids('41');
        $produit18->setOrigine($this->getReference('Italie'));
        $produit18->setTauxReduc('0');
        $produit18->setImagePath('couteau_krimsonweb.jpg');
        $produit18->setCategorie($this->getReference('karambit'));
        $produit18->setMarque($this->getReference('benchmade'));
        $manager->persist($produit18);

        $produit19 = new Produit();
        $produit19->setPrix('146.00');
        $produit19->setStock(2);
        $produit19->setLibelle('Faded Red');
        $produit19->setDescription('Un Magnifique Karambit faded de couleur vives.');
        $produit19->setTaille('14');
        $produit19->setMateriau($this->getReference('Fibre de verre'));
        $produit19->setPoids('49');
        $produit19->setOrigine($this->getReference('Italie'));
        $produit19->setTauxReduc('0');
        $produit19->setImagePath('couteau_faded.jpg');
        $produit19->setCategorie($this->getReference('karambit'));
        $produit19->setMarque($this->getReference('benchmade'));
        $manager->persist($produit19);


        $manager->flush();
    }

    public function getOrder()
    {
        return 5;
    }
    
}
