<?php
include("sql_to.php");

// соединяемся к БД
$con = mysql_connect('localhost', 'domotekhnika', '123123') or die('Не удалось соединиться: ' . mysql_error());
mysql_select_db('domotekhnika') or die('Не удалось выбрать базу данных');

header("Accept-Charset: utf-8");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET['user_id'])) {
    // один пользователь
    $users = mysql_query("SELECT * FROM users WHERE id = " . $_GET['user_id']);
  }
  else
  {
    // список пользователей
    $users = mysql_query("SELECT * FROM users");
  }

}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['user_id'])) {
    $params = array();
    if (isset($_POST['nick']))
      $params[] = "nick = '" . $_POST['nick'] . "'";
    if (isset($_POST['email']))
      $params[] = "email = '" . $_POST['email'] . "'";
    mysql_query("UPDATE users SET ". join(",", $params) ." WHERE id = " . $_POST['user_id']) or die(mysql_error());
    $users = mysql_query("SELECT * FROM users WHERE id = " . $_POST['user_id']);
  }
  else {
    echo("Ошибка! Требуется параметр user_id!");
  }
}

// формат вывода
if (isset($users)) {
  if (!isset($_GET['format']) or $_GET['format'] == 'json') {
    header('Content-Type: application/json');
    echo sqlToJson($users);
  }
  elseif ($_GET['format'] == 'xml') {
    header("Content-Type: application/xml");
    echo sqlToXml($users, "users", "user");
  }
}



?>
