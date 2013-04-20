<?php

namespace Etna\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Album
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Album
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="a_nom", type="string", length=255)
     */
    private $a_nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="date")
     */
    private $date_creation;


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
     * Set a_nom
     *
     * @param string $aNom
     * @return Album
     */
    public function setANom($aNom)
    {
        $this->a_nom = $aNom;
    
        return $this;
    }

    /**
     * Get a_nom
     *
     * @return string 
     */
    public function getANom()
    {
        return $this->a_nom;
    }

    /**
     * Set date_creation
     *
     * @param \DateTime $dateCreation
     * @return Album
     */
    public function setDateCreation($dateCreation)
    {
        $this->date_creation = $dateCreation;
    
        return $this;
    }

    /**
     * Get date_creation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }
}