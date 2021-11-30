<?php

namespace App\Entity;

use App\Repository\TypesDeRepasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypesDeRepasRepository::class)
 */
class TypesDeRepas
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $libelle_tr;

    /**
     * @ORM\OneToMany(targetEntity=Repas::class, mappedBy="Repas")
     */
    private $repas;

    public function __construct()
    {
        $this->repas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleTr(): ?string
    {
        return $this->libelle_tr;
    }

    public function setLibelleTr(string $libelle_tr): self
    {
        $this->libelle_tr = $libelle_tr;

        return $this;
    }

    /**
     * @return Collection|Repas[]
     */
    public function getRepas(): Collection
    {
        return $this->repas;
    }

    public function addRepa(Repas $repa): self
    {
        if (!$this->repas->contains($repa)) {
            $this->repas[] = $repa;
            $repa->setRepas($this);
        }

        return $this;
    }

    public function removeRepa(Repas $repa): self
    {
        if ($this->repas->removeElement($repa)) {
            // set the owning side to null (unless already changed)
            if ($repa->getRepas() === $this) {
                $repa->setRepas(null);
            }
        }

        return $this;
    }
}
