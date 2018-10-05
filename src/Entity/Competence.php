<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetenceRepository")
 */
class Competence
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name_competence;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img_comp;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $texte_competence;

    public function getId()
    {
        return $this->id;
    }

    public function getNameCompetence(): ?string
    {
        return $this->name_competence;
    }

    public function setNameCompetence(?string $name_competence): self
    {
        $this->name_competence = $name_competence;

        return $this;
    }

    public function getImgComp(): ?string
    {
        return $this->img_comp;
    }

    public function setImgComp(?string $img_comp): self
    {
        $this->img_comp = $img_comp;

        return $this;
    }

    public function getTexteCompetence(): ?string
    {
        return $this->texte_competence;
    }

    public function setTexteCompetence(?string $texte_competence): self
    {
        $this->texte_competence = $texte_competence;

        return $this;
    }
}
