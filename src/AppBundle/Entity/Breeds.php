<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Breeds
 *
 * @ORM\Table(name="breeds")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BreedsRepository")
 */
class Breeds
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
     * @ORM\Column(name="breed", type="string", length=255, nullable=true)
     */
    private $breed;

    /**
     * @var text
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Pets", mappedBy="breeds")
     */

    private $pets;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pets = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set breed
     *
     * @param string $breed
     * @return Breeds
     */
    public function setBreed($breed)
    {
        $this->breed = $breed;

        return $this;
    }

    /**
     * Get breed
     *
     * @return string 
     */
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Breeds
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add pets
     *
     * @param \AppBundle\Entity\Pets $pets
     * @return Breeds
     */
    public function addPet(\AppBundle\Entity\Pets $pets)
    {
        $this->pets[] = $pets;

        return $this;
    }

    /**
     * Remove pets
     *
     * @param \AppBundle\Entity\Pets $pets
     */
    public function removePet(\AppBundle\Entity\Pets $pets)
    {
        $this->pets->removeElement($pets);
    }

    /**
     * Get pets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPets()
    {
        return $this->pets;
    }
}
