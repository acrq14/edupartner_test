<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
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
                    <li><a href="../index.php" class="menu__item">Главная</a></li>
                    <li><a href="insert.php" class="menu__item">Пополнение</a></li>
                </ul>
            </nav>
        </div>
        </header>
        <div class="header_main">
                <p class="header_main_text">
                    Введите новое слово
                </p> 
        </div>
        <hr class="line">
        <article class="forarticle">
            <form class="forform" action="insert.php" method="post">
                <label for="">Слово</label>
                <input class="eng_word_label" type="text" name="word" value="" name="search" placeholder="Введите слово" required>
                <label for="">Перевод</label>
                <input class="rus_word_label" type="text" name="meaning" value="" name="search" placeholder="Введите значение/перевод" require="">
                <input type="submit" name="insert" value="Добавить слово">
            </form>
        </article>
        <table class="table">
            <tr>
                <th>Английский</th>
                <th>Русский</th>
            </tr>
        
        <?php
        include 'check.php';
        include '../config/db.php';                                                 
        if(isset($_POST['insert'])){                                      
            $word = $_POST['word'];                                        
            $meaning = $_POST['meaning'];                                 

            $sql="INSERT INTO words(eng,rus) values('$word','$meaning')";  
            $query=mysqli_query($conn,$sql);                             
        }
        $sqltable="SELECT * from words";
        $querytable=mysqli_query($conn,$sqltable);
        while($info=mysqli_fetch_array($querytable)){
            ?>
            <tr>
                <td><?php echo $info['eng']; ?></td>
                <td><?php echo $info['rus']; ?></td>
            </tr>
        <?php
        }    

        ?>

        </table>

    </div>
</body>
</html>
