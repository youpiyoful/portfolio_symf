<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
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
    private $name_project;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_project;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description_project;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image_project;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $github_project;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link_project;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="projects")
     */
    private $category;

    public function __construct()
    {
        $this->category = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNameProject(): ?string
    {
        return $this->name_project;
    }

    public function setNameProject(?string $name_project): self
    {
        $this->name_project = $name_project;

        return $this;
    }

    public function getDateProject(): ?\DateTimeInterface
    {
        return $this->date_project;
    }

    public function setDateProject(?\DateTimeInterface $date_project): self
    {
        $this->date_project = $date_project;

        return $this;
    }

    public function getDescriptionProject(): ?string
    {
        return $this->description_project;
    }

    public function setDescriptionProject(?string $description_project): self
    {
        $this->description_project = $description_project;

        return $this;
    }

    public function getImageProject(): ?string
    {
        return $this->image_project;
    }

    public function setImageProject(?string $image_project): self
    {
        $this->image_project = $image_project;

        return $this;
    }

    public function getGithubProject(): ?string
    {
        return $this->github_project;
    }

    public function setGithubProject(?string $github_project): self
    {
        $this->github_project = $github_project;

        return $this;
    }

    public function getLinkProject(): ?string
    {
        return $this->link_project;
    }

    public function setLinkProject(?string $link_project): self
    {
        $this->link_project = $link_project;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->category->contains($category)) {
            $this->category->removeElement($category);
        }

        return $this;
    }
    public function __toString(){
        return (string) $this->name_project;
    }
}
