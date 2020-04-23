<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionDepistageRepository")
 */
class QuestionDepistage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $q1;

    /**
     * @ORM\Column(type="boolean")
     */
    private $q2;

    /**
     * @ORM\Column(type="boolean")
     */
    private $q3;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $q4;

    /**
     * @ORM\Column(type="boolean")
     */
    private $q5;

    /**
     * @ORM\Column(type="boolean")
     */
    private $q6;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $q7;

    /**
     * @ORM\Column(type="boolean")
     */
    private $q8;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getQ1(): ?int
    {
        return $this->q1;
    }

    public function setQ1(?int $q1): self
    {
        $this->q1 = $q1;

        return $this;
    }

    public function getQ2(): ?bool
    {
        return $this->q2;
    }

    public function setQ2(bool $q2): self
    {
        $this->q2 = $q2;

        return $this;
    }

    public function getQ3(): ?bool
    {
        return $this->q3;
    }

    public function setQ3(bool $q3): self
    {
        $this->q3 = $q3;

        return $this;
    }

    public function getQ4(): ?int
    {
        return $this->q4;
    }

    public function setQ4(?int $q4): self
    {
        $this->q4 = $q4;

        return $this;
    }

    public function getQ5(): ?bool
    {
        return $this->q5;
    }

    public function setQ5(bool $q5): self
    {
        $this->q5 = $q5;

        return $this;
    }

    public function getQ6(): ?bool
    {
        return $this->q6;
    }

    public function setQ6(bool $q6): self
    {
        $this->q6 = $q6;

        return $this;
    }

    public function getQ7(): ?int
    {
        return $this->q7;
    }

    public function setQ7(?int $q7): self
    {
        $this->q7 = $q7;

        return $this;
    }

    public function getQ8(): ?bool
    {
        return $this->q8;
    }

    public function setQ8(bool $q8): self
    {
        $this->q8 = $q8;

        return $this;
    }
}
