<?php

namespace App\Entity;

use App\Model\TimeLoggerInterface;
use App\Model\TimeLoggerTrait;
use App\Model\UserLoggerInterface;
use App\Model\UserLoggerTrait;
use App\Repository\AttractionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttractionRepository::class)]
class Attraction implements TimeLoggerInterface,UserLoggerInterface
{
    use TimeLoggerTrait;
    use UserLoggerTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $shortDescription;

    #[ORM\Column(type: 'string', length: 255)]
    private $fullDescription;

    #[ORM\Column(type: 'integer')]
    private $score;

//    #[ORM\Column(type: 'datetime_immutable')]
//    private $createdAt;
//
//    #[ORM\Column(type: 'datetime_immutable')]
//    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getFullDescription(): ?string
    {
        return $this->fullDescription;
    }

    public function setFullDescription(string $fullDescription): self
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

//    public function getCreatedAt(): ?\DateTimeImmutable
//    {
//        return $this->createdAt;
//    }
//
//    public function setCreatedAt(\DateTimeImmutable $createdAt): self
//    {
//        $this->createdAt = $createdAt;
//
//        return $this;
//    }
//
//    public function getUpdatedAt(): ?\DateTimeImmutable
//    {
//        return $this->updatedAt;
//    }
//
//    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
//    {
//        $this->updatedAt = $updatedAt;
//
//        return $this;
//    }
}
