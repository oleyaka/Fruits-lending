<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\DBAL\Connection;

class SliderRepository
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getAll(): array
    {
        $qb = $this->connection->createQueryBuilder();
        $stmt = $qb->select("*")->from("Slider")->executeQuery();

        return $stmt->fetchAllAssociative();
    }
}