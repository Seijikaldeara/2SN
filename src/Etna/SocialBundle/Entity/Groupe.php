<?php

namespace Etna\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Groupe
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
     * @ORM\Column(name="g_nom", type="string", length=255)
     */
    private $g_nom;


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
     * Set g_nom
     *
     * @param string $gNom
     * @return Groupe
     */
    public function setGNom($gNom)
    {
        $this->g_nom = $gNom;
    
        return $this;
    }

    /**
     * Get g_nom
     *
     * @return string 
     */
    public function getGNom()
    {
        return $this->g_nom;
    }
}