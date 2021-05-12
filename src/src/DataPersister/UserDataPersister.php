<?php

namespace App\DataPersister;

use App\Entity\User;

class UserDataPersister extends UpdateDateDataPersister
{

    public function supports($data): bool
    {
        return $data instanceof User;
    }

}
