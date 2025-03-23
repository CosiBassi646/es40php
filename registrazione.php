<?php
    (include "./connessione.php");
?>
<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REGISTRAZIONE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center text-danger">PAGINA DI REGISTRAZION</h1>
    <div class="w-50 mx-auto my-auto">
        <form method="post" action="">
        <div class="mb-3">
                <label class="form-label">NOME</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
                <label class="form-label">COGNOME</label>
                <input type="text" class="form-control" id="cognome" name="cognome" required>
        </div>
        <div class="mb-3">
                <label class="form-label">USERNAME</label>
                <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">PASSWORD</label>
                <input type="password" class="form-control" id="passwd" name="passwd" required>
        </div>
        <div class="mb-3">
            <!--radio per scegliere il tipo di utente!-->
            <label for="exampleInputPassword1" class="form-label"><b>TIPO UTENTE:</b></label>
            <br>
            <input type="radio" id="pers" name="tipoUtente" value="pers" required>
            <label for="pers">PERSONA</label><br>

            <input type="radio" id="org" name="tipoUtente" value="org" required>
            <label for="org">ORGANIZZAZIONE</label><br>

            <input type="radio" id="admin" name="tipoUtente" value="admin" required>
            <label for="admin">ADMIN</label>
        </div>
            <button type="submit" class="btn btn-success">REGISTRATI</button>
        </form>

        <?php
            $username = $_POST['username'];
            $query = mysqli_query($conn,"SELECT * from utenti where utenti.username = '$username'");
            if(mysqli_num_rows($query) > 0){
                echo "USERNAME NON VALIDO";
            }else{
                $inserimento = mysqli_query($conn, "INSERT INTO utenti (nome, cognome, username, password, tipo) 
                VALUES ('". $_POST['nome'] ."', '". $_POST['cognome'] ."', '". $_POST['username'] ."', '". $_POST['passwd'] ."', '". $_POST['tipoUtente'] ."');");
            }
        ?>
                <p><a class="link-opacity-75-hover" href="./index.php">Torna Indietro</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>