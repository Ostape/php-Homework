<?php
require 'functions.php';
//require "header.php";

$result = get_restaraunts();
echo render('showtempl', array('name_res'=>$result));
//require "footer.php";