<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\TypesUtilisateurs;
use App\Repository\AvisRepository;

/**
 * @ORM\Entity(repositoryClass=AvisRepository::class)
 */
class Avis
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
    private $gout;

    /**
     * @ORM\Column(type="integer")
     */
    private $diversite;

    /**
     * @ORM\Column(type="integer")
     */
    private $chaleur;

    /**
     * @ORM\Column(type="integer")
     */
    private $disponibilite;

    /**
     * @ORM\Column(type="integer")
     */
    private $proprete;

    /**
     * @ORM\Column(type="integer")
     */
    private $acceuil;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity=TypesUtilisateurs::class, inversedBy="TypesUtilisateurs")
     */
    private $typesUtilisateurs;

    /**
     * @ORM\ManyToOne(targetEntity=Repas::class, inversedBy="Repas")
     */
    private $repas;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of diversite
     */ 

    public function getGout(): ?int
    {
        return $this->gout;
    }

    public function setGout(int $gout): self
    {
        $this->gout = $gout;

        return $this;
    }

    public function getDiversite(): ?int
    {
        return $this->diversite;
    }

    public function setDiversite(int $diversite): self
    {
        $this->diversite = $diversite;

        return $this;
    }

    public function getChaleur(): ?int
    {
        return $this->chaleur;
    }

    public function setChaleur(int $chaleur): self
    {
        $this->chaleur = $chaleur;

        return $this;
    }

    public function getDisponibilite(): ?int
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(int $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getProprete(): ?int
    {
        return $this->proprete;
    }

    public function setProprete(int $proprete): self
    {
        $this->proprete = $proprete;

        return $this;
    }

    public function getAcceuil(): ?int
    {
        return $this->acceuil;
    }

    public function setAcceuil(int $acceuil): self
    {
        $this->acceuil = $acceuil;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getTypesUtilisateurs(): ?TypesUtilisateurs
    {
        return $this->typesUtilisateurs;
    }

    public function setTypesUtilisateurs(?TypesUtilisateurs $typesUtilisateurs): self
    {
        $this->typesUtilisateurs = $typesUtilisateurs;

        return $this;
    }

    public function getRepas(): ?Repas
    {
        return $this->repas;
    }

    public function setRepas(?Repas $repas): self
    {
        $this->repas = $repas;

        return $this;
    }

}
