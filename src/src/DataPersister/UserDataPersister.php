<?php

namespace App\DataPersister;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserDataPersister extends UpdateDateDataPersister
{
    private $_entityManager;
    private $_passwordEncoder;

    public function __construct(
        EntityManagerInterface $entityManager,
        UserPasswordEncoderInterface $passwordEncoder
    ) {
        $this->_entityManager = $entityManager;
        $this->_passwordEncoder = $passwordEncoder;
    }

    public function supports($data): bool
    {
        return $data instanceof User;
    }

    /**
     * @param User $data
     */
    public function persist($data, array $context = [])
    {
        if (!$data->getId()) {
            $data->setCreatedAt(new \DateTime('now'));
        }
        $data->setUpdatedAt(new \DateTime('now'));
        
        if ($data->getPlainPassword()) {
            $data->setPassword(
                $this->_passwordEncoder->encodePassword(
                    $data,
                    $data->getPlainPassword()
                )
            );

            $data->eraseCredentials();
        }

        $this->_entityManager->persist($data);
        $this->_entityManager->flush();
    }
}
