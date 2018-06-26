<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * HistoricCfa
 *
 * @ORM\Table(name="historic_cfa")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HistoricCfaRepository")
 */
class HistoricCfa
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     * @Assert\Date()
     * @Assert\NotBlank(message="La date doit être renseigné")
     *
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     * @Assert\NotBlank(message="Le titre ne peut pas être vide")
     * @Assert\Length(max = 100, maxMessage = "Le titre ne doit pas dépasser les 100 caractères")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=500)
     * @Assert\NotBlank(message="Le contenu de l'historique ne peut pas être vide")
     * @Assert\Length(max = 500, maxMessage = "Le contenu de l'historique ne doit pas dépasser les 500 caractères")
     */
    private $content;


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
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return HistoricCfa
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return HistoricCfa
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }



    /**
     * Set content.
     *
     * @param string $content
     *
     * @return HistoricCfa
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}
