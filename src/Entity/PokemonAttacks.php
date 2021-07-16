<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PokemonAttacksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PokemonAttacksRepository::class)
 */
class PokemonAttacks
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
    private $level;

    /**
     * @ORM\OneToMany(targetEntity=Attack::class, mappedBy="pokemonAttacks")
     */
    private $attack;

    /**
     * @ORM\ManyToOne(targetEntity=Pokemon::class, inversedBy="pokemonAttacks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pokemon;

    public function __construct()
    {
        $this->attack = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection|Attack[]
     */
    public function getAttack(): Collection
    {
        return $this->attack;
    }

    public function addAttack(Attack $attack): self
    {
        if (!$this->attack->contains($attack)) {
            $this->attack[] = $attack;
            $attack->setPokemonAttacks($this);
        }

        return $this;
    }

    public function removeAttack(Attack $attack): self
    {
        if ($this->attack->removeElement($attack)) {
            // set the owning side to null (unless already changed)
            if ($attack->getPokemonAttacks() === $this) {
                $attack->setPokemonAttacks(null);
            }
        }

        return $this;
    }

    public function getPokemon(): ?Pokemon
    {
        return $this->pokemon;
    }

    public function setPokemon(?Pokemon $pokemon): self
    {
        $this->pokemon = $pokemon;

        return $this;
    }
}
