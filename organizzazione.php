<?php
    session_start();
    (include "./connessione.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pagina organizzazione</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center text-danger">BENTORNATO/A <?php echo $_SESSION['userName'];?></h1>
    <h4 class="text-center">elenco degli utenti registrati</h4>
    <h6 class="text-center">sei nella versione organizzatore</h6>
    <div class="w-50 mx-auto my-auto text-center">
        <table class="table table-bordered">
            <tr>
                <th>NOME</th>
                <TH>COGNOME</TH>
                <TH>USERNAME</TH>
                <TH>PASSWORD</TH>
                <TH>TIPO</TH>
            </tr>
        <?php
            $query = mysqli_query($conn,"SELECT * from utenti");
            while($row=mysqli_fetch_assoc($query)){
                echo '<tr>';
                echo '<td>'. $row['nome'] .'</td>';
                echo '<td>'. $row['cognome'] .'</td>';
                echo '<td>'. $row['username'] .'</td>';
                echo '<td>'. $row['password'] .'</td>';
                echo '<td>'. $row['tipo'] .'</td>';
                echo '</tr>';
            }
        ?>
        </table>
        <br>
        <p><a class="link-opacity-75-hover" href="./index.php">Torna Indietro</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>