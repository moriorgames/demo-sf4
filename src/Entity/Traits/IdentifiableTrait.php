<?php

namespace App\Entity\Traits;

/**
 * Class IdentifiableTrait.
 */
trait IdentifiableTrait
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id = 0;

    public function getId(): int
    {
        return $this->id;
    }
}
