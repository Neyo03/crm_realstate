<?php

namespace App\Entity;

use App\Enum\RealstateEquipmentEnum;
use App\Enum\RealstateStateEnum;
use App\Enum\RealstateTypeEnum;
use App\Repository\RealstateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RealstateRepository::class)]
class Realstate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $price = null;

    #[ORM\Column(length: 255)]
    private ?string $addresse = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, enumType: RealstateTypeEnum::class)]
    private array $type = [];

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(enumType: RealstateStateEnum::class)]
    private ?RealstateStateEnum $state = null;

    #[ORM\Embedded(class: Geolocation::class)]
    private Geolocation $geoloc;

    /**
     * @var Collection<int, Rooms>
     */
    #[ORM\OneToMany(targetEntity: Rooms::class, mappedBy: 'realstate', orphanRemoval: true)]
    private Collection $rooms;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, enumType: RealstateEquipmentEnum::class)]
    private array $equipments = [];

    #[ORM\Column]
    private ?int $buildedYear = null;

    #[ORM\Column(length: 2)]
    private ?string $dpe = null;

    /**
     * @var Collection<int, Files>
     */
    #[ORM\OneToMany(targetEntity: Files::class, mappedBy: 'realstate')]
    private Collection $files;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $monthlyFee = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $propertyTax = null;

    #[ORM\ManyToOne(inversedBy: 'realstates')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $agent = null;

    public function __construct()
    {
        $this->rooms = new ArrayCollection();
        $this->files = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getAddresse(): ?string
    {
        return $this->addresse;
    }

    public function setAddresse(string $addresse): static
    {
        $this->addresse = $addresse;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return RealstateTypeEnum[]
     */
    public function getType(): array
    {
        return $this->type;
    }

    public function setType(array $type): static
    {
        $this->type = $type;

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

    public function getState(): ?RealstateStateEnum
    {
        return $this->state;
    }

    public function setState(RealstateStateEnum $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getGeoloc(): Geolocation
    {
        return $this->geoloc;
    }

    public function setGeoloc(Geolocation $geoloc): static
    {
        $this->geoloc = $geoloc;

        return $this;
    }

    /**
     * @return Collection<int, Rooms>
     */
    public function getRooms(): Collection
    {
        return $this->rooms;
    }

    public function addRoom(Rooms $room): static
    {
        if (!$this->rooms->contains($room)) {
            $this->rooms->add($room);
            $room->setRealstate($this);
        }

        return $this;
    }

    public function removeRoom(Rooms $room): static
    {
        if ($this->rooms->removeElement($room)) {
            // set the owning side to null (unless already changed)
            if ($room->getRealstate() === $this) {
                $room->setRealstate(null);
            }
        }

        return $this;
    }

    /**
     * @return RealstateEquipmentEnum[]
     */
    public function getEquipments(): array
    {
        return $this->equipments;
    }

    public function setEquipments(array $equipments): static
    {
        $this->equipments = $equipments;

        return $this;
    }

    public function getBuildedYear(): ?int
    {
        return $this->buildedYear;
    }

    public function setBuildedYear(int $buildedYear): static
    {
        $this->buildedYear = $buildedYear;

        return $this;
    }

    public function getDpe(): ?string
    {
        return $this->dpe;
    }

    public function setDpe(string $dpe): static
    {
        $this->dpe = $dpe;

        return $this;
    }

    /**
     * @return Collection<int, Files>
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(Files $file): static
    {
        if (!$this->files->contains($file)) {
            $this->files->add($file);
            $file->setRealstate($this);
        }

        return $this;
    }

    public function removeFile(Files $file): static
    {
        if ($this->files->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getRealstate() === $this) {
                $file->setRealstate(null);
            }
        }

        return $this;
    }

    public function getMonthlyFee(): ?string
    {
        return $this->monthlyFee;
    }

    public function setMonthlyFee(string $monthlyFee): static
    {
        $this->monthlyFee = $monthlyFee;

        return $this;
    }

    public function getPropertyTax(): ?string
    {
        return $this->propertyTax;
    }

    public function setPropertyTax(string $propertyTax): static
    {
        $this->propertyTax = $propertyTax;

        return $this;
    }

    public function getAgent(): ?User
    {
        return $this->agent;
    }

    public function setAgent(?User $agent): static
    {
        $this->agent = $agent;

        return $this;
    }
}
