<?php
header("Content-Type:text/html;charset=UTF8");
include 'configPHP.php';
include 'function.php';

if (filter_input(INPUT_POST, 'param')) {
    $id = json_decode(filter_input(INPUT_POST, 'param'));
    $row = login($id);
    echo json_encode($row);
    exit();
}
if (filter_input(INPUT_POST, 'id')) {
    $id = json_decode(filter_input(INPUT_POST, 'id'));
    $row = get_org($id);
    echo json_encode($row);
    exit();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Авторизация ППОС</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style2.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="script2.js"></script>
        <script src="https://use.fontawesome.com/17d63f67cb.js"></script>
    </head>
    <body>
        <div id="info"></div>
        <div id="fon" class="close"></div>
        <header>
            <div id="logo"><img src="ppos.png" alt="logo" align="left" height="60"/></div>
            <div><a href="https://vk.com/studiogos"><img src="photo.png" alt="icon1" align="left" height="60"/> Фото- и видеоотчёты</a></div>
            <div><a href="http://yourplus.ru/irk/"><img src="plus.png" alt="icon2" align="left" height="60"/> Портал "Твой Плюс"</a></div>
            <div><a href="https://isu.ru/ru/index.html"><img src="logo.png" alt="icon3" align="left" height="60"/> Сайт ИГУ</a></div>
            <div><a href="index.php"><img src="nazad.png" alt="icon4" align="left" height="60"/> Назад</a></div>
        </header>
        <div id="form">
            <div class="form-1" >
                <p class="field">
                    <input id="log" type="text" name="login" placeholder="Логин или емэйл">
                    <i class="icon-user icon-large"></i>
                </p>
                <p class="field">
                    <input id="psw" type="password" name="password" placeholder="Пароль">
                    <i class="icon-lock icon-large"></i>
                </p>      
                <p class="submit">
                    <button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
                </p>
            </div>
            <div id="msg"></div>
        </div>
        <div id="content">
            
        </div>
    </body>
</html>

