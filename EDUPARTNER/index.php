<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="container">
        <header class="header">
            <div class="header_content">
                <div class="header_content_info">
                    <a href="" class="info1">r.abzaliloff@yandex.ru</a>
                    <a href="" class="info2">+79822065851</a>
                </div>
                <div class="header_content_nav">
                    <a href="check.php" class="info1">Импорт</a>
                    <a href="index.php" class="info1">Словарь</a>
                    <a href="insert.php" class="info2">Пополнение</a>
                </div>
            </div>
            <div class="header_main">
                <p class="header_main_text">
                    Англо-русский словарь
                </p> 
            </div>
            <hr class="line">
        </header>
        <article class="forarticle" >
            <form action="index.php" method="POST">
                <input type="text" name="word" value="" placeholder="Поиск слова">
                <input type="submit" name="search" value="Найти слово">
            </form>
        </article>
        <?php
        include 'db.php';
        if (isset($_POST['search'])){
            $word=$_POST['word'];
            $sql="SELECT * from words where eng='$word'";
            $query=mysqli_query($conn,$sql);
            while ($info=mysqli_fetch_array($query)){
                ?>
                <div class="answer"><?php echo $info['rus'];?></div>
                <?php
            }
        }
        ?>
        

    </div>
</body>
</html>