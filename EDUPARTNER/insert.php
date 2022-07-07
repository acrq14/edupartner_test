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
                    <a href="index.php" class="info1">Словарь</a>
                    <a href="insert.php" class="info2">Пополнение</a>
                </div>
            </div>
            <div class="header_main">
                <p class="header_main_text">
                    Пополнение словаря
                </p> 
            </div>
            <hr class="line">
        </header>
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
        include 'db.php';                                                  // Привязка db.php
        if(isset($_POST['insert'])){                                       // Проверка отправки POST от insert
            $word = $_POST['word'];                                        // Привязка input с изменем word к переменной word
            $meaning = $_POST['meaning'];                                  // Привязка input с изменем word к переменной word

            $sql="INSERT INTO words(eng,rus) values('$word','$meaning')";  // Вставка значение в бд
            $query=mysqli_query($conn,$sql);                              // Запрос к базе данных
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
