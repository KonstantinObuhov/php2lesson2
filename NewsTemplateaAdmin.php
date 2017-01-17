<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <input type="hidden" name="action" value="add-upd">
    <input type="hidden" name="id" value="<?php echo $article->id;?>">
    <div>
        <lable for="title">Название статьи</lable>
        <input id="title" name="title" type="text" value="<?php echo $article->title;?>">
    </div>
    <div>
        <lable for="text">Название статьи</lable>
        <textarea id="text" name="text" type="text"><?php echo $article->text;?></textarea>
    </div>
    <button type="submit">Отправить</button>
</form>
<?php foreach ($news as $article) {?>
    <div class="article">
        <h3 class="title"><?php echo $article->title; ?></h3>
        <div class="text"><?php echo $article->text; ?></div>
        <a href="?id=<?php echo $article->id; ?>&action=del">Удалить</a>
        <a href="?id=<?php echo $article->id; ?>">Редактировать</a>
    </div>
<?php }?>
</body>
</html>
