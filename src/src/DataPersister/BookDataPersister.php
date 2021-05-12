<?php

namespace App\DataPersister;

use App\Entity\Book;

class BookDataPersister extends UpdateDateDataPersister
{

    public function supports($data): bool
    {
        return $data instanceof Book;
    }
}
