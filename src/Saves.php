<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Saves</title>
        <meta name="author" content="Jari Naeser">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="./style.css">

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- bulma CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

        <!-- Bootstrap -->

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    </head>

    <style>

        h1{
            padding-top: 15px;
            text-align: center;
            text-transform: uppercase;
            font-family: Helvetica;
            font-size: 40px;
        }

        hr{
            /* For all browsers */
            color: #f43838;
            border-color: #f43838;
            background-color: #f43838;
        }

        button{
            font-size: 20px;
            margin-bottom: 15px;
        }

        table{

        }

        td{
            overflow: hidden;
            padding-left: 10px;
            padding-right: 10px;
        }

    </style>

    <body class="col-md-12 col-centered">
        <h1>Registrazioni effettuate oggi</h1><p id="date"></p><hr><br>

        <?php
            //Constants
            define(NOME, htmlspecialchars($_POST['nome']));
            define(COGNOME, htmlspecialchars($_POST['cognome']));
            define(DATA_NASCITA, htmlspecialchars($_POST['dataNascita']));
            define(NO_CIVICO, htmlspecialchars($_POST['noCivico']));
            define(CITTA, htmlspecialchars($_POST['citta']));
            define(NAP, htmlspecialchars($_POST['nap']));
            define(NO_TELEFONO, htmlspecialchars($_POST['noTelefono']));
            define(EMAIL, htmlspecialchars($_POST['email']));
            define(GENERE, htmlspecialchars($_POST['genere']));
            define(HOBBY, htmlspecialchars($_POST['hobby']));
            define(PROFESSIONE, htmlspecialchars($_POST['professione']));
            define(REG_TUTTE, './Registrazioni/Registrazioni_tutte.csv');
            define(REG_OGGI, './Registrazioni/Registrazione_' . date('Y-m-d') . ".csv");
            define(SEPARATOR, ';');

            //Variables
            $valStatus = array_fill(0,9,false);

            if(isEverythingValidated()){
                saver();
                reader();
                addButton();
            }

            //Methods

            function saver(){

                if(!file_exists('Registrazioni')){
                    mkdir('Registrazioni', 0777, true);
                }

                if(!file_exists(REG_TUTTE)){
                    $fileAll = fopen(REG_TUTTE, "a") or die("Unable to open " . REG_TUTTE ."!");
                    fwrite($fileAll, initializeCSV());
                }

                if(!file_exists(REG_OGGI)){
                    $fileToday = fopen(REG_OGGI, "a") or die("Unable to open " . REG_OGGI . "!");
                    fwrite($fileToday, initializeCSV());
                }

                $fileAll = fopen(REG_TUTTE, "a") or die("Unable to open " . REG_TUTTE ."!");
                $fileToday = fopen(REG_OGGI, "a") or die("Unable to open " . REG_OGGI . "!");

                if(strlen(NOME) > 0){
                    fwrite($fileAll, addToCsv());
                    fwrite($fileToday, addToCsv());
                }

                fclose($fileAll);
                fclose($fileToday);

            }



            function reader(){

                $table = "<div style='overflow-x:auto;'><table><tr><td>Nome</td><td>Cognome</td><td>Data di Nascita</td>
                          <td>Numero Civico</td><td>Città</td><td>NAP</td><td>Numero di Telefono</td><td>E-Mail</td>
                          <td>Genere</td><td>Hobby</td><td>Professione</td></tr>";

                $file = fopen(REG_OGGI, "r");

                if(count(fgetcsv($file)) > 0){
                    while (($row = fgetcsv($file, 1000, SEPARATOR)) !== FALSE) {
                        if(count($row) == 11){
                            $table .= "<tr>";
                            for($i = 0; $i < 11; $i++){
                                $table .= "<td>" . $row[$i] . "</td>";
                            }
                            $table .= "</tr>";
                        }
                    }
                    fclose($file);
                }

                $table .= "</table></div>";

                echo $table;
            }

            function addButton(){
                echo "<br><br><a href='Welcome.html'>
                                <button class='col-md-3' style='border-radius: 5px;'>
                                    Torna alla Home
                                </button>
                              </a>";
            }

            function initializeCSV(){
                return "Nome" . SEPARATOR . "Cognome" . SEPARATOR . "DataNascita" . SEPARATOR . "NumeroCivico"
                    . SEPARATOR . "Citta" . SEPARATOR . "Nap" . SEPARATOR . "NumeroTelefono" . SEPARATOR
                    . "EMail" . SEPARATOR . "Genere" . SEPARATOR . "Hobby" . SEPARATOR . "Professione" . "\n";

            }

            function addToCsv(){
                return NOME . SEPARATOR . COGNOME . SEPARATOR . DATA_NASCITA . SEPARATOR . NO_CIVICO . SEPARATOR .
                    CITTA . SEPARATOR . NAP . SEPARATOR . NO_TELEFONO . SEPARATOR . EMAIL . SEPARATOR . GENERE .
                    SEPARATOR . HOBBY . SEPARATOR . PROFESSIONE . "\n";
            }

            function isEverythingValidated(){
                if(isset($valStatus)){
                    for($i = 0; $i < sizeof($valStatus); $i++){
                        if(!$valStatus[$i]){
                            return false;
                        }
                    }
                }
                return true;
            }

            //Validators

            function valNome(){
                if(!isNullOrWhiteSpace(NOME)){
                    if(strlen(NOME) > 0){
                        if(preg_match("/([A-Za-zöäüÖÄÜàèìòùÀÈÌÒÙ -])/", NOME)){
                            $valStatus[0] = true;
                            return true;
                        }
                    }
                }
                $valStatus[0] = false;
                return false;
            }

            function valCognome(){
                if(!isNullOrWhiteSpace(COGNOME)) {
                    if (strlen(COGNOME)) {
                        if (preg_match("/([A-Za-zöäüÖÄÜàèìòùÀÈÌÒÙ -])/", COGNOME)) {
                            $valStatus[1] = true;
                            return true;
                        }
                    }
                }
                $valStatus[1] = false;
                return false;
            }

            function valDataNascita(){
                if(strlen(DATA_NASCITA) == 10 && preg_match("/([0-9-])/", DATA_NASCITA)){
                    $today = strtotime(date("Y") . "-" . date("m") . "-" . date("d"));
                    if(strtotime(DATA_NASCITA) <= $today){
                        $valStatus[2] = true;
                        return true;
                    }
                }
                $valStatus[2] = false;
                return false;
            }

            function valNoCivico(){
                if(!isNullOrWhiteSpace(NO_CIVICO)) {
                    if (strlen(NO_CIVICO) > 0 && strlen(NO_CIVICO) < 6) {
                        if (preg_match("/([A-Za-z0-9])/", NO_CIVICO)) {
                            if(preg_match("/([0-9])/", substr(NO_CIVICO, 0, strlen(NO_CIVICO)-2))){
                                $valStatus[3] = true;
                                return true;
                            }
                        }
                    }
                }
                $valStatus[3] = false;
                return false;
            }

            function valCitta(){
                if(!isNullOrWhiteSpace(CITTA)) {
                    if (strlen(CITTA) > 0 && strlen(CITTA) < 31) {
                        if (preg_match("/([A-Za-zöäüÖÄÜàèìòùÀÈÌÒÙ -])/", CITTA)) {
                            $valStatus[4] = true;
                            return true;
                        }
                    }
                }
                $valStatus[4] = false;
                return false;
            }

            function valNap(){
                if(strlen(NAP) == 4 || strlen(NAP) == 5){
                    if(preg_match("/([0-9])/",NAP)){
                        $valStatus[5] = true;
                        return true;
                    }
                }
                $valStatus[5] = false;
                return false;
            }

            function valNoTelefono(){
                if(!isNullOrWhiteSpace(NO_TELEFONO)) {
                    if (strlen(trim(NO_TELEFONO, " ")) > 9 && strlen(trim(NO_TELEFONO, " ")) < 31) {
                        if (preg_match("/([0-9 +*#-])/", NO_TELEFONO)) {
                            $valStatus[6] = true;
                            return true;
                        }
                    }
                }
                $valStatus[6] = false;
                return false;
            }

            function valEMail(){
                if(preg_match('/([^;])/', EMAIL)){
                    if (filter_var(EMAIL, FILTER_VALIDATE_EMAIL)) {
                        $valStatus[7] = true;
                        return true;
                    }
                }
                $valStatus[7] = false;
                return false;
            }

            function valGenere(){
                if(GENERE == "M" || GENERE == "F"){
                    $valStatus[8] = true;
                    return true;
                }
                $valStatus[8] = false;
                return false;
            }

            function valHobby(){
                if(!isNullOrWhiteSpace(HOBBY)) {
                    if (strlen(HOBBY) > 0 && strlen(HOBBY) < 501) {
                        if (preg_match("/([A-Za-zöäüÖÄÜàèìòùÀÈÌÒÙ0-9 -.,:_])/", HOBBY)) {
                            return true;
                        }
                    }
                }
                return false;
            }

            function valProfessione(){
                if(!isNullOrWhiteSpace(PROFESSIONE)) {
                    if (strlen(PROFESSIONE) > 0 && strlen(PROFESSIONE) < 501) {
                        if (preg_match("/([A-Za-zöäüÖÄÜàèìòùÀÈÌÒÙ0-9 -.,:_])/", PROFESSIONE)) {
                            return true;
                        }
                    }
                }
                return false;
            }

            //Helper

            function isNullOrWhiteSpace($text){
                if(strlen($text.trim(" ")) == 0 || $text == null){
                    return false;
                }
                return true;
            }

        ?>
    </body>
    <script>
        //Writes actual date under the page title
        var today = new Date();
        var day = today.getDate();
        var month = today.getMonth() + 1;
        var year = today.getFullYear();
        $('#date').text(year + "-" + month + "-" + day);
        $('#date').css('color', 'gray');
    </script>
</html>