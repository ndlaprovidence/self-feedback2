<?php

namespace App\Entity;

use App\Repository\RepasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RepasRepository::class)
 */
class Repas
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_repas;

    /**
     * @ORM\Column(type="time")
     */
    private $heure;

    /**
     * @ORM\OneToMany(targetEntity=Avis::class, mappedBy="repas")
     */
    private $Repas;

    /**
     * @ORM\ManyToOne(targetEntity=TypesRepas::class, inversedBy="TypesRepas")
     */
    private $typesRepas;

    public function __construct()
    {
        $this->Repas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRepas(): ?\DateTimeInterface
    {
        return $this->date_repas;
    }

    public function setDateRepas(\DateTimeInterface $date_repas): self
    {
        $this->date_repas = $date_repas;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getRepas(): Collection
    {
        return $this->Repas;
    }

    public function addRepa(Avis $repa): self
    {
        if (!$this->Repas->contains($repa)) {
            $this->Repas[] = $repa;
            $repa->setRepas($this);
        }

        return $this;
    }

    public function removeRepa(Avis $repa): self
    {
        if ($this->Repas->removeElement($repa)) {
            // set the owning side to null (unless already changed)
            if ($repa->getRepas() === $this) {
                $repa->setRepas(null);
            }
        }

        return $this;
    }

    public function getTypesRepas(): ?TypesRepas
    {
        return $this->typesRepas;
    }

    public function setTypesRepas(?TypesRepas $typesRepas): self
    {
        $this->typesRepas = $typesRepas;

        return $this;
    }
}
