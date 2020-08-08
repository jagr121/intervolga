<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html lang="ru">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<title>Задание №1</title>
</head>

<body>

<div class="jumbotron">
	<div class="card mb-3">
		<div class="card-body">
		<h1 class="display-4">Хорошие новости</h1>
		<p class="lead">
			<?php
				$a = "Хорошие новости пришли в начале ноября 2018 года из города Майкоп. Там неизвестная девушка оплатила долг благотворительной организации в размере 340 тысяч рублей. Началась эта история, когда в приют обратилась молодая студентка, попросившая принять найденного на улице котёнка. Сотрудники некоммерческой организации были вынуждены отказать ей, сославшись на то, что у фонда большой долг перед ветеринарной клиникой. Удивлению волонтёров не было предела, когда девушка спокойно предложила оплатить несколько сотен тысяч рублей.
				В социальной сети представители приюта для животных рассказали, что испытали настоящий шок от такой внезапной щедрости незнакомки. За пять с лишним лет их работы такое событие случилось впервые. Девушка просто взяла и оплатила весь долг благотворительной организации. Своё имя студентка попросила не раскрывать, однако разместить её фото с тем самым найденным ею котёнком, которому дали кличку Золотой, все же разрешила.";

				$link = "https://humanstory.ru/society/zolotoy-031118";

				$new_a = mb_substr($a, 0, 177);
				$new_a = $new_a . "...";

				$new_array_a = explode(" ",$new_a);

				$sum = 1;
				$sum += mb_strlen($new_array_a[count($new_array_a)-1]);
				$sum += mb_strlen($new_array_a[count($new_array_a)-2]);

				$last_elem = mb_substr($new_a, mb_strlen($new_a)-$sum, $sum);

				$b = mb_substr($new_a, 0, mb_strlen($new_a)-$sum) . '<a href="'.$link.'">' .'<span style="color: gray">'.$last_elem.'</span>'. '</a>' ;

				echo $b;
			?>
		</p>
		<div class="text-center">
			<img src="https://humanstory.ru/images/Zolotoy-031118.jpg" class="border border-secondary rounded-lg" alt="image">
		</div>
	  </div>
	</div>
</div>

</body>

</html>
