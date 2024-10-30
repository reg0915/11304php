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
        margin:auto;

    }
    td{
        padding:5px 10px;
        text-align: center;
        border:1px solid #999;
        width: 65px;
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
    .nav{
        width: 688px;
        margin: auto;
    }
    .nav table td{
        border:0px;
        padding: 0;
    }
</style>



    <ul>
        <li>有上一個月下一個月的按鈕</li>
        <li>萬年曆都在同一個頁面同一個檔案</li>
        <li>有前年和來年的按鈕</li>
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
    $year=date("Y");
}

if($month-1<1){
    $prevmonth=12;
    $prevyear=$year-1;
}else{
    $prevmonth=$month-1;
    $prevyear=$year;
    
}
if($month+1>12){
    $nextmonth=$month;
    $nextyear=$year+1;
}else{
    $nextmonth=$month+1;
    $nextyear=$year;
}

$spDate=[
    '2024-11-07'=>"立冬",
    '2024-06-10' => "端午節",
    '2024-09-17' => "中秋節",
    '2025-06-20' => "端午節",
    '2025-09-27' => "中秋節",
    '2026-06-30' => "端午節",
    '2026-10-07' => "中秋節",
    '2024-11-22'=>'小雪'
];

$holiday=[
    '01-01'=> "元旦"
];

    ?>
 <div class='nav'>
    <table style="width:100%">
        <tr>
            <td style='text-align:left'>
                <a href="calendar.php?year=<?php echo $year - 1; ?>">前年</a>
                <a href="calendar.php?year=<?php echo $prevyear; ?>&month=<?php echo $prevmonth; ?>">上一個月</a>
            </td>
            <td>
                <?php echo "{$month}月"; ?>
                <?php echo "{$year}年"; ?>
            </td>
            <td style='text-align:right'>
                <a href="calendar.php?year=<?php echo $nextyear; ?>&month=<?php echo $nextmonth; ?>">下一個月</a>
                <a href="calendar.php?year=<?php echo $year + 1; ?>">明年</a>
            </td>
        </tr>
    </table>
</div>
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
// 使用陣列來增加日期的判斷
        if(isset($spDate[date("Y-m-d",$theDayTime)])){
            echo "<br>{$spDate[date("Y-m-d",$theDayTime)]}";
        }
        
        if(isset($holidays[date("m-d",$theDayTime)])){
            echo "<br>{$holidays[date("m-d",$theDayTime)]}";
        }

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