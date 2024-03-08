<?php

namespace App\Entity;

use App\Repository\CandidatRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatRepository::class)]
class Candidat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $adress = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $country = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $nationality = null;

    #[ORM\OneToOne(inversedBy: 'candidat', cascade: ['persist', 'remove'])]
    private ?File $passportFile = null;

    #[ORM\OneToOne(inversedBy: 'candidat', cascade: ['persist', 'remove'])]
    private ?File $curriculumVitae = null;

    #[ORM\OneToOne(inversedBy: 'candidat', cascade: ['persist', 'remove'])]
    private ?File $profilPicture = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $currentLocation = null;

    #[ORM\Column(nullable:true)]
    private ?\DateTimeImmutable $birthAt = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $placeOfBirth = null;

    #[ORM\Column]
    private ?bool $availability = null;

    #[ORM\OneToOne(inversedBy: 'candidat', cascade: ['persist', 'remove'])]
    private ?JobCategory $jobCategory = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $phone = null;

    #[ORM\Column(type: Types::TEXT, nullable:true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $registratedAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(nullable:true)]
    private ?\DateTimeImmutable $deletedAt = null;

    #[ORM\OneToOne(inversedBy: 'candidat', cascade: ['persist', 'remove'])]
    private ?Gender $genre = null;

   #[ORM\ManyToOne(inversedBy: 'candidat')]
    private ?Candidacy $candidacy = null;

    #[ORM\ManyToOne(inversedBy: 'experience')]
    private ?Experience $experience = null;

    #[ORM\OneToOne(targetEntity: User::class, inversedBy: 'candidat', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: true, name: 'user_id', referencedColumnName: 'id')]
    private ?User $user = null;

    public function __construct()
    {
        $this->registratedAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): static
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getPassportFile(): ?File
    {
        return $this->passportFile;
    }

    public function setPassportFile(?File $passportFile): static
    {
        $this->passportFile = $passportFile;

        return $this;
    }

    public function getCurriculumVitae(): ?File
    {
        return $this->curriculumVitae;
    }

    public function setCurriculumVitae(?File $curriculumVitae): static
    {
        $this->curriculumVitae = $curriculumVitae;

        return $this;
    }

    public function getProfilPicture(): ?File
    {
        return $this->profilPicture;
    }

    public function setProfilPicture(?File $profilPicture): static
    {
        $this->profilPicture = $profilPicture;

        return $this;
    }

    public function getCurrentLocation(): ?string
    {
        return $this->currentLocation;
    }

    public function setCurrentLocation(string $currentLocation): static
    {
        $this->currentLocation = $currentLocation;

        return $this;
    }

    public function getBirthAt(): ?\DateTimeImmutable
    {
        return $this->birthAt;
    }

    public function setBirthAt(\DateTimeImmutable $birthAt): static
    {
        $this->birthAt = $birthAt;

        return $this;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->placeOfBirth;
    }

    public function setPlaceOfBirth(string $placeOfBirth): static
    {
        $this->placeOfBirth = $placeOfBirth;

        return $this;
    }

    public function isAvailability(): ?bool
    {
        return $this->availability;
    }

    public function setAvailability(bool $availability): static
    {
        $this->availability = $availability;

        return $this;
    }

    public function getJobCategory(): ?JobCategory
    {
        return $this->jobCategory;
    }

    public function setJobCategory(?JobCategory $jobCategory): static
    {
        $this->jobCategory = $jobCategory;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getRegistratedAt(): ?\DateTimeImmutable
    {
        return $this->registratedAt;
    }

    public function setRegistratedAt(\DateTimeImmutable $registratedAt): static
    {
        $this->registratedAt = $registratedAt;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeImmutable
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(\DateTimeImmutable $deletedAt): static
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getGenre(): ?Gender
    {
        return $this->genre;
    }

    public function setGenre(?Gender $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getCandidacy(): ?Candidacy
    {
        return $this->candidacy;
    }

    public function setCandidacy(?Candidacy $candidacy): static
    {
        $this->candidacy = $candidacy;

        return $this;
    }


    public function getExperience(): ?Experience
    {
        return $this->experience;
    }

    public function setExperience(?Experience $experience): static
    {
        $this->experience = $experience;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
