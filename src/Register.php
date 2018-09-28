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
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                            <input type="radio" name="gender" value="M">M
                            <input type="radio" name="gender" value="F">F
                        </form>
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
                    <td><button name="cancella">Cancella</button></td>
                    <td><button name="avanti">Avanti</button></td>
                </tr>
            </table>
        </div>

        <script>
            $(document).ready(function(){
                console.log("entered");
                $('button[name=cancella]').click(function(){
                    $('input[name=nome]').val('');
                    $('input[name=cognome]').val('');
                    $('input[name=dataNascita]').val('');
                    $('input[name=noCivico]').val('');
                    $('input[name=citta]').val('');
                    $('input[name=nap]').val('');
                    $('input[name=noTelefono]').val('');
                    $('input[name=email]').val('');
                    $('input[name=gender]').prop('checked', false);
                    $('input[name=hobby]').val('');
                    $('input[name=professione]').val('');
                });
            });
        </script>

        <?php
        /**
     * Created by PhpStorm.
     * User: jarinaser
     * Date: 23.09.18
     * Time: 11:42
     */
        ?>
    </body>
</html>