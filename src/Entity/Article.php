<?php

namespace App\Entity;

use App\Entity\Traits\IdentifiableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    const SPECIAL_DISCOUNT = 0.90;

    use IdentifiableTrait;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name = '';

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $price = 0.0;

    /**
     * @ORM\Column(type="text")
     */
    private $description = '';

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }
}
