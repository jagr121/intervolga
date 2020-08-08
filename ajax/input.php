<?php
// main
include('link.php');

$link = connect();

$name = htmlspecialchars($_POST['name']);
$fullname = htmlspecialchars($_POST['fullname']);
$area = intVal(htmlspecialchars($_POST['area']));
$population = intVal(htmlspecialchars($_POST['population']));

if ($fullname == "")
	$fullname="NULL";

$req = Add($link, $name, $fullname, $area, $population);

switch ($req) {
	case "00000":
		echo "Запись успешно добавлена.";
		break;
	case "23000":
		echo "Такое название и/или полное название страны уже существует.";
		break;

	default:
		echo "Error.$req.";
		break;
}


disconnect($link);

//функция добавления данных в БД
function Add($link, $name, $fullname, $area, $population)
{
	$data_input = $link->prepare("INSERT INTO `countries` SET `name` = :name, `fullname` = :fullname, `area` = :area, `population` = :population");
	$data_input->execute(array('name' => htmlspecialchars($name), 'fullname' => htmlspecialchars($fullname), 'area' => htmlspecialchars($area), 'population' => htmlspecialchars($population)));

	return $data_input->errorCode();

	// if ($data_input)
	// {
	// 	return "Успех";
	// }
	// else
	// {
	// 	//echo '<p>Произошла ошибка: '.mysqli_error($link).'</p>';
	// 	return $link->errorCode();
	// }
}


function Select($link)
	{
			$array= array();
			$result = $link->prepare("SELECT * FROM `countries`");
			$result->execute();
			$array = $result->fetchAll(PDO::FETCH_ASSOC);
			return $array;
	}
?>
