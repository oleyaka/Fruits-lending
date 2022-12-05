<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="Products")
 * @ORM\Entity()
 */
class Products
{
    use DefaultColumnsTrait;

    /** @ORM\Column(type="string") */
    private string $imagePath;

    /** @ORM\Column(type="string") */
    private string $title;

    /** @ORM\Column(type="string") */
    private string $price;
}
