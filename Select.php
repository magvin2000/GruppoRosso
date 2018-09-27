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
    #1
    if($tabella == 'giacenze_milano')
    {
        if((isset($_GET['Ricerca'])) && ($_GET['Ricerca'] == 1 && isset($_GET['Valore']) && $_GET['Valore'] != ''))
        {
            $valore = $_GET['Valore'];
            $sql = "SELECT * FROM giacenze_milano WHERE Descrizione LIKE '%'.$valore.'%' OR Quantita LIKE '%'.$valore.'%' OR Prezzo LIKE '%'.$valore.'%' ";
            $stmt = $db->prepare($sql);  
            $stmt->execute();   
        }
        else
        {
            $sql = "SELECT * FROM giacenze_milano ";
            $stmt = $db->prepare($sql);  
            $stmt->execute();
        
        }
    }
    #2
    if($tabella == 'carichi_rimini')
    {
        if((isset($_GET['Ricerca'])) && ($_GET['Ricerca'] == 1 && isset($_GET['Valore']) && $_GET['Valore'] != ''))
        {
            $valore = $_GET['Valore'];
            $sql = "SELECT * FROM carichi_rimini WHERE Carico Scarico like '%$valore%' OR Descrizione like '%$valore%' OR Prezzo like '%$valore%' OR Datas like '%$valore%";
            $stmt = $db->prepare($sql);  
            $stmt->execute();   
        }
        else
        {
            $sql = "SELECT * FROM carichi_rimini ";
            $stmt = $db->prepare($sql);  
            $stmt->execute();   
        }
    }
    #3
    if($tabella == 'maggior_costo')
    {
        if((isset($_GET['Ricerca'])) && ($_GET['Ricerca'] == 1 && isset($_GET['Valore']) && $_GET['Valore'] != ''))
        {
            $valore = $_GET['Valore'];
            $sql = "SELECT * FROM maggior_costo WHERE Magazzino like '%$valore%' OR Descrizione  like '%$valore%' OR Prezzo like '%$valore%' OR Localita like '%$valore%' ";
            $stmt = $db->prepare($sql);  
            $stmt->execute();   
        }
        else
        {
            $sql = "SELECT * FROM maggior_costo ";
            $stmt = $db->prepare($sql);  
            $stmt->execute();   
        }
    }
?>