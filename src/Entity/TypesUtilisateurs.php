<?php

namespace App\Entity;

use App\Repository\TypesUtilisateursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypesUtilisateursRepository::class)
 */
class TypesUtilisateurs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $libelle_t;

    /**
     * @ORM\ManyToMany(targetEntity=Repas::class, mappedBy="repas")
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

    public function getLibelleT(): ?string
    {
        return $this->libelle_t;
    }

    public function setLibelleT(string $libelle_t): self
    {
        $this->libelle_t = $libelle_t;

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
            $repa->addRepa($this);
        }

        return $this;
    }

    public function removeRepa(Repas $repa): self
    {
        if ($this->repas->removeElement($repa)) {
            $repa->removeRepa($this);
        }

        return $this;
    }
}
