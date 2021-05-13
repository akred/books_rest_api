<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Library;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $library1 = new Library();
        $library1->setCategory('Fantasy');
        $manager->persist($library1);

        $library2 = new Library();
        $library2->setCategory('Action');
        $manager->persist($library2);

        $book = new Book();
        $book->setTitle('Harry Potter and the magic wand');
        $book->setAuthor('JK Rowling');
        $book->setSummary('A wonderful story');
        $book->setIsbn('979-1-090-63607-1');
        $book->setLibrary($library1);
        $book->setCreatedAt(new \DateTime('now'));
        $book->setUpdatedAt(new \DateTime('now'));
        $manager->persist($book);

        $book = new Book();
        $book->setTitle('Harry Potter and the final destiny');
        $book->setAuthor('JK Rowling');
        $book->setSummary('A latest story');
        $book->setIsbn('978-3-16-148410-0');
        $book->setLibrary($library1);
        $book->setCreatedAt(new \DateTime('now'));
        $book->setUpdatedAt(new \DateTime('now'));
        $manager->persist($book);

        $book = new Book();
        $book->setTitle('Terminator');
        $book->setAuthor('Schwarzy');
        $book->setSummary('A action story');
        $book->setIsbn('978-2-02-130451-0');
        $book->setLibrary($library2);
        $book->setCreatedAt(new \DateTime('now'));
        $book->setUpdatedAt(new \DateTime('now'));
        $manager->persist($book);

        $manager->flush();
    }
}
