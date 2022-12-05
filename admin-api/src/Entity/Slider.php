<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="Slider")
 * @ORM\Entity()
 */
class Slider
{
    use DefaultColumnsTrait;

    /** @ORM\Column(type="string") */
    private string $imagePath;
}
