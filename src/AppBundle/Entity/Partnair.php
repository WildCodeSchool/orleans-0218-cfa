<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Partnair
 *
 * @ORM\Table(name="partnair")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartnairRepository")
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
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=150, nullable=true)
     */
    private $image;

    /**
     * @var string
     * @Assert\Url(
     *    message = "L'adresse du lien '{{ value }}' n'est pas une url valide",
     * )
     *
     * @ORM\Column(name="link", type="string", length=150)
     */
    private $link;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(
*          min = 2, max = 150,
     *     minMessage = "Le nom doit comporter au moins   {{ limit }} caractères ",
     *     maxMessage = "Le nom ne doit pas comporter plus de   {{ limit }} caractères "
     * )
     * @ORM\Column(name="name", type="string", length=80)
     */
    private $name;


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
}
