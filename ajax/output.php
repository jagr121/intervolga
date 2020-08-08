<?php
//main
include('link.php');

$link = connect();

$table_output = Select($link);

disconnect($link);

echo json_encode($table_output);

//функция вывода данных на страницу
function Select($link)
	{
			$array= array();
			$result = $link->prepare("SELECT * FROM `countries`");
			$result->execute();
			$array = $result->fetchAll(PDO::FETCH_ASSOC);
			return $array;
	}
?>
