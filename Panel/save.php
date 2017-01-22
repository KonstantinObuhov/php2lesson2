<?php

require __DIR__ . '/../autoload.php';

if (isset($_POST['id'])) {
    $article = \App\Models\Article::findById($_POST['id']);
} else {
    $article = new \App\Models\Article;
}
$article->title = $_POST['title'];
$article->text = $_POST['text'];
$article->save();
header('Location: /Panel/index.php');