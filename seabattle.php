<?php
class SeaBattle
{
  private $field;
  private $M;
  private $N;

  public function __construct($M, $N)
  {
    $this -> M = $M;
    $this -> N = $N;
    $this -> field = array(array());

    for ($i = 0; $i < $M; $i++)
    {
      for ($j = 0; $j < $N; $j++)
      {
        $this -> field[$i][$j] = 0;
      }
    }
  }

  public function Shoot($shoot)
  {
    for ($k = 0; $k < $shoot; $k++)
    {
      $i = 0;
      $j = 0;
      do
      {
        $i = rand(0, $this -> M-1);
        $j = rand(0, $this -> N-1);
      } while($this -> field[$i][$j] == 1);

      $this -> field[$i][$j] = 1;
    }
  }

  public function ToString()
  {
    $string = "";
    for ($i = 0; $i < $this -> M; $i++)
    {
      for ($j = 0; $j < $this -> N; $j++)
      {
        $string = $string.$this -> field[$i][$j]." ";
      }
      $string = $string."</br>";
    }
    return $string;
  }

  private function CheckBomb($i1, $j1, $i2, $j2)
  {
    for ($i = $i1; $i <= $i2; $i++)
    {
      for ($j = $j1; $j <= $j2; $j++)
      {
        if ($this -> field[$i][$j] == 1)
        {
          return true;
        }
      }
    }
    return false;
  }

  private function FindMaxClearRectangle($i1, $j1, $i2, $j2)
  {
    $rectangle = array(0,0,0,0);
    if (!$this -> CheckBomb($i1, $j1, $i2, $j2))
    {
      $rectangle[0] = $i1;
      $rectangle[1] = $j1;
      $rectangle[2] = $i2;
      $rectangle[3] = $j2;
    }
    else
    {
      if ($i1 != $i2)
      {
        $new_rectangle = $this -> FindMaxClearRectangle($i1, $j1, $i2 - 1, $j2);
        if (($rectangle[2]-$rectangle[0])*($rectangle[3]-$rectangle[1]) <
              ($new_rectangle[2]-$new_rectangle[0])*($new_rectangle[3]-$new_rectangle[1]))
        {
          $rectangle = $new_rectangle;
        }
      }
      if ($i1 != $i2)
      {
        $new_rectangle = $this -> FindMaxClearRectangle($i1 + 1, $j1, $i2, $j2);
        if (($rectangle[2]-$rectangle[0])*($rectangle[3]-$rectangle[1]) <
              ($new_rectangle[2]-$new_rectangle[0])*($new_rectangle[3]-$new_rectangle[1]))
        {
          $rectangle = $new_rectangle;
        }
      }
      if ($j1 != $j2)
      {
        $new_rectangle = $this -> FindMaxClearRectangle($i1, $j1 + 1, $i2, $j2);
        if (($rectangle[2]-$rectangle[0])*($rectangle[3]-$rectangle[1]) <
              ($new_rectangle[2]-$new_rectangle[0])*($new_rectangle[3]-$new_rectangle[1]))
        {
          $rectangle = $new_rectangle;
        }
      }
      if ($j1 != $j2)
      {
        $new_rectangle = $this -> FindMaxClearRectangle($i1, $j1, $i2, $j2 - 1);
        if (($rectangle[2]-$rectangle[0])*($rectangle[3]-$rectangle[1]) <
              ($new_rectangle[2]-$new_rectangle[0])*($new_rectangle[3]-$new_rectangle[1]))
        {
          $rectangle = $new_rectangle;
        }
      }
    }
    return $rectangle;
  }

  public function FilledField()
  {
    $rectangle = $this -> FindMaxClearRectangle(0, 0, ($this -> M)-1, ($this -> N)-1);
    for ($i = $rectangle[0]; $i <= $rectangle[2]; $i++)
    {
      for ($j = $rectangle[1]; $j <= $rectangle[3]; $j++)
      {
        $this -> field[$i][$j] = 2;
      }
    }
  }
}

$seabattle = new SeaBattle(5, 5);

$seabattle -> Shoot(5);
echo $seabattle -> ToString()."</br>";

$seabattle -> FilledField();
echo $seabattle -> ToString();
?>
