<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\DBAL\Connection;

class ProductsRepository
{
    public function __construct(private readonly Connection $connection)
    {
    }

    public function index(): array
    {
        $qb = $this->connection->createQueryBuilder();
        $result = $qb->select('*')
            ->from('Products')
            ->executeQuery();

        return $result->fetchAllAssociative();
    }

    public function show(int $id): array
    {
        $qb = $this->connection->createQueryBuilder();
        $result = $qb->select('*')
            ->from('Products')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->executeQuery();

        return $result->fetchAssociative();
    }

    public function store(array $data): int
    {
        $this->connection->insert('Products', [
            'imagePath' => $data['imagePath'],
            'title' => $data['title'],
            'price' => $data['price'],
        ]);

        return (int) $this->connection->lastInsertId();
    }

    public function edit(int $id, array $data): void
    {
        $this->connection->update('Products', [
            'imagePath' => $data['imagePath'],
            'title' => $data['title'],
            'price' => $data['price'],
            'updatedAt' => date('Y-m-d H:i:s'),
        ], ['id' => $id]);
    }

    public function delete(int $id): void
    {
        $this->connection->delete('Products', ['id' => $id]);
    }
}