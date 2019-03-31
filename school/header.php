<?php
?>

<!DOCTYPE>
<html>
<head>
    <!--   -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/mortarboard.png">
    <link rel="stylesheet" href="main.css">
    <title>ЗОШ І-ІІІ ступенів №7 - Гордість нашої школи</title>

</head>


<body>

<div class ="header">
    <div class="header01">
        <div id="emblem">
            <div id="img_header">  <img src="img/emblem.png" height="100%" alt="емблема школи"> </div>
            <span id="text_header">Полонський НВК №2</span>
        </div>

        <nav>
            <ul class="menu">
                <li><a href="?page=landing-main">Головна</a></li>
                <li><a href="#">Новини</a></li>
                <li><a href="?page=container">Наші досягнення</a></li>
                <li><a href="?page=informational">Контакти</a></li>
                <li><a href="#">Батькам</a></li>
                <li><a href="#">Вчителям</a></li>
                <li><a href="#">Учням</a></li>
                <li><a href="#">Блоги вчителів</a></li>
                <li><a href="#">Історія школи</a></li>
                <li><a href="?page=forms">Увійти</a></li>
            </ul>
            <a href="#"> <div class="hamburger" onclick="toggleMenu();"></div></a>
        </nav>

    </div>

    <script type="text/javascript">

        let menu = document.getElementsByClassName('menu')[0];

        function toggleMenu() {
            if (menu.className === "menu") {
                menu.className += " open";
            } else {
                menu.className = "menu";
            }
        }
    </script>


    <div class="header02">
        <nav class="btn_pos" id="header02">
            <a href="?page=landing-main" class="text_btn">Головна</a>
            <a href="#" class="text_btn" style="padding-left: 50px;">Новини</a>
            <a href="?page=container" class="text_btn" style="padding-left: 50px;">Наші досягнення</a>
            <a href="?page=informational" class="text_btn" style="padding-left: 50px;">Контакти</a>
        </nav>

        <div class="search">
            <img src="img/search.png" height="100%" width="200px" style="float: right;">
        </div>
    </div>
</div>


<div class="header03">
    <div class="emblem_desk">
        <div style="float: left; width: 300px;" >
            <div style="float: left;"><img src="img/emblem.png" height="100%">	 </div>
            <span class="text-header-desk"><br>Полонський НВК №2</span>
        </div>

        <div class="add-btns">
            <div style="float: left; width: 80px; height: 100%;">
                <ul>
                    <li><a href="#" class="text_btn_desk">Батькам</a></li>
                    <li class="l"><a href="#" class="text_btn_desk">Вчителям</a>	</li>
                    <li class="l"><a href="#" class="text_btn_desk">Учням</a>		</li>
                </ul>
            </div>

            <div style="float: right; width: 105px; height: 100%;">
                <li><a href="#" class="text_btn_desk" >Блоги вчителів</a></li>
                <li class="l">	<a href="#" class="text_btn_desk" >Історія школи</a></li>
                <li class="l">	<a href="?page=forms" class="text_btn_desk" >Увійти</a></li>
            </div>

        </div>
    </div>
</div>

