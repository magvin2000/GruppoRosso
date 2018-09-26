<?php
session_start();
if(isset($_SESSION['Verifica']))
{
if(isset($_SESSION['IdUtente']) && isset($_SESSION['Password']))
{
    if ($_SESSION['Ruolo'] == 'Ospite')
        $ruolo = 'Ospite';
    else
        $ruolo = 'Amministratore';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script language="JavaScript" type="text/JavaScript" src="scripts/Sorter.js"></script>
    <script language="JavaScript" type="text/JavaScript" src="scripts/Research.js"></script>
    <script language="JavaScript" type="text/JavaScript" src="scripts/AJAX.js"></script> 
</head>
<body onload="selection('Prodotti');">
    <!-- navbar -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation" id="navigation"> 
        <div class="container-fluid">
            <div class="navbar-header">
                <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Menu.php"><h4>Menu Principale</h4></a></li>
    <li class="breadcrumb-item"><a href="TabellaMilano.php">Giacenza Milano</a></li>
  </ol>
<!--
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello George <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Settings</a></li>
              <li><a href="#">Logout</a></li>
            </ul>
          </li> -->
            </div>
            <div class="container">
            <ul class="nav navbar-form navbar-right">
                <div class="form-group has-feedback">
                    <div class="search-control">
                    <input type="search" id="research"  onkeyup='Ricerca("Prodotti");' name="q" placeholder="Cerca">
                    <button type='submit' style="margin: 5px" class='btn btn-primary' id="research"  onclick='RicercaFiltro("Prodotti");' ><span class='glyphicon glyphicon-search'></span></button>
                    <button type='submit' style="margin: 5px"  class='btn btn-primary'><span class='glyphicon glyphicon-arrow-left'></span></button> 
                </div>
                </div>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="align-right" id="mostra">                      
    <?php if($ruolo == 'Amministratore') {?>
    <?php } ?>
        <!-- form modale per Aggiungi-->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- contenuto form modale-->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <p id="titolo"></p>
                    </div>
                    <div class="modal-body">
                        <label for="Descrizione">Descrizione: </label> 
                        <input type="text" class="form-control" name="Descrizione" id="Descrizione" placeholder="Descrizione" required>
                        <br>
                        <label for="Prezzo">Prezzo:</label>
                        <input type="text" class="form-control" name="Prezzo" id="Prezzo" placeholder="Prezzo" required>
                        <br>
                        <label for="QuantitaDisponibile">Quantità:</label>
                        <input type="text" class="form-control" name="QuantitaDisponibile" id="QuantitaDisponibile" placeholder="Quantita Disponibile" required>
                        <label for="IdMagazzino">Magazzino:</label>
                        <select id="IdMagazzino">
                        <?php 
                            include("config.php");
                            $sql = "SELECT DescrizioneMagazzino, IdMagazzino FROM magazzino";
                            $stmt = $db->prepare($sql);
                            $stmt-> execute();         
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                ?>
                                <option value="<?php echo $row['IdMagazzino']?>"> <?php echo $row['DescrizioneMagazzino']?> </option> <?php
                            }                      
                    ?>  
                    </select>                     
                    </div>
                    <div class="modal-footer">
                        <br>
                        <br>
                        <p class="alert alert-danger" id="error" hidden></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <br>
        <p class="alert alert-info" id="info" hidden></p>
        <table class="table table-hover" id="id_table">
        </table>
    </div>
    <p id="prova" class="hidden"></p>
</body>
</html>
<?php }
else
{
    echo "<script language='JavaScript'>\n"; 
    echo "alert('Accesso negato: torna indietro');\n"; 
    echo"window.location.href = 'Login.php';";
    echo "</script>"; 
}?>