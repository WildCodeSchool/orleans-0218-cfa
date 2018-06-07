<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CFA
 *
 * @ORM\Table(name="c_f_a")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CFARepository")
 */
class CFA
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
     * @ORM\Column(name="Text_President", type="string", length=45)
     */
    private $textPresident;

    /**
     * @var string
     *
     * @ORM\Column(name="Historical", type="string", length=45)
     */
    private $historical;


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
     * Set textPresident.
     *
     * @param string $textPresident
     *
     * @return CFA
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
     * Set historical.
     *
     * @param string $historical
     *
     * @return CFA
     */
    public function setHistorical($historical)
    {
        $this->historical = $historical;

        return $this;
    }

    /**
     * Get historical.
     *
     * @return string
     */
    public function getHistorical()
    {
        return $this->historical;
    }
}
