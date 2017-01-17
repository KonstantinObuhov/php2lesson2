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
<form action="editor.php" method="post">
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
</body>
</html>
