<?php

namespace VMS\VitrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marque
 *
 * @ORM\Table(name="marque")
 * @ORM\Entity(repositoryClass="VMS\VitrineBundle\Repository\MarqueRepository")
 */
class Marque
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
     * @ORM\Column(name="libelle_marque", type="string", length=255, nullable=true)
     */
    private $libelleMarque;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelleMarque
     *
     * @param string $libelleMarque
     *
     * @return Marque
     */
    public function setLibelleMarque($libelleMarque)
    {
        $this->libelleMarque = $libelleMarque;

        return $this;
    }

    /**
     * Get libelleMarque
     *
     * @return string
     */
    public function getLibelleMarque()
    {
        return $this->libelleMarque;
    }
}
