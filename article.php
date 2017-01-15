<?php
require __DIR__ . '/autoload.php';

if(isset($_GET['id'])) {
    $article_id = $_GET['id'];
    $article = \App\Models\Article::findById((int) $article_id);
    ($article) ? include __DIR__ . '/ArticleTemplate.php' : header('Location: /index.php');
}