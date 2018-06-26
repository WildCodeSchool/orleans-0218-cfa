<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormationRepository")
 */
class Formation
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
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(message="Le nom ne peut pas être vide")
     * @Assert\Length(max = 255, maxMessage = "Le nom ne doit pas dépasser les 255 caractères")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="shortPresentation", type="text")
     * @Assert\NotBlank(message="La présentation ne peut pas être vide")
     */
    private $shortPresentation;

    /**
     * @var string
     *
     * @ORM\Column(name="jobDescription", type="text")
     * @Assert\NotBlank(message="La description ne peut pas être vide")
     */
    private $jobDescription;

    /**
     * @var
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Ufa", mappedBy="formations")
     */
    private $ufas;

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
     * @return mixed
     */
    public function getUfas()
    {
        return $this->ufas;
    }

    /**
     * @param mixed $ufas
     */
    public function setUfas($ufas): void
    {
        $this->ufas = $ufas;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Formation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set shortPresentation
     *
     * @param string $shortPresentation
     *
     * @return Formation
     */
    public function setShortPresentation($shortPresentation)
    {
        $this->shortPresentation = $shortPresentation;

        return $this;
    }

    /**
     * Get shortPresentation
     *
     * @return string
     */
    public function getShortPresentation()
    {
        return $this->shortPresentation;
    }

    /**
     * Set jobDescription
     *
     * @param string $jobDescription
     *
     * @return Formation
     */
    public function setJobDescription($jobDescription)
    {
        $this->jobDescription = $jobDescription;

        return $this;
    }

    /**
     * Get jobDescription
     *
     * @return string
     */
    public function getJobDescription()
    {
        return $this->jobDescription;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * Formation constructor.
     */
    public function __construct()
    {
        $this->ufas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ufa.
     *
     * @param \AppBundle\Entity\Ufa $ufa
     *
     * @return Formation
     */
    public function addUfa(\AppBundle\Entity\Ufa $ufa)
    {
        $this->ufas[] = $ufa;

        return $this;
    }

    /**
     * Remove ufa.
     *
     * @param \AppBundle\Entity\Ufa $ufa
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeUfa(\AppBundle\Entity\Ufa $ufa)
    {
        return $this->ufas->removeElement($ufa);
    }
}
