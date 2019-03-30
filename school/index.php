<?php
$page = 'landing-main';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
require "header.php";
require "$page.php";
require "footer.php";
