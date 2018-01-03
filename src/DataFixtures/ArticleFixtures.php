<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    const DATA = [
        [
            'name'        => 'Superman',
            'price'       => 19.50,
            'description' => 'Figure about Superman',
        ],
        [
            'name'        => 'Superman 40\'s edition',
            'price'       => 59.10,
            'description' => 'Deluxe edition figure of Superman signed by Joseph Shuster',
        ],
        [
            'name'        => 'Spiderman',
            'price'       => 22.30,
            'description' => 'Spiderman for the Amazing Spiderman series',
        ],
        [
            'name'        => 'Batman',
            'price'       => 13.00,
            'description' => 'Nobody likes Batman starred by Ben Affleck, we are on discount',
        ],
        [
            'name'        => 'StarLord',
            'price'       => 32.30,
            'description' => 'Special Figure of Star Lord form Galaxy Guardians',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::DATA as $data) {
            $product = new Article;
            $product->setName($data['name']);
            $product->setPrice($data['price']);
            $product->setDescription($data['description']);
            $manager->persist($product);
        }

        $manager->flush();
    }
}
