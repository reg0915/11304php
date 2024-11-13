<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>








</head>
<body>
    <h1>資料庫連線</h1>
<?php
$dsn="mysql:host=localhost;charest=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');


$sql="select * from classes";

$rows=$pdo->query($sql) ->fetchALL(PDO::FETCH_ASSOC);


?>
<style>
table{
border-collapse:
width: 400px;
margin:auto

}
table tr:nth-child(1) td{
        background-color: #cc6;
        color:darkorange;
        text-shadow: 2px 2px 2px #fff;
}
table td{
        padding:5px 15px;
        text-align: center;
        border:1px solid #ccc;
    }






</style>
<table>
    <tr>
        <td>序號</td>
        <td>班級名稱</td>
        <td>班導師</td>
    </tr>
<?php


foreach($rows as $row){
    ?>
    <tr>
        <td><?=$row['id'];?></td>
        
        <td>
            
            <a href="class_detail.php?id=<?=$row['id'];?>">
                <?=$row['name'];?>
                
            </a>
            
        </td>
        <td><?=$row['tutor'];?></td>
    </tr>
</table>

<?php
}
?>

    echo $row['id']." ".$row['name']."-".$row['tutor']."<br>";
    



// echo "<pre>";
// print_r($rows);
// echo "</pre>";

?>


</body>
</html>