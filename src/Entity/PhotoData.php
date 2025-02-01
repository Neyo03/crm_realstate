<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Embeddable;
use Doctrine\ORM\Mapping as ORM;

#[Embeddable]
class PhotoData
{
    #[ORM\Column(type: 'string', length: 255)]
    private string $url;

    #[ORM\Column(type: 'boolean')]
    private bool $isMain = false;
}
