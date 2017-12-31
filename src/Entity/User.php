<?php

namespace App\Entity;

use App\Entity\Traits\DateTimeTrait;
use App\Entity\Traits\IdentifiableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    use IdentifiableTrait;
    use DateTimeTrait;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name = '';

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email = '';

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $funds = 0.0;

    /**
     * @ORM\Column(type="boolean", options={"default"=false})
     */
    private $vip = false;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->updatedAt = new \DateTime;
        $this->createdAt = new \DateTime;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getFunds(): float
    {
        return $this->funds;
    }

    public function setFunds(float $funds)
    {
        $this->funds = $funds;
    }

    public function subtractFunds(float $funds)
    {
        $this->funds -= $funds;
    }

    public function isVip(): bool
    {
        return $this->vip;
    }

    public function setVip(bool $vip)
    {
        $this->vip = $vip;
    }
}
