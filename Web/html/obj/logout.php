<?php
session_destroy();
unset($_POST);
unset($_COOKIE);
header('Location: ../../home_page.php');
