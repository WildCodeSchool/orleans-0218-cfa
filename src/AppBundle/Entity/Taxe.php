<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxe
 *
 * @ORM\Table(name="taxe")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaxeRepository")
 */
class Taxe
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
     * @ORM\Column(name="taxe_apprentissage", type="text")
     */
    private $taxeApprentissage;


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
     * Set taxeApprentissage.
     *
     * @param string $taxeApprentissage
     *
     * @return Taxe
     */
    public function setTaxeApprentissage($taxeApprentissage)
    {
        $this->taxeApprentissage = $taxeApprentissage;

        return $this;
    }

    /**
     * Get taxeApprentissage.
     *
     * @return string
     */
    public function getTaxeApprentissage()
    {
        return $this->taxeApprentissage;
    }
}
