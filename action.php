<?php
    (include "./connessione.php");
    session_start();
    if (isset( $_SESSION['userName'])) {
        // se è già inizializzato
        } else {
            $_SESSION['userName'] = "";
    }
    if (isset( $_SESSION['password'])) {
        // se è già inizializzato
        } else {
            $_SESSION['password'] = "";
    }
?>
<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php
        $userName = $_POST['username'];
        $passwd = $_POST['passwd'];

        $query = mysqli_query($conn,"SELECT * from utenti
        where utenti.username = '$userName' and utenti.password ='$passwd'");
        
        if(mysqli_num_rows($query) > 0){
            $_SESSION['password'] = $passwd;
            $_SESSION['userName'] =  $userName;

            while($row = mysqli_fetch_assoc($query)){
                if($row['tipo'] == 'admin'){
                    header("location: ./admin.php");
                }
                if($row['tipo'] == 'organizzazione'){
                    header("location: ./organizzazione.php");
                }
                if($row['tipo'] == 'persona'){
                    header("location: ./persona.php");
                }
            }
        }else{
            echo "nessuna corrispondenza";
        }
        
    ?>
    <p><a class="link-opacity-75-hover" href="./index.php">Torna Indietro</a></p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>