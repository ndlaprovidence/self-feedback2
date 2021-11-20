<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

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
    private $gout;
    private $diversite;
    private $chaleur;
    private $disponibilite;
    private $proprete;
    private $acceuil;
    private $commentaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of diversite
     */ 
    public function getDiversite(): ?int
    {
        return $this->diversite;
    }

    /**
     * Set the value of diversite
     *
     * @return  self
     */ 
    public function setdDiversite($diversite)
    {
        $this->diversite = $diversite;

        return $this;
    }

    /**
     * Get the value of chaleur
     */ 
    public function getChaleur() :?int
    {
        return $this->chaleur;
    }

    /**
     * Set the value of chaleur
     *
     * @return  self
     */ 
    public function setChaleur($chaleur)
    {
        $this->chaleur = $chaleur;

        return $this;
    }

    /**
     * Get the value of disponibilite
     */ 
    public function getDisponibilite(): ?int
    {
        return $this->disponibilite;
    }

    /**
     * Set the value of disponibilite
     *
     * @return  self
     */ 
    public function setDisponibilite($disponibilite)
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    /**
     * Get the value of proprete
     */ 
    public function getProprete(): ?int
    {
        return $this->proprete;
    }

    /**
     * Set the value of proprete
     *
     * @return  self
     */ 
    public function setProprete($proprete)
    {
        $this->proprete = $proprete;

        return $this;
    }

    /**
     * Get the value of acceuil
     */ 
    public function getAcceuil(): ?int
    {
        return $this->acceuil;
    }

    /**
     * Set the value of acceuil
     *
     * @return  self
     */ 
    public function setAcceuil($acceuil)
    {
        $this->acceuil = $acceuil;

        return $this;
    }

    /**
     * Get the value of commentaire
     */ 
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire
     *
     * @return  self
     */ 
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Set the value of _gout
     *
     * @return  self
     */ 
    public function setGout($gout)
    {
        $this->gout = $gout;

        return $this;
    }

    /**
     * Get the value of _gout
     */ 
    public function getGout(): ?int
    {
        return $this->gout;
    }
}
