<html>
    <head> 
        <title>Pontos de Parada - Star Wars</title>
        
        <!-- Última versão CSS compilada e minificada -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <!-- Tema opcional -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
        <!-- Última versão JavaScript compilada e minificada -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Css Global utilizado -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
    </head>
    
    <body>
        <!-- Formulário de Inserção da Distância -->
         <div class="form-group">
            <form action="index.php" method="post" class="form-inline mr-auto">
              <label for="MGLT">Insira a distancia MGLT:</label>
              <input class="form-control mr-sm-2" type="text" name="mglt"  placeholder="Insira a distancia" aria-label="Search">
              <button class="btn btn-unique btn-rounded btn-sm my-0" type="submit">Enviar</button>
            </form>
        </div>
    </body>
</html>

<?php 

if(!empty($_POST['mglt']))
{
    //Retorno com as naves e paradas efetuadas
    echo '<table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Nave</th>
                  <th scope="col">Modelo</th>
                  <th scope="col">Fabricante</th>
                  <th scope="col">Quantidade de Paradas</th>
                </tr>
              </thead>';
    require_once('class/swapi.php');
    $obj = new StarWarsApi();
    $obj->getsMglt($_POST['mglt']);
    echo "</tbody>
            </table>";
}

?>