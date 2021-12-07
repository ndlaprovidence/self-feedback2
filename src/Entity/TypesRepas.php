<?php

namespace App\Entity;

use App\Repository\TypesRepasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypesRepasRepository::class)
 */
class TypesRepas
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $libelle_r;

    /**
     * @ORM\OneToMany(targetEntity=Repas::class, mappedBy="typesRepas")
     */
    private $TypesRepas;

    public function __construct()
    {
        $this->TypesRepas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): ?int
    {
        $this->id = $id;
        return $this->id;
    }

    public function getLibelleR(): ?string
    {
        return $this->libelle_r;
    }

    public function setLibelleR(string $libelle_r): self
    {
        $this->libelle_r = $libelle_r;

        return $this;
    }

    /**
     * @return Collection|Repas[]
     */
    public function getTypesRepas(): Collection
    {
        return $this->TypesRepas;
    }

    public function addTypesRepa(Repas $typesRepa): self
    {
        if (!$this->TypesRepas->contains($typesRepa)) {
            $this->TypesRepas[] = $typesRepa;
            $typesRepa->setTypesRepas($this);
        }

        return $this;
    }

    public function removeTypesRepa(Repas $typesRepa): self
    {
        if ($this->TypesRepas->removeElement($typesRepa)) {
            // set the owning side to null (unless already changed)
            if ($typesRepa->getTypesRepas() === $this) {
                $typesRepa->setTypesRepas(null);
            }
        }

        return $this;
    }
}
