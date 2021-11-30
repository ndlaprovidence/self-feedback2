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
     * @ORM\Column(type="time", nullable=true)
     */
    private $heure;

    /**
     * @ORM\ManyToOne(targetEntity=TypesDeRepas::class, inversedBy="repas")
     */
    private $Repas;

    /**
     * @ORM\ManyToMany(targetEntity=TypesUtilisateurs::class, inversedBy="repas")
     */
    private $repas;

    /**
     * @ORM\OneToMany(targetEntity=Avis::class, mappedBy="repas")
     */
    private $AvisRepas;

    public function __construct()
    {
        $this->repas = new ArrayCollection();
        $this->AvisRepas = new ArrayCollection();
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

    public function setHeure(?\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getRepas(): ?TypesDeRepas
    {
        return $this->Repas;
    }

    public function setRepas(?TypesDeRepas $Repas): self
    {
        $this->Repas = $Repas;

        return $this;
    }

    public function addRepa(TypesUtilisateurs $repa): self
    {
        if (!$this->repas->contains($repa)) {
            $this->repas[] = $repa;
        }

        return $this;
    }

    public function removeRepa(TypesUtilisateurs $repa): self
    {
        $this->repas->removeElement($repa);

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getAvisRepas(): Collection
    {
        return $this->AvisRepas;
    }

    public function addAvisRepa(Avis $avisRepa): self
    {
        if (!$this->AvisRepas->contains($avisRepa)) {
            $this->AvisRepas[] = $avisRepa;
            $avisRepa->setRepas($this);
        }

        return $this;
    }

    public function removeAvisRepa(Avis $avisRepa): self
    {
        if ($this->AvisRepas->removeElement($avisRepa)) {
            // set the owning side to null (unless already changed)
            if ($avisRepa->getRepas() === $this) {
                $avisRepa->setRepas(null);
            }
        }

        return $this;
    }
}
