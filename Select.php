<?php
include("config.php");
if(IsSet($_SESSION["id_utente"])&&IsSet($_SESSION["descrizione_ruolo"])){
    if($_SESSION["descrizione_ruolo"]=="utente standard") header("location: index.php");
    $tabella=$_GET['tabella'];
    $sql = "SHOW COLUMNS FROM " . $tabella;
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
    $sql = "SELECT * FROM " .$tabella ;
    $stmt1 = $db->prepare($sql);
    $stmt1->execute();
    
    while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
    {
        $sql = "SHOW COLUMNS FROM " . $tabella;
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
        echo "<p class='radio'>";
        echo "<td><input type='radio' name='btn_radio' id='rad' value=".$id." ></td>";
        echo "</p>";
        echo "</tr>";
    }
}
else header("location: index.php");