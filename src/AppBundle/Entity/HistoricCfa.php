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
     * @ORM\Column(name="containt", type="string", length=255)
     * @Assert\NotBlank(message="Le contenu de l'historique ne peut pas être vide")
     * @Assert\Length(max = 255, maxMessage = "Le contenu de l'historique ne doit pas dépasser les 255 caractères")
     */
    private $containt;


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
     * Set containt.
     *
     * @param string $containt
     *
     * @return HistoricCfa
     */
    public function setContaint($containt)
    {
        $this->containt = $containt;

        return $this;
    }

    /**
     * Get containt.
     *
     * @return string
     */
    public function getContaint()
    {
        return $this->containt;
    }
}
