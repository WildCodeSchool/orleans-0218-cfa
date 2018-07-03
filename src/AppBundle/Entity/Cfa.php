<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Cfa
 *
 * @ORM\Table(name="cfa")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CFARepository")
 * @Vich\Uploadable
 */
class Cfa
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
     * @ORM\Column(name="text_president", type="text")
     * @Assert\NotBlank(message="Le texte ne peut pas être vide")
     */
    private $textPresident;

    /**
     * @var File
     * @Vich\UploadableField(mapping="cfa_ref", fileNameProperty="imagePresidentName")
     */
    private $imagePresident;

    /**
     * @var string
     *
     * @ORM\Column(name="image_president_name", type="string", length=80, nullable=true)
     */
    private $imagePresidentName;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getImagePresident()
    {
        return $this->imagePresident;
    }

    /**
     * @param string $imagePresident
     */
    public function setImagePresident(string $imagePresident)
    {
        $this->imagePresident = $imagePresident;
    }

    /**
     * Set textPresident.
     *
     * @param string $textPresident
     *
     * @return Cfa
     */
    public function setTextPresident($textPresident)
    {
        $this->textPresident = $textPresident;

        return $this;
    }

    /**
     * Get textPresident.
     *
     * @return string
     */
    public function getTextPresident()
    {
        return $this->textPresident;
    }

    /**
     * @return string
     */
    public function getImagePresidentName()
    {
        return $this->imagePresidentName;
    }

    /**
     * @param string $imagePresidentName
     */
    public function setImagePresidentName(string $imagePresidentName)
    {
        $this->imagePresidentName = $imagePresidentName;
    }
}
