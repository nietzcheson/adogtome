<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pets
 *
 * @ORM\Table(name="pets")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PetsRepository")
 */
class Pets
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
    * @ORM\ManyToOne(targetEntity="Breeds", inversedBy="pets")
    */

    private $breeds;

    /**
     * @var string
     *
     * @ORM\Column(name="pet", type="string", length=255)
     */
    private $pet;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="gender", type="integer", nullable=true)
     */
    private $gender;

    /**
     * @var int
     *
     * @ORM\Column(name="size", type="integer", nullable=true)
     */
    private $size;

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
     * Set pet
     *
     * @param string $pet
     * @return Pets
     */
    public function setPet($pet)
    {
        $this->pet = $pet;

        return $this;
    }

    /**
     * Get pet
     *
     * @return string
     */
    public function getPet()
    {
        return $this->pet;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Pets
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
     * Set gender
     *
     * @param integer $gender
     * @return Pets
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return integer
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set breeds
     *
     * @param \AppBundle\Entity\Breeds $breeds
     * @return Pets
     */
    public function setBreeds(\AppBundle\Entity\Breeds $breeds = null)
    {
        $this->breeds = $breeds;

        return $this;
    }

    /**
     * Get breeds
     *
     * @return \AppBundle\Entity\Breeds
     */
    public function getBreeds()
    {
        return $this->breeds;
    }

    /**
     * Set size
     *
     * @param integer $size
     * @return Pets
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer 
     */
    public function getSize()
    {
        return $this->size;
    }
}
