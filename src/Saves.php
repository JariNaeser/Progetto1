<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Saves</title>
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
            text-align: center;
            text-transform: uppercase;
            font-family: Helvetica;
            font-size: 40px;
        }

        hr{
            /* For all browsers */
            color: #f43838;
            border-color: #f43838;
            background-color: #f43838;;
        }

    </style>

    <body>
        <h1 class="col-md-12">Registrazioni effettuate oggi</h1><hr><br>

        <!--

        - Mettere a posto che legge tutte le righe del csv e non solo una

        Provare con metodo:

        $file = fopen('file.csv', 'r');
        while (($line = fgetcsv($file)) !== FALSE) {
            //$line[0] = '1004000018' in first iteration
            print_r($line);
        }
        fclose($file);

        - Mettere a posto animazione fra registrazione e display data
        - Fare la tabella responsive
        - Mettere a posto il bootstrap della pagina php(questa).

        -->

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
            define(REG_TUTTE, 'Registrazioni_tutte.csv');
            define(REG_OGGI, 'Registrazione_' . date('Y-m-d') . ".csv");
            define(DIRECTORY, './Registrazioni');
            define(SEPARATOR, ';');

            //Variables
            $valStatus = array_fill(0,9,false);

            if(isEverythingValidated()){
                saver();
                reader();
            }

            //Methods

            function saver(){

                if(basename(__DIR__)  != 'Registrazione'){
                    if (!file_exists(DIRECTORY)) {
                        mkdir(DIRECTORY, 0777, true);
                    }
                    if(is_dir(DIRECTORY)) {
                        chdir(DIRECTORY);
                    }
                }

                $fileAll = fopen(REG_TUTTE, "a") or die("Unable to open " . REG_TUTTE ."!");
                $fileToday = fopen(REG_OGGI, "a") or die("Unable to open " . REG_OGGI . "!");

                fwrite($fileAll, addToCsv());
                fwrite($fileToday, addToCsv());
                fclose($fileAll);
                fclose($fileToday);

            }

            function reader(){

                $table = "<table class=\"col-md-12\"><tr><td>Nome</td><td>Cognome</td><td>Data di Nascita</td><td>Numero Civico</td>
                          <td>Città</td><td>NAP</td><td>Numero di Telefono</td><td>E-Mail</td><td>Genere</td>
                          <td>Hobby</td><td>Professione</td></tr>";

                $file = fopen(REG_OGGI, "r");
                $data = array(11);

                foreach (fgetcsv($file, 1000) as $row){
                    if(count(explode(SEPARATOR, $row)) == 11){
                        $table .= "<tr>";
                        $data = explode(SEPARATOR, $row);
                        for($i = 0; $i < 11; $i++){
                            $table .= "<td>" . $data[$i] . "</td>";
                        }
                        $table .= "</tr>";
                    }
                }

                $table .= "</table>";

                fclose($file);

                echo $table;
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
                            $valStatus[3] = true;
                            return true;
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
                    if (strlen(NO_TELEFONO) > 9 && strlen(NO_TELEFONO) < 31) {
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
</html>