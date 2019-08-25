<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Regex(
     *      pattern="/^[a-zA-Z _\'\-àâäéèêëîïôöûüùçæ]*$/i",
     *      match=true,
     *      message="Veuillez entrer un nom valide en utilisant uniquement les caractères valides (a-z _\'\-àâäéèêëîïôöûüùçæ)."
     *     )
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Regex(
     *      pattern="/^[a-z _\'\-àâäéèêëîïôöûüùçæ]*$/i",
     *      match=true,
     *      message="Veuillez entrer un prénom valide en utilisant uniquement les caractères valides (a-z _\'\-àâäéèêëîïôöûüùçæ)."
     *     )
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     *     message = "Cette addresse e-mail n'est pas valide.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="text")
     * @Assert\Regex(
     *      pattern="/^[0-9a-zâàäéêëùûüîïöç\'\s-,.!?;:()@=€$&#*£]+$/i",
     *      match=true,
     *      message="Veuillez utiliser uniquement les caractères valides (0-9a-zâàäéêëùûüîïöç\'\s-,.!?;:()@=€$&#*£)."
     *     )
     */
    private $message;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Division")
     * @ORM\JoinColumn(nullable=false)
     */
    private $division;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getDivision(): ?Division
    {
        return $this->division;
    }

    public function setDivision(?Division $division): self
    {
        $this->division = $division;

        return $this;
    }
}
