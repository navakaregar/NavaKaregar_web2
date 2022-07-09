<?php
namespace App\Listener;

use App\Model\TimeLoggerInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class TimeLoggerListener{
    public function prePersist(LifecycleEventArgs $args){
        $entity = $args->getObject();

        if(!$entity instanceof TimeLoggerInterface){
            return;
        }
        $entity->setCreatedAt(new \DateTimeImmutable());
        $entity->setUpdatedAt(new \DateTimeImmutable());
    }
    public function preUpdate(PreUpdateEventArgs $args){
        $entity = $args->getObject();

        if(!$entity instanceof TimeLoggerInterface){
            return;
        }
        $entity->setUpdatedAt(new \DateTimeImmutable());
    }

}