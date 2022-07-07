<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <header class = "header">
        <div class="container header__container">
            <div class="menu-burger__header">
                <span></span>
            </div>
            <nav class="header__nav">
                <ul class="menu header__menu">
                    <li><a href="index.php" class="menu__item">Главная</a></li>
                    <li><a href="php/insert.php" class="menu__item">Пополнение</a></li>
                </ul>
            </nav>
        </div>
        </header>
        <div class="header_main">
                <p class="header_main_text">
                    Англо-русский словарь
                </p> 
        </div>
        <hr class="line">
        <article class="forarticle" >
            <form action="index.php" method="POST">
                <input type="text" name="word" value="" placeholder="Поиск слова">
                <input type="submit" name="search" value="Найти слово">
            </form>
        </article>
        <?php
        include 'config/db.php';
        if (isset($_POST['search'])){
            $word=$_POST['word'];
            $sql="SELECT * from words where eng='$word'";
            $query=mysqli_query($conn,$sql);
            while ($info=mysqli_fetch_array($query)){
                ?>
                <p class="answer_text">
                    Переводом слова <?php echo $info['eng'];?> будет слово
                </p> 
                <div class="answer"><?php echo $info['rus'];?></div>
                <?php
            }
        }
        ?>
        

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="js/menu.js"></script> 
    </script>
</body>
</html>