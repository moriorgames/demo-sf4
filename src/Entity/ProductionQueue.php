<?php

namespace App\Entity;

use App\Entity\Traits\DateTimeTrait;
use App\Entity\Traits\IdentifiableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="production_queue")
 * @ORM\Entity(repositoryClass="App\Repository\ProductionQueueRepository")
 */
class ProductionQueue
{
    use IdentifiableTrait;
    use DateTimeTrait;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $article;

    /**
     * @ORM\Column(type="boolean", options={"default"=false})
     */
    private $processed = false;

    /**
     * ProductionQueue constructor.
     */
    public function __construct()
    {
        $this->updatedAt = new \DateTime;
        $this->processed = false;
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
