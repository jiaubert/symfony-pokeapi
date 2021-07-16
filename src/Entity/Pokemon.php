<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PokemonRepository::class)
 */
class Pokemon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $pokeapi_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $height;

    /**
     * @ORM\Column(type="integer")
     */
    private $weight;

    /**
     * @ORM\Column(type="integer")
     */
    private $base_experience;

    /**
     * @ORM\Column(type="integer")
     */
    private $pokedex_order;

    /**
     * @ORM\ManyToMany(targetEntity=Type::class, inversedBy="pokemon")
     */
    private $types;

    /**
     * @ORM\OneToMany(targetEntity=PokemonAttacks::class, mappedBy="pokemon")
     */
    private $pokemonAttacks;

    public function __construct()
    {
        $this->types = new ArrayCollection();
        $this->pokemonAttacks = new ArrayCollection();
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

    public function getPokeapiId(): ?int
    {
        return $this->pokeapi_id;
    }

    public function setPokeapiId(int $pokeapi_id): self
    {
        $this->pokeapi_id = $pokeapi_id;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getBaseExperience(): ?int
    {
        return $this->base_experience;
    }

    public function setBaseExperience(int $base_experience): self
    {
        $this->base_experience = $base_experience;

        return $this;
    }

    public function getPokedexOrder(): ?int
    {
        return $this->pokedex_order;
    }

    public function setPokedexOrder(int $pokedex_order): self
    {
        $this->pokedex_order = $pokedex_order;

        return $this;
    }

    /**
     * @return Collection|Type[]
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Type $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types[] = $type;
        }

        return $this;
    }

    public function removeType(Type $type): self
    {
        $this->types->removeElement($type);

        return $this;
    }

    /**
     * @return Collection|PokemonAttacks[]
     */
    public function getPokemonAttacks(): Collection
    {
        return $this->pokemonAttacks;
    }

    public function addPokemonAttack(PokemonAttacks $pokemonAttack): self
    {
        if (!$this->pokemonAttacks->contains($pokemonAttack)) {
            $this->pokemonAttacks[] = $pokemonAttack;
            $pokemonAttack->setPokemon($this);
        }

        return $this;
    }

    public function removePokemonAttack(PokemonAttacks $pokemonAttack): self
    {
        if ($this->pokemonAttacks->removeElement($pokemonAttack)) {
            // set the owning side to null (unless already changed)
            if ($pokemonAttack->getPokemon() === $this) {
                $pokemonAttack->setPokemon(null);
            }
        }

        return $this;
    }

}
