<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:'integer')]
    private ?int $id ;

    #[ORM\Column(type:'string',length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2,max: 50,)]
    private ?string $name;

    #[ORM\Column (type:'float')]
    #[Assert\NotNull()]
    #[Assert\Positive()]
    #[Assert\LessThan(200)]
    private float $price;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?\DateTimeImmutable $createAt;

/*Constructor*/ 
    public function __construct()
    {
        $this->createAt = new \DateTimeImmutable();
    }



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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }
}
