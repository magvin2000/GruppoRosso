<?php
    include("config.php");
    $tabella=$_GET['tabella']; 
    $sql = "SELECT COUNT(*) FROM ". $tabella;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $tot_records = $stmt->fetchColumn();
    $sql = "SHOW COLUMNS FROM ". $dbname . "." . $tabella;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    echo "<thead><tr>";
    $i=0;
    $perpage = 10;
    $page = 1;
    if(isset($_GET['page']))
    {
        $page = filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);
    }
    $tot_pagine = ceil($tot_records/$perpage);
    $pagina_corrente = $page;
    $primo = ($pagina_corrente-1)*$perpage;

    while($field = $stmt->fetch(PDO::FETCH_ASSOC))
    {        
        $campo=$field['Field'];
        echo "<th onclick='sorting($i);'>". $campo . "</th>";
        $i++;
    }
    echo "</tr></thead>";
    $sql = "SELECT * FROM ". $dbname . "." . $tabella . " LIMIT " . $primo . ',' . $perpage . ' ';
    $stmt1 = $db->prepare($sql);
    $stmt1->execute();
    if(isset($_GET['page']))
    {
        $page = filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);
    }
    while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
    {
        //$j++;
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
        echo '<tr><td colspan="7"><nav><ul class="pagination">';
        for($i=1; $i<=$tot_pagine; $i++)
    {
        echo '<li><a href="?Select.php?page='.$i.'">'.$i.'</a></li>';
    }
        echo "</ul></nav></td></tr>";
        echo '</table>';
   /* $tot_pagine = ceil($j/$perpage);
    $pagina_corrente = $page;
    $primo = ($pagina_corrente-1)*$perpage;
    $sql = 'SELECT * FROM utenti ORDER BY id DESC LIMIT '.$primo.','.$perpage.' ';*/

    /*$out.='<tr><td colspan="7"><nav><ul class="pagination">';
    for($i=1; $i<=$tot_pagine; $i++)
        {
        $out .='<li><a href="?page='.$i.'">'.$i.'</a></li>';
        }
    $out .= "</ul></nav></td></tr>";
    $out.='</table>';
    return($out);*/