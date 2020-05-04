<?php
   
require_once 'Connection.php';
header('Content-Type: text/html; charset=utf-8');
$link = mysqli_connect($host, $user, $password, $database) 
    or die("ERROR!!!! " . mysqli_error($link)); 

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Добавлення в таблицю працівники
$prazivnyky_insert1 = (int)$_GET['insert1'];
$prazivnyky_insert2 = (int)$_GET['insert2'];
$prazivnyky_insert3 = (int)$_GET['insert3'];
$prazivnyky_insert4 = mysql_real_escape_string($_GET['insert4']);


    if (isset($_GET['button'])) {
        $sql = "INSERT INTO robitnyk  (id_robitnyka, id_posady,id_apteky,pip)
                VALUES ('$prazivnyky_insert1', '$prazivnyky_insert2', '$prazivnyky_insert3','$prazivnyky_insert4')";
       echo '<body style="background:url(1фон.jpg)">';
    
    if ($link->query($sql) === TRUE) {
        echo '<h2 style="color: white; font-family: cursive; text-align: center; margin: 15%" >Новий запис створено успішно!</h2>';
        }else{
        echo "Error: " . $sql . "<br>" . $link->error;
        }  
    }

//Редагування таблиці працівники
 $prazivnyky_insert6 = (int)$_GET['insert6'];
 $prazivnyky_insert7 = (int)($_GET['insert7']);
 $prazivnyky_insert8 = (int)($_GET['insert8']);
 $prazivnyky_insert9 = mysql_real_escape_string($_GET['insert9']);
 

    if (isset($_GET['editing'])) {
        $sql = "UPDATE robitnyk 
                SET id_posady='$prazivnyky_insert7',id_apteky='$prazivnyky_insert8', pip='$prazivnyky_insert9'
                WHERE  id_robitnyka  = '$prazivnyky_insert6'";
        echo '<body style="background:url(1фон.jpg)">';
 
    if ($link->query($sql) === TRUE) {
        echo '<h2 style="color: white; font-family: cursive; text-align: center; margin: 15%" >Редагування виконано успішно!</h2>';
     }else{
        echo "Error: " . $sql . "<br>" . $link->error;
        }
    }

 //Видалення з таблиці працівники
 $prazivnyky_insert5 = (int)$_GET['insert5'];

    if (isset($_GET['delbutt'])) {
        $sql = "DELETE FROM apteka.robitnyk 
                WHERE robitnyk.id_robitnyka = '$prazivnyky_insert5'";
    echo '<body style="background:url(1фон.jpg)">';
    
    if ($link->query($sql) === TRUE) {
        echo '<h2 style="color: white; font-family: cursive; text-align: center; margin: 15%" >Видалення за заданим ID виконано успішно!</h2>';
        }else{
        echo "Error: " . $sql . "<br>" . $link->error;
        }
    }

//Виведення таблиці працівники   
    if (isset($_GET['button0'])) {
        $query ="SELECT * FROM robitnyk";
        $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
        if($result)
        {
            $rows = mysqli_num_rows($result); 
            echo '<body style="background:url(1фон.jpg)">';
            echo "<table border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
            <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
            <th >ID робітника</th>
            <th>ID посади</th>
            <th>ID аптеки</th>
			<th>ПІП</th>
            </tr>";
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                $row = mysqli_fetch_row($result);
                echo "<tr>";
                    for ($j = 0 ; $j < 4 ; ++$j) echo "<td>$row[$j]</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        }
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Добавлення в таблицю товари
$tovary_insert10 = (int)$_GET['insert10'];
$tovary_insert11 = (int)$_GET['insert11'];
$tovary_insert12 = mysql_real_escape_string($_GET['insert12']);
$tovary_insert13 = (int)$_GET['insert13'];
$tovary_insert14 = (int)$_GET['insert14'];
$tovary_insert15 = (int)$_GET['insert15'];
$tovary_insert16 = (int)$_GET['insert16'];

    if (isset($_GET['tv'])) {
        $sql = "INSERT INTO tovary (id_tovaru, id_apteky, nazva, kilkist, zina, id_typu, id_pryznachennya_l_r) 
                VALUES ('$tovary_insert10','$tovary_insert11','$tovary_insert12','$tovary_insert13','$tovary_insert14','$tovary_insert15','$tovary_insert16')";
       echo '<body style="background:url(1фон.jpg)">';
    
    if ($link->query($sql) === TRUE) {
        echo '<h2 style="color: white; font-family: cursive; text-align: center; margin: 15%" >Новий запис створено успішно!</h2>';
        }else{
        echo "Error: " . $sql . "<br>" . $link->error;
        }
    }

 //Видалення з таблиці товари
 $tovary_insert18 = (int)$_GET['insert18'];

    if (isset($_GET['tv1'])) {
        $sql = "DELETE FROM tovary     
                WHERE id_tovaru = '$tovary_insert18'";
    echo '<body style="background:url(1фон.jpg)">';
    
    if ($link->query($sql) === TRUE) {
        echo '<h2 style="color: white; font-family: cursive; text-align: center; margin: 15%" >Видалення за заданим ID виконано успішно!</h2>';
        }else{
        echo "Error: " . $sql . "<br>" . $link->error;
        }
    }

    //Пререгляд таблиці товари
if (isset($_GET['button1'])) {
    $query ="SELECT * FROM tovary";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result); 
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr   width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th >ID товару</th>
        <th>ID аптеки</th>
        <th>Назва</th>
        <th>Кількість</th>
        <th>Ціна</th>
        <th>ID типу</th>
        <th>ID призначення</th>
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 7 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Запит на вибірку з використанням between….and
$test = (double)$_GET['begin1'];
$test1 = (double)$_GET['end1'];

if (isset($_GET['button2'])) {
    $query ="SELECT nazva,kilkist,zina    
            FROM tovary  
            WHERE zina  BETWEEN '$test' and '$test1'";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result); 
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr  width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>Назва</th>
        <th>Кількість</th>
		<th>Ціна</th>
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Запит на вибірку з використанням in
$test2 = (double)$_GET['begin2'];
$test3 = (double)$_GET['end2'];

if (isset($_GET['button3'])) {
    $query ="SELECT *
            FROM postavka 
            WHERE id_postachalnyka  IN ('$test2','$test3')";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result); 
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>ID поставки</th>
		<th>ID постачальника</th>
		<th>ID аптеки</th>
		<th>Назва</th>
		<th>Кількість</th>
        <th>Дата поствки</th>
        <th>Вартість поставки</th>
      
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 7 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Запит на вибірку з використанням like
$test4 = mysql_real_escape_string($_GET['begin3']);

if (isset($_GET['button4'])) {
    $query ="SELECT * 
            FROM tovary
            WHERE nazva LIKE '$test4%'";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result);
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>ID товару</th>
        <th>ID аптеки</th>
        <th>Назва</th>
		<th>Кількість</th>
		<th>Ціна</th>
		<th>ID типу</th>
		<th>ID призначення</th>
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 7 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Запит на вибірку з двома умовами через “and”
$test5 = mysql_real_escape_string($_GET['begin4']);
$test6 = mysql_real_escape_string($_GET['begin5']);

if (isset($_GET['button5'])) {
    $query ="SELECT * 
            FROM tovary
            WHERE id_typu IN ('$test5') AND id_pryznachennya_l_r IN  ('$test6')";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result);
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>ID товару</th>
        <th>ID аптеки</th>
        <th>Назва</th>
		<th>Кількість</th>
		<th>Ціна</th>
		<th>ID типу</th>
		<th>ID призначення</th>
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 7 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Запит на вибірку з двома умовами через “or”
$test7 = mysql_real_escape_string($_GET['begin6']);
$test8 = (double)$_GET['begin7'];

if (isset($_GET['button6'])) {
    $query ="SELECT * 
            FROM tovary
            WHERE nazva LIKE  '$test7%' OR kilkist ='$test8'";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result); 
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>ID товару</th>
        <th>ID аптеки</th>
        <th>Назва</th>
		<th>Кількість</th>
		<th>Ціна</th>
		<th>ID типу</th>
		<th>ID призначення</th>
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 7 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
     
        mysqli_free_result($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Запит на вибірку з використанням DISTINCT
if (isset($_GET['button7'])) {
    $query ="SELECT DISTINCT zina FROM tovary";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result); 
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>Ціна</th>
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 1 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//Запит з функції max
if (isset($_GET['button8'])) {
    $query ="SELECT MAX(zina) FROM  tovary";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result); 
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>Максимальна ціна товару</th>
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 1 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//Запит з функцією avg
if (isset($_GET['button9'])) {
    $query ="SELECT AVG(zina) FROM  tovary";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result); 
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>Середня ціна усіх товарів</th>
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 1 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Запит з функцією count
if (isset($_GET['button10'])) {
    $query ="SELECT count(*) FROM postachalnyk";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result); 
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>Кількість постачальників</th>
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 1 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
         
        mysqli_free_result($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Запит з використанням INNER JOIN
if (isset($_GET['button11'])) {
    $query ="SELECT robitnyk.PIP, posada.name_posady
            FROM robitnyk
            INNER JOIN posada ON robitnyk.id_posady = posada.id_posady";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result);
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>ПІП</th>
        <th>Назва посади</th>
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 2 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Запит на вибірку з використанням агрегатної функції і умовою на вибірку поля
if (isset($_GET['button12'])) {
    $query ="SELECT MAX( kilkist  ) , nazva
            FROM postavka
            GROUP BY nazva";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result);
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>MAX(кількість поставки)</th>
        <th>Назва товару</th>
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 2 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Запит на вибірку з використанням агрегатної функції і виведенням ще декількох полів
if (isset($_GET['button13'])) {
    $query ="SELECT MAX(kilkist ) , nazva,vartist_postavky
            FROM postavka
            GROUP BY nazva,vartist_postavky";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result); 
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>MAX(кількість поставки)</th>
        <th>Назва товару</th>
        <th>Вартість поставки</th>
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Запит з використанням INNER JOIN і умовою LIKE
$test9 = mysql_real_escape_string($_GET['begin9']);
if (isset($_GET['button14'])) {
    $query ="SELECT robitnyk.PIP, posada.name_posady
            FROM robitnyk
            INNER JOIN posada ON robitnyk.id_posady = posada.id_posady
            WHERE posada.name_posady LIKE  '$test9%'";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result);
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table  border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>ПІП</th>
        <th>Назва посади</th>
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 2 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Запит з використанням підзапита з використанням (=, <,>)
if (isset($_GET['button15'])) {
    $query ="SELECT MAX(zina) 
            FROM tovary  
            WHERE zina < (SELECT MAX(zina)   
                            FROM tovary )";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result);
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table  border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>Найбальша ціна 2 товару</th>
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 1 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Запит з використанням підзапита з використанням оператора EXIST
$test10 = mysql_real_escape_string($_GET['begin10']);
if (isset($_GET['button16'])) {
    $query ="SELECT DISTINCT firma
            FROM postachalnyk 
            WHERE EXISTS (SELECT firma
                          FROM postachalnyk 
                          WHERE firma LIKE ('$test10%'))";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result);
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table  border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>Назва фірми</th>
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 1 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Запит з використанням підзапита з використанням IN
$test11 = mysql_real_escape_string($_GET['begin11']);
if (isset($_GET['button17'])) {
    $query ="SELECT *
            FROM tovary
            WHERE nazva  IN (SELECT nazva 
                          FROM tovary
                          WHERE nazva  LIKE ('$test11%'))";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result);
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table  border=\"2\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
         <th>ID товару</th>
        <th>ID аптеки</th>
        <th>Назва</th>
		<th>Кількість</th>
		<th>Ціна</th>
		<th>ID типу</th>
		<th>ID призначення</th>
        </tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 7 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_GET['button33'])) {
    $query ="SELECT * FROM apteka";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result); 
        
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table  border=\"2\" width=\"90%\" align=\"center\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
         <th>ID аптеки</th>
        <th>адреса</th>
        <th>Телефон</th>
		</tr>";        
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
     
        mysqli_free_result($result);
    }
}

if (isset($_GET['button33'])) {
    $query ="SELECT * FROM robitnyk";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result); 
        
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table  border=\"2\" align=\"center\" width=\"90%\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>ID робітника</th>
        <th>ID посади</th>
		<th>ID аптеки</th>
		<th>ПІП</th>
		</tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 4 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}
if (isset($_GET['button33'])) {
    $query ="SELECT * FROM posada";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result); 
        
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table  border=\"2\" align=\"center\" width=\"90%\"  bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>ID посади</th>
        <th>Назва посади</th>
		<th>Заробітна плата</th>
        
        </tr>";        
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
    
        mysqli_free_result($result);
    }
}
if (isset($_GET['button33'])) {
    $query ="SELECT * FROM postavka";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result);
        
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table  border=\"2\" align=\"center\" width=\"90%\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>ID поставки</th>
        <th>ID постачальника</th>
		<th>ID аптеки</th>
		<th>Назва</th>
		<th>Кількість</th>
        <th>Дата</th>
        <th>Вартість</th>
        </tr>";       
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 7 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}
if (isset($_GET['button33'])) {
    $query ="SELECT * FROM postachalnyk";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result);
        
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table  border=\"2\" align=\"center\" width=\"90%\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>ID постачальника</th>
        <th>ПІП</th>
        <th>Фірма</th>
        <th>Адреса</th>
		<th>Телефон</th>
		</tr>";        
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 5 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
    
        mysqli_free_result($result);
    }
}
if (isset($_GET['button33'])) {
    $query ="SELECT * FROM prodazh";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result);
        
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table  border=\"2\" align=\"center\" width=\"90%\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>ID продажу</th>
        <th>ID робітника</th>
		<th>ID товару</th>
		<th>ID аптеки</th>
		<th>Кількість</th>
		<th> Ціна</th>
		<th> Дата</th>
		
        </tr>";        
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 7 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}

if (isset($_GET['button33'])) {
    $query ="SELECT * FROM tovary";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result);
        
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table  border=\"2\" align=\"center\" width=\"90%\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>ID товару</th>
		<th>ID аптеки</th>
        <th>Назва</th>
		<th>Кількість</th>
		<th>Ціна</th>
		<th>ID типу</th>
		<th>ID призначення</th>
        </tr>";        
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 7 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
		
		if (isset($_GET['button33'])) {
    $query ="SELECT * FROM typ_tovaru";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result);
        
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table  border=\"2\" align=\"center\" width=\"90%\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>ID типу</th>
        <th>Тип</th>
		
        </tr>";        
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 2 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}

if (isset($_GET['button33'])) {
    $query ="SELECT * FROM pryznachennya";
    $result = mysqli_query($link, $query) or die("ERROR!!!! " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result);
        
        echo '<body style="background:url(1фон.jpg)">';
        echo "<table  border=\"2\" align=\"center\" width=\"90%\" bgcolor=\"rgba(221, 160, 221, 0.525)\" style=\"font-family: 'Manuale', cursive; color: white;\">
        <tr width=\"center\" height=\"50px\" bgcolor=\"#40E0D0\">
        <th>ID призначення</th>
        <th>Призначення</th>
		
        </tr>";        
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 2 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result($result);
    }
}

        echo "</table>";
        echo '<style> 
        .form-inner input,
        .form-inner textarea {
          display: block;
          width: 50%;
          margin-left : 300px;
          margin-right :100px;
          padding: 0px 10px;
          margin-bottom: 20px;
          background: #DDA0DD;
          line-height: 20px;
          border-width: 0;
          border-radius: 20px;
          font-family: "Roboto", sans-serif;
        }
        .form-inner input[type="submit"] {
          margin-top: 30px;
          
          background: #40E0D0;
          color: white;
          font-size: 18px;
        }
        </style>';
        echo "<div class=\"form-inner\">";
        echo "<input type=\"submit\" onClick=\"parent.location='index.html'\" value='Повернутися на попередню сторінку'>";
        echo"</div>";
    
        mysqli_free_result($result);
    }
}
mysqli_close($link);
?>