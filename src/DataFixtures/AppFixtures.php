<?php

namespace App\DataFixtures;

use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createOne(['email' => 'dummy1@example.com', 'plainPassword' => 'pass-dummy1']);
        UserFactory::createOne(['email' => 'dummy2@example.com', 'plainPassword' => 'pass-dummy2']);
        UserFactory::createOne(['email' => 'dummyx@example.com', 'plainPassword' => 'pass-dummyx']);
        UserFactory::createMany(16);

        $manager->flush();
    }
}
