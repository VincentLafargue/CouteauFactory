<?php

namespace VMS\VitrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="VMS\VitrineBundle\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="image_path", type="string", nullable=false)
     */
    private $image_path;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="decimal", precision=7, scale=2, nullable=false)
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer", nullable=true)
     */
    private $stock;    

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_produit", type="string", length=255, nullable=false)
     */
    private $libelleProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="description_produit", type="string", length=255, nullable=true)
     */
    private $descriptionProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="taille", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="materiaux_lame", type="string", length=255, nullable=true)
     */
    private $materiauxLame;

    /**
     * @var string
     *
     * @ORM\Column(name="poids", type="string", length=255, nullable=true)
     */
    private $poids;

    /**
     * @var string
     *
     * @ORM\Column(name="origine", type="string", length=255, nullable=true)
     */
    private $origine;

    /**
     * @var string
     *
     * @ORM\Column(name="taux_reduc", type="string", length=255, nullable=true)
     */
    private $tauxReduc;

    /**
     * @ORM\ManyToOne(targetEntity="VMS\VitrineBundle\Entity\Categorie")
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="VMS\VitrineBundle\Entity\Marque")
     */
    private $marque;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set imagePath
     *
     * @param string $imagePath
     *
     * @return Produit
     */
    public function setImagePath($imagePath)
    {
        $this->image_path = $imagePath;

        return $this;
    }

    /**
     * Get imagePath
     *
     * @return string
     */
    public function getImagePath()
    {
        return $this->image_path;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     *
     * @return Produit
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set libelleProduit
     *
     * @param string $libelleProduit
     *
     * @return Produit
     */
    public function setLibelleProduit($libelleProduit)
    {
        $this->libelleProduit = $libelleProduit;

        return $this;
    }

    /**
     * Get libelleProduit
     *
     * @return string
     */
    public function getLibelleProduit()
    {
        return $this->libelleProduit;
    }

    /**
     * Set descriptionProduit
     *
     * @param string $descriptionProduit
     *
     * @return Produit
     */
    public function setDescriptionProduit($descriptionProduit)
    {
        $this->descriptionProduit = $descriptionProduit;

        return $this;
    }

    /**
     * Get descriptionProduit
     *
     * @return string
     */
    public function getDescriptionProduit()
    {
        return $this->descriptionProduit;
    }

    /**
     * Set taille
     *
     * @param string $taille
     *
     * @return Produit
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return string
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set materiauxLame
     *
     * @param string $materiauxLame
     *
     * @return Produit
     */
    public function setMateriauxLame($materiauxLame)
    {
        $this->materiauxLame = $materiauxLame;

        return $this;
    }

    /**
     * Get materiauxLame
     *
     * @return string
     */
    public function getMateriauxLame()
    {
        return $this->materiauxLame;
    }

    /**
     * Set poids
     *
     * @param string $poids
     *
     * @return Produit
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return string
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set origine
     *
     * @param string $origine
     *
     * @return Produit
     */
    public function setOrigine($origine)
    {
        $this->origine = $origine;

        return $this;
    }

    /**
     * Get origine
     *
     * @return string
     */
    public function getOrigine()
    {
        return $this->origine;
    }

    /**
     * Set tauxReduc
     *
     * @param string $tauxReduc
     *
     * @return Produit
     */
    public function setTauxReduc($tauxReduc)
    {
        $this->tauxReduc = $tauxReduc;

        return $this;
    }

    /**
     * Get tauxReduc
     *
     * @return string
     */
    public function getTauxReduc()
    {
        return $this->tauxReduc;
    }

    /**
     * Set categorie
     *
     * @param \VMS\VitrineBundle\Entity\Categorie $categorie
     *
     * @return Produit
     */
    public function setCategorie(\VMS\VitrineBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \VMS\VitrineBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set marque
     *
     * @param \VMS\VitrineBundle\Entity\Marque $marque
     *
     * @return Produit
     */
    public function setMarque(\VMS\VitrineBundle\Entity\Marque $marque = null)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return \VMS\VitrineBundle\Entity\Marque
     */
    public function getMarque()
    {
        return $this->marque;
    }
}
