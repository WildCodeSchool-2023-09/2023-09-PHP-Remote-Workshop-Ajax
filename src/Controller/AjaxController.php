<?php

namespace App\Controller;

use App\Model\ArticleManager;

class AjaxController extends AbstractController
{
    public function __construct()
    {
        parent::__construct();

        header('Content-Type: application/json');
    }

    public function getArticles(): string
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->selectAll();

        return json_encode($articles);
    }

    public function getRandomArticle(): string
    {
        $articleManager = new ArticleManager();
        return json_encode($articleManager->selectRandomOne());
    }

    public function searchArticles(string $search): string
    {
        $articleManager = new ArticleManager();
        return json_encode($articleManager->search($search));
    }

    public function getArticleById(int $id): string
    {
        //TODO
        return "$id";
    }
}
