<?php

require __DIR__ . '/../autoload.php';

if (isset($_GET['id'])) {
    $article = \App\Models\Article::findById($_GET['id']);
}

include __DIR__ . '/EditorTemplate.php';