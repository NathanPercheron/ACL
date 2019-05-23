<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     */
    private $cdpostal;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephoned;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephonep;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCdpostal(): ?int
    {
        return $this->cdpostal;
    }

    public function setCdpostal(int $cdpostal): self
    {
        $this->cdpostal = $cdpostal;

        return $this;
    }

    public function getTelephoned(): ?int
    {
        return $this->telephoned;
    }

    public function setTelephoned(int $telephoned): self
    {
        $this->telephoned = $telephoned;

        return $this;
    }

    public function getTelephonep(): ?int
    {
        return $this->telephonep;
    }

    public function setTelephonep(int $telephonep): self
    {
        $this->telephonep = $telephonep;

        return $this;
    }

    public function getSalt()
    {
        return null;
    }

    public function getRoles() : array
    {
        $roles = $this->roles;

        $roles[] = "ROLE_USER";

        return array_unique($roles);
    }

    public function addRole($roles){
        $roles = strtoupper($roles);
        if(!in_array($roles,$this->roles,true)){
            $this->roles[]=$roles;
        }
        return $this;
    }

    public function eraseCredentials()
    {
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}
