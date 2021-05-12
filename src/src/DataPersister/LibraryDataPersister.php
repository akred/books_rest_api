<?php

namespace App\DataPersister;

use App\Entity\Library;

class LibraryDataPersister extends UpdateDateDataPersister
{

    public function supports($data): bool
    {
        return $data instanceof Library;
    }
}
