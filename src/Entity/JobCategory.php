<?php

namespace App\Entity;

use App\Repository\JobCategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobCategoryRepository::class)]
class JobCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\OneToOne(mappedBy: 'jobCategory', cascade: ['persist', 'remove'])]
    private ?Candidat $candidat = null;

    #[ORM\OneToOne(mappedBy: 'jobCategory', cascade: ['persist', 'remove'])]
    private ?Job $job = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getCandidat(): ?Candidat
    {
        return $this->candidat;
    }

    public function setCandidat(?Candidat $candidat): static
    {
        // unset the owning side of the relation if necessary
        if ($candidat === null && $this->candidat !== null) {
            $this->candidat->setJobCategory(null);
        }

        // set the owning side of the relation if necessary
        if ($candidat !== null && $candidat->getJobCategory() !== $this) {
            $candidat->setJobCategory($this);
        }

        $this->candidat = $candidat;

        return $this;
    }

    public function getJob(): ?Job
    {
        return $this->job;
    }

    public function setJob(?Job $job): static
    {
        // unset the owning side of the relation if necessary
        if ($job === null && $this->job !== null) {
            $this->job->setJobCategory(null);
        }

        // set the owning side of the relation if necessary
        if ($job !== null && $job->getJobCategory() !== $this) {
            $job->setJobCategory($this);
        }

        $this->job = $job;

        return $this;
    }
}
