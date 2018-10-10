<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="RegisterContainer">
            <h1>Registrati</h1>
            <form action="Confirm.php" method="post">
                <table>
                    <tr>
                        <td>Nome<obli>*</obli></td>
                        <td><input type="text" name="nome"></td>
                    </tr>
                    <tr>
                        <td>Cognome<obli>*</obli></td>
                        <td><input type="text" name="cognome"></td>
                    </tr>
                    <tr>
                        <td>Data Di Nascita<obli>*</obli></td>
                        <td><input type="date" name="dataNascita"></td>
                    </tr>
                    <tr>
                        <td>No. Civico<obli>*</obli></td>
                        <td><input type="number" name="noCivico" min="0"></td>
                    </tr>
                    <tr>
                        <td>Città<obli>*</obli></td>
                        <td><input type="text" name="citta"></td>
                    </tr>
                    <tr>
                        <td>NAP<obli>*</obli></td>
                        <td><input type="number" name="nap" min="0"></td>
                    </tr>
                    <tr>
                        <td>No. Telefono<obli>*</obli></td>
                        <td><input type="text" name="noTelefono"></td>
                    </tr>
                    <tr>
                        <td>E-mail<obli>*</obli></td>
                        <td><input type="text" name="email"></td>
                    </tr>
                    <tr>
                        <td>Genere (sesso)<obli>*</obli></td>
                        <td>
                            <input type="radio" name="gender" value="M">M
                            <input type="radio" name="gender" value="F">F
                        </td>
                    </tr>
                    <tr>
                        <td>Hobby</td>
                        <td><input type="text" name="hobby"></td>
                    </tr>
                    <tr>
                        <td>Professione</td>
                        <td><input type="text" name="professione"></td>
                    </tr>
                    <tr>
                        <td><button name="cancella" type="reset">Cancella</button></td>
                        <td><button name="avanti" type="submit">Avanti</button></td>
                    </tr>
                </table>
            </form>
        </div>
        <script>

            var nome;
            var cognome;
            var dataNascita;
            var noCivico;
            var citta;
            var nap;
            var noTelefono;
            var email;
            var genere;
            var hobby;
            var professione;

            $('input[name=nome]').keyup(function(event){
                nome = $('input[name=nome]').val();
                console.log(nome);
            });

            $('input[name=cognome]').keyup(function(event){
                cognome = $('input[name=cognome]').val();
                console.log(cognome);
            });

        </script>
    </body>
</html>