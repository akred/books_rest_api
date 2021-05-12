<?php

namespace App\DataFixtures;

use App\Entity\Library;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LibraryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $library = new Library();
        $library->setCategory('Fantasy');
        $library->setCreatedAt(new \DateTime('now'));
        $library->setUpdatedAt(new \DateTime('now'));
        $manager->persist($library);

        $library = new Library();
        $library->setCategory('Action');
        $library->setCreatedAt(new \DateTime('now'));
        $library->setUpdatedAt(new \DateTime('now'));
        $manager->persist($library);

        $manager->flush();
    }
}
