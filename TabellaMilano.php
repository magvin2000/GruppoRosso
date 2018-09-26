<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Gruppo_Rosso/css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<script language="JavaScript" type="text/JavaScript" src="scripts/Sorter.js"></script>
    <script language="JavaScript" type="text/JavaScript" src="scripts/Research.js"></script> -->
    <script language="JavaScript" type="text/JavaScript" src="Gruppo_Rosso/scripts/AJAX.js"></script>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation" id="navigation"> 
        <div class="container-fluid">
            <div class="navbar-header">
                <li class="dropdown navbar-brand">
            <a class="dropdown-toggle" data-toggle="dropdown">Home > Giacenza Milano <b class="caret"></b></a>
            <ol class="dropdown-menu">
              <li><a href="TabellaMilano.php">Giacenza Milano</a></li>
              <li><a href="TabellaRimini.php">Carichi Rimini</a></li>
              <li><a href="MaggiorCosto.php">Maggior Costo</a></li>
            </ol>
          </li> 
            </div>
            <div class="container">
            <ul class="nav navbar-form navbar-right">
                <div class="form-group has-feedback">
                    <div class="search-control">
                    <input type="text" class="form-control" id="research"  onkeyup='Ricerca("Prodotti");' name="q" placeholder="Cerca...">
                    <button type='submit' style="margin: 5px" class='btn btn-primary' id="research"  onclick='RicercaFiltro("Prodotti");' ><span class='glyphicon glyphicon-search'></span></button>
                    <button type='submit' style="margin: 5px"  class='btn btn-primary' onclick='Redirect()'><span class='glyphicon glyphicon-arrow-left'></span></button> 
                </div>
                </div>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="align-right" id="mostra">                      
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