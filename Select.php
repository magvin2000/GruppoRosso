<?php
include("config.php");
    $tabella=$_GET['tabella'];
    $sql = "SHOW COLUMNS FROM ". $dbname . "." . $tabella;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    echo "<thead><tr>";
    $i=0;
    while($field = $stmt->fetch(PDO::FETCH_ASSOC))
    {        
        $campo=$field['Field'];
        echo "<th onclick='sorting($i);'>". $campo . "</th>";
        $i++;
    }
    echo "</tr></thead>";
    $sql = "SELECT * FROM " . $dbname . "."  . $tabella ;
    $stmt1 = $db->prepare($sql);
    $stmt1->execute();
    
    while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
    {
        $sql = "SHOW COLUMNS FROM " . $dbname . "."  . $tabella;
        $stmt = $db->prepare($sql);
        $stmt->execute();
        echo "<tr>";
        $i=0;
        while($field = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            if($i==0)
            {
                $id=$row[$field['Field']];
            }
            $campo=$row[$field['Field']];
            echo "<td onclick='sorting($i);'>" . $campo . "</td>";
            $i++;
        }
        echo "</tr>";
    }