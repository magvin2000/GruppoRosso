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
    $sql = "SELECT * FROM " .$tabella ;
    $stmt1 = $db->prepare($sql);
    $stmt1->execute();
   
    while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
    {
        $sql = "SHOW COLUMNS FROM " . $tabella;
        $stmt = $db->prepare($sql);
        $stmt->execute();
        echo "<tr>";
        $j=0; $i=0;
        while($field = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            
            if($i==2)
            {
                $campo=$row[$field['Field']];
                echo "<td onclick='sorting($i);'>€" . $campo . "</td>";
            }
            else if($i==1 && $tabella=="carichi_rimini")
            {
                $campo=$row[$field['Field']];
                echo "<td onclick='sorting($i);'>" . $campo . "</td>";
            }
            else if($i==3 && $tabella=="carichi_rimini")
            {
                $campo=$row[$field['Field']];
                echo "<td onclick='sorting($i);'>" . substr($campo,6,2) . "/" . substr($campo,4,2) . "/" . substr($campo,0,4) . "</td>";
            }
            else {
                              $campo=$row[$field['Field']];
            echo "<td onclick='sorting($i);'>" . $campo . "</td>";
            }

            $i++;
            $j++;
        }
        echo "</tr>";
        
    }
       
        //echo '</table>';
   /* $tot_pagine = ceil($j/$perpage);
    $pagina_corrente = $page;
    $primo = ($pagina_corrente-1)*$perpage;
    $sql = 'SELECT * FROM utenti ORDER BY id DESC LIMIT '.$primo.','.$perpage.' ';*/

    /*$out.='<tr><td colspan="7"><nav><ul class="pagination">';
    for($i=1; $i<=$tot_pagine; $i++)
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
        $out .='<li><a href="?page='.$i.'">'.$i.'</a></li>';
            $sql = "SELECT * FROM giacenze_milano ";
            $stmt = $db->prepare($sql);  
            $stmt->execute();
        
        }
    $out .= "</ul></nav></td></tr>";
    $out.='</table>';
    return($out);*/
    //}
    #2
?>
