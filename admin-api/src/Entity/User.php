<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="User")
 * @ORM\Entity()
 */
class User
{
    use DefaultColumnsTrait;

    /** @ORM\Column(type="string") */
    private string $name;
}
