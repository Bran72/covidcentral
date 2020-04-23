<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionSondageRepository")
 */
class QuestionSondage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $q1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $q2;

    /**
     * @ORM\Column(type="integer")
     */
    private $q3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $q4;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $q5;

    /**
     * @ORM\Column(type="boolean")
     */
    private $q6;

    /**
     * @ORM\Column(type="boolean")
     */
    private $q7;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $q8;

    /**
     * @ORM\Column(type="boolean")
     */
    private $q9;

    /**
     * @ORM\Column(type="integer")
     */
    private $q10;

    /**
     * @ORM\Column(type="boolean")
     */
    private $q12;

    /**
     * @ORM\Column(type="boolean")
     */
    private $q11;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQ1(): ?bool
    {
        return $this->q1;
    }

    public function setQ1(bool $q1): self
    {
        $this->q1 = $q1;

        return $this;
    }

    public function getQ2(): ?string
    {
        return $this->q2;
    }

    public function setQ2(string $q2): self
    {
        $this->q2 = $q2;

        return $this;
    }

    public function getQ3(): ?int
    {
        return $this->q3;
    }

    public function setQ3(int $q3): self
    {
        $this->q3 = $q3;

        return $this;
    }

    public function getQ4(): ?string
    {
        return $this->q4;
    }

    public function setQ4(string $q4): self
    {
        $this->q4 = $q4;

        return $this;
    }

    public function getQ5(): ?string
    {
        return $this->q5;
    }

    public function setQ5(string $q5): self
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

    public function getQ7(): ?bool
    {
        return $this->q7;
    }

    public function setQ7(bool $q7): self
    {
        $this->q7 = $q7;

        return $this;
    }

    public function getQ8(): ?string
    {
        return $this->q8;
    }

    public function setQ8(string $q8): self
    {
        $this->q8 = $q8;

        return $this;
    }

    public function getQ9(): ?bool
    {
        return $this->q9;
    }

    public function setQ9(bool $q9): self
    {
        $this->q9 = $q9;

        return $this;
    }

    public function getQ10(): ?int
    {
        return $this->q10;
    }

    public function setQ10(int $q10): self
    {
        $this->q10 = $q10;

        return $this;
    }

    public function getQ12(): ?bool
    {
        return $this->q12;
    }

    public function setQ12(bool $q12): self
    {
        $this->q12 = $q12;

        return $this;
    }

    public function getQ11(): ?bool
    {
        return $this->q11;
    }

    public function setQ11(bool $q11): self
    {
        $this->q11 = $q11;

        return $this;
    }
}
