<?php

namespace App\Model;

class ArticleManager extends AbstractManager
{
    public const TABLE = 'Article';

    public function selectRandomOne()
    {
        $query = 'SELECT * FROM ' . static::TABLE . ' ORDER BY RAND() LIMIT 1';
        return $this->pdo->query($query)->fetch();
    }

    public function search(string $search)
    {
        $statement = $this->pdo->prepare('SELECT * FROM ' . static::TABLE . ' WHERE title LIKE :search');
        $statement->bindValue(':search', '%' . $search . '%');
        $statement->execute();
        return $statement->fetchAll();
    }
}
