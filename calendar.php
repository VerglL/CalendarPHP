<?php
$sd = explode("-", $_GET["m"]);
	$year 	= $sd[0];
	$month = $sd[1];

// ‚ычислЯем число дней в текущем месЯце
$dayofmonth = date('t',
                      mktime(0, 0, 0, $month, 1, $year));
					  
  // ‘чЮтчик длЯ дней месЯца
  $day_count = 1;

  // 1. ЏерваЯ неделЯ
  $num = 0;
  for($i = 0; $i < 7; $i++)
  {
    // ‚ычислЯем номер днЯ недели длЯ числа
    $dayofweek = date('w',
                      mktime(0, 0, 0, $month, $day_count, $year));
    // Џриводим к числа к формату 1 - понедельник, ..., 6 - суббота
    $dayofweek = $dayofweek - 1;
    if($dayofweek == -1) $dayofweek = 6;

    if($dayofweek == $i)
    {
      // …сли дни недели совпадают,
      // заполнЯем массив $week
      // числами месЯца
      $week[$num][$i] = $day_count;
      $day_count++;
    }
    else
    {
      $week[$num][$i] = "";
    }
  }

  // 2. Џоследующие недели месЯца
  while(true)
  {
    $num++;
    for($i = 0; $i < 7; $i++)
    {
      $week[$num][$i] = $day_count;
      $day_count++;
      // …сли достигли конца месЯца - выходим
      // из цикла
      if($day_count > $dayofmonth) break;
    }
    // …сли достигли конца месЯца - выходим
    // из цикла
    if($day_count > $dayofmonth) break;
  }

  // 3. ‚ыводим содержимое массива $week
  // в виде календарЯ
  // ‚ыводим таблицу
  echo "<table border=1>";
  for($i = 0; $i < count($week); $i++)
  {
    echo "<tr>";
    for($j = 0; $j < 7; $j++)
    {
      if(!empty($week[$i][$j]))
      {
        // …сли имеем дело с субботой и воскресеньЯ
        // подсвечиваем их
        if($j == 5 || $j == 6) 
             echo "<td><font color=red>".$week[$i][$j]."</font></td>";
        else echo "<td>".$week[$i][$j]."</td>";
      }
      else echo "<td>&nbsp;</td>";
    }
    echo "</tr>";
  } 
  echo "</table>";
?>