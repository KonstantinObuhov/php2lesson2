<?php

require __DIR__.'/../autoload.php';

$article = \App\Models\Article::findById(1);

//assert(1 == 2);
assert(is_object($article));
assert($article instanceof \App\Models\Article);
//assert($article instanceof \App\Models\Authord);