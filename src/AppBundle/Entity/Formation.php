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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
}
