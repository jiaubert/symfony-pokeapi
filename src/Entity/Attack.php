<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AttackRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AttackRepository::class)
 */
class Attack
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $pokeapi_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $pp;

    /**
     * @ORM\Column(type="integer")
     */
    private $accuracy;

    /**
     * @ORM\Column(type="integer")
     */
    private $power;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="attacks")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=PokemonAttacks::class, inversedBy="attack")
     */
    private $pokemonAttacks;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPokeapiId(): ?int
    {
        return $this->pokeapi_id;
    }

    public function setPokeapiId(int $pokeapi_id): self
    {
        $this->pokeapi_id = $pokeapi_id;

        return $this;
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

    public function getPp(): ?int
    {
        return $this->pp;
    }

    public function setPp(int $pp): self
    {
        $this->pp = $pp;

        return $this;
    }

    public function getAccuracy(): ?int
    {
        return $this->accuracy;
    }

    public function setAccuracy(int $accuracy): self
    {
        $this->accuracy = $accuracy;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(int $power): self
    {
        $this->power = $power;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPokemonAttacks(): ?PokemonAttacks
    {
        return $this->pokemonAttacks;
    }

    public function setPokemonAttacks(?PokemonAttacks $pokemonAttacks): self
    {
        $this->pokemonAttacks = $pokemonAttacks;

        return $this;
    }

}
