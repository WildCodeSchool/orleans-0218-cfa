<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Partnair
 *
 * @ORM\Table(name="partnair")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartnairRepository")
 * @Vich\Uploadable
 */
class Partnair
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
     * @Assert\Url(
     *    message = "L'adresse du lien '{{ value }}' n'est pas une url valide",
     * )
     * @Assert\Length(
     *          min = 4, max = 255,
     *     minMessage = "Le lien doit comporter au moins   {{ limit }} caractères ",
     *     maxMessage = "Le lien ne doit pas comporter plus de   {{ limit }} caractères "
     * )
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(
*          min = 2, max = 80,
     *     minMessage = "Le nom doit comporter au moins   {{ limit }} caractères ",
     *     maxMessage = "Le nom ne doit pas comporter plus de   {{ limit }} caractères "
     * )
     * @ORM\Column(name="name", type="string", length=80)
     */
    private $name;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @var string|null
     * @Vich\UploadableField(mapping="formation_ref", fileNameProperty="imageName")

     * @ORM\Column(name="image", type="string", length=150, nullable=true)
     */
    private $image;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="formation_ref", fileNameProperty="referentielName")
     * @ORM\Column(nullable=true)
     * @var File
     */
    private $referentielFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;


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
     * Set image.
     *
     * @param string|null $image
     *
     * @return Partnair
     */
    public function setImage($image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return string|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set link.
     *
     * @param string $link
     *
     * @return Partnair
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link.
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Partnair
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
