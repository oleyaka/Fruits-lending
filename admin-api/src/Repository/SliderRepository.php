<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\DBAL\Connection;

class SliderRepository
{
    public function __construct(private readonly Connection $connection)
    {
    }

    public function index(): array
    {
        $qb = $this->connection->createQueryBuilder();
        $result = $qb->select('*')
            ->from('Slider')
            ->executeQuery();

        return $result->fetchAllAssociative();
    }

    public function show(int $id): array
    {
        $qb = $this->connection->createQueryBuilder();
        $result = $qb->select('*')
            ->from('Slider')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->executeQuery();

        return $result->fetchAssociative();
    }

    public function store(array $data): int
    {
        $this->connection->insert('Slider', [
            'imagePath' => $data['imagePath'],
        ]);

        return (int) $this->connection->lastInsertId();
    }

    public function edit(int $id, array $data): void
    {
        $this->connection->update('Slider', [
            'imagePath' => $data['imagePath'],
            'updatedAt' => date('Y-m-d H:i:s'),
        ], ['id' => $id]);
    }

    public function delete(int $id): void
    {
        $this->connection->delete('Slider', ['id' => $id]);
    }
}