<?php

namespace App\Entity;

use App\Repository\FileRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FileRepository::class)]
class File
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    #[ORM\OneToOne(mappedBy: 'passportFile', cascade: ['persist', 'remove'])]
    private ?Candidat $candidat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

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
            $this->candidat->setPassportFile(null);
        }

        // set the owning side of the relation if necessary
        if ($candidat !== null && $candidat->getPassportFile() !== $this) {
            $candidat->setPassportFile($this);
        }

        $this->candidat = $candidat;

        return $this;
    }
}
