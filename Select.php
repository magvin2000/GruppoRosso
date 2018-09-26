<?php
include("config.php");
/*if($tabella == 'giacenze milano') */
{
    $sql = "SELECT * FROM giacenze_milano";
    $stmt = $db->prepare($sql);  
    $stmt->execute();   
    echo "
        <thead>
        <tr>
        <th>Descrizione</th> 
        <th onclick='sorting(1);'>Quantità</th>
        </tr>
        </thead>";

        while($rows = $stmt->fetchAll(PDO::FETCH_ASSOC))
        {
            foreach($rows as $row)
            {
                $Descrizione = $row['descrizione'];
                $Quantita = $row['quantita'];
                echo "<tr>"; 
                echo "<td>". $Descrizione ."</td>";
                echo "<td onclick='sorting(1);'>" . $Quantita . "</td>";
                echo "</tr>";
            }
        }
}
/*if($tabella == 'carichi rimini') 
    {
        $sql = "SELECT IdRuoli, DescrizioneRuolo FROM ruoli";
        $stmt = $db->prepare($sql);  
        $stmt->execute();   
        echo "
            <thead>
            <tr>
            <th>IdRuoli</th> 
            <th onclick='sorting(1);'>Descrizione Ruolo</th>
            </tr>
            </thead>";

            while($rows = $stmt->fetchAll(PDO::FETCH_ASSOC))
            {
                foreach($rows as $row)
                {
                    $IdRuoli = $row['IdRuoli'];
                    $DescrizioneRuolo = $row['DescrizioneRuolo'];
                    echo "<tr>"; 
                    echo "<td>" . $IdRuoli . "</td>";
                    echo "<td onclick='sorting(1);'>" . $DescrizioneRuolo . "</td>";
                    echo "</tr>";
                }
            }

        
    }
    if($tabella == '1') 
    {
        $sql = "SELECT IdRuoli, DescrizioneRuolo FROM ruoli";
        $stmt = $db->prepare($sql);  
        $stmt->execute();   
        echo "
            <thead>
            <tr>
            <th>IdRuoli</th> 
            <th onclick='sorting(1);'>Descrizione Ruolo</th>
            </tr>
            </thead>";

            while($rows = $stmt->fetchAll(PDO::FETCH_ASSOC))
            {
                foreach($rows as $row)
                {
                    $IdRuoli = $row['IdRuoli'];
                    $DescrizioneRuolo = $row['DescrizioneRuolo'];
                    echo "<tr>"; 
                    echo "<td>" . $IdRuoli . "</td>";
                    echo "<td onclick='sorting(1);'>" . $DescrizioneRuolo . "</td>";
                    echo "</tr>";
                }
            }

    }*/