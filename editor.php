<?php

require __DIR__ . '/autoload.php';

$news = \App\Models\Article::findAll ();
$article = null;

if (isset( $_GET[ 'id' ])) {
    ($article = \App\Models\Article::findById( $_GET[ 'id' ])) ? : header('Location: /editor.php');
}

if (isset( $_GET[ 'action' ]) && 'del' == $_GET[ 'action' ]) {
    $article->delete();
    header('Location: /editor.php');
}

if ( isset( $_POST[ 'action' ]) && 'add-upd' == $_POST[ 'action' ]) {
    if(empty($_POST['id'])) {
        $article = new \App\Models\Article();
    }
    $article->title = $_POST['title'];
    $article->text = $_POST['text'];
    $article->save();
    header('Location: /editor.php');
}

include __DIR__ . '/NewsTemplateaAdmin.php';