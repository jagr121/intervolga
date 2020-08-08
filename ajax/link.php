<?php
//функция подключения к БД
function connect()
{
  $name = "root";
  $password = "";
  try
    {
      $link = new PDO('mysql:dbname=country_database;host=127.0.0.1', $name, $password);
    }
  catch (PDOException $error) 
    {
      die($error->getMessage());
    }
  return ($link);
}

//функция отключения от БД
function disconnect($link)
{
  $link = null;
}
?>
