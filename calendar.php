<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
</head>
<body>
    <h1>萬年曆</h1>
  <style>
    table{
        border-collapse:collapse;

    }
    td{
        padding:5px 10px;
        text-align: center;
        border:1px solid #999;
    }
    .holiday{
        background:pink;
        color:#999;
    }
    .grey-text{
        color:#999;
    }
    .today{
        background:blue;
        color:white;
        font-weight:bolder;
    }
</style>
<h3><?php echo date("m月");?></h3>
<table>
<tr>
    <td></td>
    <td>日</td>
    <td>一</td>
    <td>二</td>
    <td>三</td>
    <td>四</td>
    <td>五</td>
    <td>六</td>
</tr>
<?php 
$d=strtotime("2024-6");
$firstDayWeek=date("w",strtotime(date("Y-m-1")));

for($i=0;$i<6;$i++){
    echo "<tr>";
    echo "<td>";
    echo $i+1;
    echo "</td>";
    for($j=0;$j<7;$j++){
        echo "<td>";
        $dayNum=$i*7 + $j +1 - $firstDayWeek;
        if($dayNum<=date('t') && $dayNum >0){
            echo $dayNum;
        }
        echo "</td>";
    }

    echo "</tr>";

}

?> 
</table>

<table>
    <ul>
        <li>有上一個月下一個月的按鈕</li>
        <li>萬年曆都在同一個頁面同一個檔案</li>
        <li>有前年和來年的按鈕</li>
        <li></li>
        <li></li>
    </ul>
    <?php
if(isset($_GET['month'])){
    $month=$_GET['month'];
}else{
    $month=date("m");
}
if(isset($_GET['year'])){
    $year=$_GET['year'];
}else{
    $year=date("y");
}

if($month-1<1){
    $prevmonth=12;
    $preyear=$year-1;
}else{
    $premonth=$month-1;
    
}
if($moth+1>12){
    $nextmonth=1;
    $nextmonth=$year+1;
}

    ?>
    <a href="calendar.php?year=<?=$year-1;?>">前年</a>
<a href="calendar.php?month=<?=$premonth-1;?>">上一個月</a> <a href="calendar.php?month=<?=$premonth+1;?>">下一個月</a>
<a href="calendar.php?year=<?=$year+1;?>">明年</a>
<h3><?php echo date ("{$year}年")?></h3>
<h3><?php echo date ("{$month}月")?></h3>
<tr>
    <td></td>
    <td>日</td>
    <td>一</td>
    <td>二</td>
    <td>三</td>
    <td>四</td>
    <td>五</td>
    <td>六</td>
</tr>
<?php

$firstDay=date("2024-{$month}-1");
$firstDayTime=strtotime($firstDay);
$firstDayWeek=date("w",strtotime(date("Y-m-1")));

for($i=0;$i<6;$i++){
    echo "<tr>";
    echo "<td>";
    echo $i+1;
    echo "</td>";
    for($j=0;$j<7;$j++){
        //echo "<td class='holiday'>";
        $cell=$i*7+$j -$firstDayWeek;
        $theDayTime=strtotime("$cell days".$firstDay);

        //所需樣式css判斷
        $theMonth=(date("m",$theDayTime)==date("m"))?'':'grey-text';
        $isToday=(date("Y-m-d",$theDayTime)==date("Y-m-d"))?'today':'';
        $w=date("w",$theDayTime);
        $isHoliday=($w==0 || $w==6)?'holiday':'';
        
        echo "<td class='$isHoliday $theMonth $isToday'>";
        echo date("d",$theDayTime);
        echo "</td>";
        
    }
    echo "</tr>";
}



?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>