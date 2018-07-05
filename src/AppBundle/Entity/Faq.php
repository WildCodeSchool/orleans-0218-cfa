<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Faq
 *
 * @ORM\Table(name="faq")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FaqRepository")
 */
class Faq
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
     * @Assert\NotBlank(message="Le champ question ne peut pas être vide")
     * @Assert\Length(max = 255, maxMessage = "Le champ question ne doit pas dépasser 255 caractères")
     * @ORM\Column(name="question", type="text")
     */
    private $question;

    /**
     * @var string
     * @Assert\NotBlank(message="Le champ reponse ne peut pas être vide")
     * @Assert\Length(max = 500, maxMessage = "Le champ reponse ne doit pas dépasser  500 caractères")
     * @ORM\Column(name="response", type="text")
     */
    private $response;


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
     * Set question.
     *
     * @param string $question
     *
     * @return Faq
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question.
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set response.
     *
     * @param string $response
     *
     * @return Faq
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get response.
     *
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }
}
