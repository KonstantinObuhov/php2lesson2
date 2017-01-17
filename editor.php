<?php

require __DIR__ . '/autoload.php';

$news = \App\Models\Article::findAll ();
$article = new \App\Models\Article();

if (isset($_GET['id'])) {
    $article = \App\Models\Article::findById($_GET['id']);
}

include __DIR__ . '/EditorTemlate.php';