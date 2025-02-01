<?php

namespace App\Entity;

use App\Enum\FloorCoveringEnum;
use App\Enum\RoomsPropertiesEnum;
use App\Enum\RoomsTypeEnum;
use App\Enum\WallCoveringEnum;
use App\Repository\RoomsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomsRepository::class)]
class Rooms
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'rooms')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Realstate $realstate = null;

    #[ORM\Column(enumType: RoomsTypeEnum::class)]
    private ?RoomsTypeEnum $type = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $space = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, enumType: RoomsPropertiesEnum::class)]
    private array $properties = [];

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $ceilingHeight = null;

    #[ORM\Column(enumType: FloorCoveringEnum::class)]
    private ?FloorCoveringEnum $floorCovering = null;

    #[ORM\Column(enumType: WallCoveringEnum::class)]
    private ?WallCoveringEnum $wallCovering = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRealstate(): ?Realstate
    {
        return $this->realstate;
    }

    public function setRealstate(?Realstate $realstate): static
    {
        $this->realstate = $realstate;

        return $this;
    }

    public function getType(): ?RoomsTypeEnum
    {
        return $this->type;
    }

    public function setType(RoomsTypeEnum $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getSpace(): ?string
    {
        return $this->space;
    }

    public function setSpace(string $space): static
    {
        $this->space = $space;

        return $this;
    }

    /**
     * @return RoomsPropertiesEnum[]
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    public function setProperties(array $properties): static
    {
        $this->properties = $properties;

        return $this;
    }

    public function getCeilingHeight(): ?string
    {
        return $this->ceilingHeight;
    }

    public function setCeilingHeight(string $ceilingHeight): static
    {
        $this->ceilingHeight = $ceilingHeight;

        return $this;
    }

    public function getFloorCovering(): ?FloorCoveringEnum
    {
        return $this->floorCovering;
    }

    public function setFloorCovering(FloorCoveringEnum $floorCovering): static
    {
        $this->floorCovering = $floorCovering;

        return $this;
    }

    public function getWallCovering(): ?WallCoveringEnum
    {
        return $this->wallCovering;
    }

    public function setWallCovering(WallCoveringEnum $wallCovering): static
    {
        $this->wallCovering = $wallCovering;

        return $this;
    }
}
