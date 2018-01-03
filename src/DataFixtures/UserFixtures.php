<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    const DATA = [
        [
            'name'  => 'Jordi',
            'funds' => 138.90,
            'email' => 'moriorgames@gmail.com',
            'vip'   => false,
        ],
        [
            'name'  => 'Joshua',
            'funds' => 490.00,
            'email' => 'joshua_at_joshua_dot_com',
            'vip'   => true,
        ],
        [
            'name'  => 'Poor man',
            'funds' => 15.00,
            'email' => 'i_have_no_email',
            'vip'   => false,
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::DATA as $data) {
            $user = new User;
            $user->setName($data['name']);
            $user->setEmail($data['email']);
            $user->setFunds($data['funds']);
            $user->setVip($data['vip']);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
