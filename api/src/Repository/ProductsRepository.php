<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\DBAL\Connection;

class ProductsRepository
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getAll(): array
    {
        $qb = $this->connection->createQueryBuilder();
        $stmt = $qb->select("*")->from("Products")->executeQuery();

        return $stmt->fetchAllAssociative();
    }
}