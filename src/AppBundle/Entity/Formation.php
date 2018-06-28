<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormationRepository")
 * @Vich\Uploadable
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
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="formation_ref", fileNameProperty="referentielName")
     *
     * @var File
     */
    private $referentielFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $referentielName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

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

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $referentiel
     */
    public function setReferentielFile(?File $referentiel = null): void
    {
        $this->referentielFile = $referentiel;

        if (null !== $referentiel) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getReferentielFile(): ?File
    {
        return $this->referentielFile;
    }

    public function setReferentielName(?string $referentielName): void
    {
        $this->referentielName = $referentielName;
    }

    public function getReferentielName(): ?string
    {
        return $this->referentielName;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return Formation
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
