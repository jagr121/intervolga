<?php
$field = array();
$M = 2;
$N = 2;
$shoot = 5;

for ($i=0; $i<$M; $i++)
{
  for ($j=0; $j<$N; $j++)
  {
    $field[$i][$j] = 0;
  }
}

for ($k=0; $k<$shoot; $k++)
{
  $i = rand(0,$M);
  $j = rand(0,$N);
  $field[$i][$j] = 1;
}




function pole($field, $i1, $j1, $i2, $j2)
{
  for ($i=$i1; $i<=$i2; $i++)
  {
    for ($j=$j1; $j<=$j2; $j++)
    {
      if ($field[$i][$j] == 1)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
  }
}

?>
