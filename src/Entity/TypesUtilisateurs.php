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
     * @ORM\Column(type="string", length=15)
     */
    private $libelle_t;

    /**
     * @ORM\OneToMany(targetEntity=Avis::class, mappedBy="typesUtilisateurs")
     */
    private $TypesUtilisateurs;

    public function __construct()
    {
        $this->TypesUtilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleT(): ?string
    {
        return $this->libelle_t;
    }

    public function setLibelleT(?string $libelle_t): self
    {
        $this->libelle_t = $libelle_t;

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getTypesUtilisateurs(): Collection
    {
        return $this->TypesUtilisateurs;
    }

    public function addTypesUtilisateur(Avis $typesUtilisateur): self
    {
        if (!$this->TypesUtilisateurs->contains($typesUtilisateur)) {
            $this->TypesUtilisateurs[] = $typesUtilisateur;
            $typesUtilisateur->setTypesUtilisateurs($this);
        }

        return $this;
    }

    public function removeTypesUtilisateur(Avis $typesUtilisateur): self
    {
        if ($this->TypesUtilisateurs->removeElement($typesUtilisateur)) {
            // set the owning side to null (unless already changed)
            if ($typesUtilisateur->getTypesUtilisateurs() === $this) {
                $typesUtilisateur->setTypesUtilisateurs(null);
            }
        }

        return $this;
    }
}
