<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html lang="ru">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/bootstrap.css" />
	<title>Задание №4</title>
</head>

<body>

<?php
	$array_num = array();
	$count_elem = 100;
	$count_pair_elem = 0;
	echo "</br>";
	echo "Массив: ";
	for ($i=0; $i<$count_elem; $i++)
		{
			$array_num[$i] = rand(0,10);
			echo $array_num[$i]." ";
		}

	echo "</br>";
	echo "</br>";
	for ($i=0; $i<$count_elem; $i++)
	{
		if ($array_num[$i] == $array_num[$i+1])
		{
			$count_pair_elem++;
		}
	}
	echo "Количество последовательных пар одинаковых элементов: ".$count_pair_elem;
?>

</body>

</html>
