<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\DateTimeTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="production_queue")
 * @ORM\Entity(repositoryClass="App\Repository\ProductionQueueRepository")
 */
class ProductionQueue
{
    use DateTimeTrait;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $article;

    /**
     * @ORM\Column(type="boolean", options={"default"=false})
     */
    private $processed;

    /**
     * ProductionQueue constructor.
     */
    public function __construct()
    {
        $this->updatedAt = new \DateTime;
        $this->processed = false;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getArticle(): Article
    {
        return $this->article;
    }

    public function setArticle(Article $article)
    {
        $this->article = $article;
    }

    public function isProcessed(): bool
    {
        return $this->processed;
    }

    public function setProcessed(bool $processed)
    {
        $this->processed = $processed;
    }
}
