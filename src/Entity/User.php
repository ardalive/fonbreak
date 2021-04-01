<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity=Queque::class, inversedBy="User")
     */
    private $Queque;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $status;

    /**
     * @ORM\Column(type="dateinterval", nullable=true)
     */
    private $shiftStartEnd;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $shiftStart;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $shiftEnd;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getQueque(): ?Queque
    {
        return $this->Queque;
    }

    public function setQueque(?Queque $Queque): self
    {
        $this->Queque = $Queque;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getShiftStartEnd(): ?\DateInterval
    {
        return $this->shiftStartEnd;
    }

    public function setShiftStartEnd(?\DateInterval $shiftStartEnd): self
    {
        $this->shiftStartEnd = $shiftStartEnd;

        return $this;
    }

    public function getShiftStart(): ?\DateTimeInterface
    {
        return $this->shiftStart;
    }

    public function setShiftStart(?\DateTimeInterface $shiftStart): self
    {
        $this->shiftStart = $shiftStart;

        return $this;
    }

    public function getShiftEnd(): ?\DateTimeInterface
    {
        return $this->shiftEnd;
    }

    public function setShiftEnd(?\DateTimeInterface $shiftEnd): self
    {
        $this->shiftEnd = $shiftEnd;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
