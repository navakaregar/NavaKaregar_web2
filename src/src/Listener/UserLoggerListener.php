<?php

namespace App\Listener;

use App\Model\UserLoggerInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class UserLoggerListener
{
    private TokenStorageInterface $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }


    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        if (!$entity instanceof UserLoggerInterface) {
            return;
        }
        $token = $this->tokenStorage->getToken();
        $user = $token == null ? null : $token->getUser();
        $entity->setCreatedUser($user);
        $entity->setUpdatedUser($user);

    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getObject();

        if (!$entity instanceof UserLoggerInterface) {
            return;
        }

        $token = $this->tokenStorage->getToken();
        $user = $token == null ? null : $token->getUser();
        $entity->setUpdatedUser($user);
    }

}