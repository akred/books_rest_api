<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $book = new Book();
        $book->setTitle('Harry Potter and the magic wand');
        $book->setAuthor('JK Rowling');
        $book->setSummary('A wonderful story');
        $book->setIsbn('979-1-090-63607-1');
        $book->setCreatedAt(new \DateTime('now'));
        $book->setUpdatedAt(new \DateTime('now'));
        $manager->persist($book);

        $book = new Book();
        $book->setTitle('Terminator');
        $book->setAuthor('Schwarzy');
        $book->setSummary('A action story');
        $book->setIsbn('978-2-02-130451-0');
        $book->setCreatedAt(new \DateTime('now'));
        $book->setUpdatedAt(new \DateTime('now'));
        $manager->persist($book);

        $manager->flush();
    }
}
