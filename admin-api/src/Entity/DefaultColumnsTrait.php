<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

trait DefaultColumnsTrait
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue
     * @ORM\Column(type="bigint", nullable=false, options={"unsigned": true})
     */
    private int $id;

    /**
     * @ORM\Column(name="updatedAt", type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private readonly ?Datetime $createdAt;
    /**
     * @ORM\Column(name="createdAt", type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private readonly ?Datetime $updatedAt;
}
