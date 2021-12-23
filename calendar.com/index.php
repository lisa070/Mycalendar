<?php
header("Content-Type:text/html;charset=UTF8");
require_once 'configPHP.php';
include 'function.php';

if(filter_input(INPUT_POST, 'param')) {
	$id = json_decode(filter_input(INPUT_POST, 'param'));
	$row = get_event($id);
	echo json_encode($row);
	exit();
}

if(filter_input(INPUT_POST, 'id')) {
	$id = json_decode(filter_input(INPUT_POST, 'id'));
	$res = get_info($id);
	echo json_encode($res);
	exit();
}


?>
<!--<!DOCTYPE html>
<html>
    <head>
        <title>Мероприятия ППОС</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style1.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="script1.js"></script>
        <script src="https://use.fontawesome.com/17d63f67cb.js"></script>
    </head>
    <body>
        <div id="info"></div>
        <div id="fon" class="close"></div>
        <header>
            <div><img src="ppos.png" alt="logo" align="left" height="60"/></div>
            <div><a href="https://vk.com/studiogos"><img src="photo.png" alt="icon1" align="left" height="60"/> Фото- и видеоотчёты</a></div>
            <div><a href="http://yourplus.ru/irk/"><img src="plus.png" alt="icon2" align="left" height="60"/> Портал "Твой Плюс"</a></div>
            <div><a href="https://isu.ru/ru/index.html"><img src="logo.png" alt="icon3" align="left" height="60"/> Сайт ИГУ</a></div>
            <div><a href="login.php"><img src="login.png" alt="icon4" align="left" height="60"/> Вход</a></div>
        </header>
        <table id="calendar2">
            <thead>
                <tr><td>◄<td colspan="5"><td>►
                <tr><td>Пн<td>Вт<td>Ср<td>Чт<td>Пт<td>Сб<td>Вс
            <tbody>
        </table>
    </body>
</html>-->
<!DOCTYPE html>
<html>
    <head>
        <title>Мероприятия ППОС</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style1.css" type="text/css" rel="stylesheet" />
        <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
        <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
        <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="script1.js"></script>
        <script src="https://use.fontawesome.com/17d63f67cb.js"></script>
    </head>
    <body>

        <div id="header"></div>

        <div id="calendar2"></div>

        <div id="inform"></div>

        <script type="text/babel">

            const e = React.createElement;
            
            const inform = (
                <div>
                    <div id="info"></div>
                    <div id="fon" className="close"></div>
                </div>
            ); 
            
            const header = (
                <div>
                    <div><img src="ppos.png" alt="logo" align="left" height="60"/></div>
                    <div><a href="https://vk.com/studiogos"><img src="photo.png" alt="icon1" align="left" height="60"/> Фото- и видеоотчёты</a></div>
                    <div><a href="http://yourplus.ru/irk/"><img src="plus.png" alt="icon2" align="left" height="60"/> Портал "Твой Плюс"</a></div>
                    <div><a href="https://isu.ru/ru/index.html"><img src="logo.png" alt="icon3" align="left" height="60"/> Сайт ИГУ</a></div>
                    <div><a href="/login.php"><img src="login.png" alt="icon4" align="left" height="60"/> Вход</a></div>
                </div>
            );
    
            const calendar = (
                <div>
                    <table>
                        <thead>
                            <tr><td>◄</td><td colSpan="5"></td><td>►</td></tr>
                            <tr><td>Пн</td><td>Вт</td><td>Ср</td><td>Чт</td><td>Пт</td><td>Сб</td><td>Вс</td></tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            );

            class Inform extends React.Component {
                render() {
                    return (inform);
                }
            };

            class Header extends React.Component {
                render() {
                    return (header);
                }
            };
            
            class Calendar extends React.Component {
                render() {
                    return (calendar);
                }
            };
            
            const domHeader = document.querySelector("#header");
            ReactDOM.render(e(Header), domHeader);
        
            const domCalendar = document.querySelector("#calendar2");
            ReactDOM.render(e(Calendar), domCalendar);
            
            const domInform = document.querySelector("#inform");
            ReactDOM.render(e(Inform), domInform);
        </script>
    </body>
</html>