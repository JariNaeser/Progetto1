<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

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

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="./style.css">

    </head>
    <body>
        <div class="container col-sm-8 mx-auto">

            <h1 class="text-center">Registrati</h1><br>
            <form action="Confirm.php" method="post">

                <div class="d-md-flex">
                    <!-- Nome -->
                    <div class="col-md-6">
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-large" type="text" placeholder="Nome" name="nome">
                            <span class="icon is-medium is-left">
                                <i class="fas fa-user"></i>
                                <i><obli>*</obli></i>
                            </span>
                            <span class="icon is-medium is-right">
                                <toDo><i class="fas fa-times" id="indName"></i></toDo>
                            </span>
                        </div>
                    </div>

                    <br class="hide">

                    <!-- Cognome -->
                    <div class="col-md-6">
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-large" type="text" placeholder="Cognome" name="cognome">
                            <span class="icon is-medium is-left">
                                <i class="fas fa-user-tag"></i>
                                <i><obli>*</obli></i>
                            </span>
                            <span class="icon is-medium is-right">
                                <toDo><i class="fas fa-times" id="indSurname"></i></toDo>
                            </span>
                        </div>
                    </div>
                </div>

                <br>

                <div class="d-md-flex">

                    <!-- Data Nascita -->
                    <div class="col-md-6">
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-large" placeholder="Data Nascita" class="textbox-n" type="text"
                                   onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name="dataNascita">
                            <span class="icon is-medium is-left">
                                <i class="fas fa-birthday-cake"></i>
                                <i><obli>*</obli></i>
                            </span>
                            <span class="icon is-medium is-right">
                                <toDo><i class="fas fa-times" id="indDate"></i></toDo>
                            </span>
                        </div>
                    </div>

                    <br class="hide">

                    <!-- No. Civico -->
                    <div class="col-md-6">
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-large" type="text" placeholder="No. Civico" name="noCivico">
                            <span class="icon is-medium is-left">
                                <i class="fas fa-home"></i>
                                <i><obli>*</obli></i>
                            </span>
                            <span class="icon is-medium is-right">
                                <toDo><i class="fas fa-times" id="indNoCivico"></i></toDo>
                            </span>
                        </div>
                    </div>

                </div>

                <br>

                <div class="d-md-flex">

                    <!-- Città -->
                    <div class="col-md-6">
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-large" type="text" placeholder="Città" name="citta">
                            <span class="icon is-medium is-left">
                                <i class="fas fa-city"></i>
                                <i><obli>*</obli></i>
                            </span>
                            <span class="icon is-medium is-right">
                                <toDo><i class="fas fa-times" id="indCitta"></i></toDo>
                            </span>
                        </div>
                    </div>

                    <br class="hide">

                    <!-- Nap -->
                    <div class="col-md-6">
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-large" type="number" placeholder="Nap" min="1000" max="99999" name="nap">
                            <span class="icon is-medium is-left">
                                <i class="fas fa-vihara"></i>
                                <i><obli>*</obli></i>
                            </span>
                            <span class="icon is-medium is-right">
                                <toDo><i class="fas fa-times" id="indNap"></i></toDo>
                            </span>
                        </div>
                    </div>

                </div>

                <br>

                <div class="d-md-flex">

                    <!-- No. Telefono -->
                    <div class="col-md-6">
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-large" type="text" placeholder="No. Telefono">
                            <span class="icon is-medium is-left">
                                <i class="fas fa-mobile-alt"></i>
                                <i><obli>*</obli></i>
                            </span>
                            <span class="icon is-medium is-right">
                                <toDo><i class="fas fa-times"></i></toDo>
                            </span>
                        </div>
                    </div>

                    <br class="hide">

                    <!-- Email -->
                    <div class="col-md-6">
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-large" type="mail" placeholder="E-mail">
                            <span class="icon is-medium is-left">
                                <i class="fas fa-envelope"></i>
                                <i><obli>*</obli></i>
                            </span>
                            <span class="icon is-medium is-right">
                                <toDo><i class="fas fa-times"></i></toDo>
                            </span>
                        </div>
                    </div>

                </div>

                <br>

                <!-- Genere -->
                <div class="centerBlock">
                    <div class="control has-icons-left">
                        <div class="select is-large">
                            <select id="genere">
                                <option selected>Genere</option>
                                <option>M</option>
                                <option>F</option>
                            </select>
                        </div>
                        <span class="icon is-large is-left">
                            <i class="fas fa-transgender" id="indGenere"></i>
                            <i><obli>*</obli></i>
                        </span>
                    </div>
                </div>
                <br>


                <!-- Hobby -->
                <div class="col-md-12">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-large" type="text" placeholder="Hobby" name="hobby">
                        <span class="icon is-medium is-left">
                            <i class="fas fa-gamepad"></i>
                        </span>
                        <span class="icon is-medium is-right">
                            <toDo><i class="fas fa-times" id="indHobby"></i></toDo>
                        </span>
                    </div>
                </div>

                <br>

                <!-- Professione -->
                <div class="col-md-12">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-large" type="text" placeholder="Professione" name="professione">
                        <span class="icon is-medium is-left">
                            <i class="fas fa-user-md"></i>
                        </span>
                        <span class="icon is-medium is-right">
                            <toDo><i class="fas fa-times" id="indProfessione"></i></toDo>
                        </span>
                    </div>
                </div>

                <br>

                <div class="col-md-12 col-centered">
                    <button name="cancella" type="reset" class="col-md-3" id="buttonCancella">Cancella</button>
                    <button name="avanti" type="button" class="col-md-3" id="buttonAvanti">Avanti</button>
                </div>

            </form>
        </div>
        <script>

            /* ---------- Variables ---------- */

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
            var validated = [false,false,false,false,false,false,false,false,false];
            const FALSE_COLOR = '#f76a6a';
            const TRUE_COLOR = '#abdd92';

            /* ---------- Events handler functions ---------- */

            $('input[name=nome]').keyup(function(event){
                nome = $('input[name=nome]').val();
                if(valName(nome)){
                    $('#indName').removeClass('fa-times');
                    $('#indName').addClass('fa-check');
                    $('#indName').css('color', TRUE_COLOR);
                }else{
                    $('#indName').removeClass('fa-check');
                    $('#indName').addClass('fa-times');
                    $('#indName').css('color', FALSE_COLOR);
                }
            });

            $('input[name=cognome]').keyup(function(event){
                cognome = $('input[name=cognome]').val();
                if(valSurname(cognome)){
                    $('#indSurname').removeClass('fa-times');
                    $('#indSurname').addClass('fa-check');
                    $('#indSurname').css('color', TRUE_COLOR);
                }else{
                    $('#indSurname').removeClass('fa-check');
                    $('#indSurname').addClass('fa-times');
                    $('#indSurname').css('color', FALSE_COLOR);
                }
            });

            $('input[name=dataNascita]').blur(function(event){
                dataNascita = $('input[name=dataNascita]').val();
                if(valBirthday(dataNascita)){
                    $('#indDate').removeClass('fa-times');
                    $('#indDate').addClass('fa-check');
                    $('#indDate').css('color', TRUE_COLOR);
                }else{
                    $('#indDate').removeClass('fa-check');
                    $('#indDate').addClass('fa-times');
                    $('#indDate').css('color', FALSE_COLOR);
                }
            });

            $('input[name=noCivico]').keyup(function(event){
                noCivico = $('input[name=noCivico]').val();
                if(valNumeroCivico(noCivico)){
                    $('#indNoCivico').removeClass('fa-times');
                    $('#indNoCivico').addClass('fa-check');
                    $('#indNoCivico').css('color', TRUE_COLOR);
                }else{
                    $('#indNoCivico').removeClass('fa-check');
                    $('#indNoCivico').addClass('fa-times');
                    $('#indNoCivico').css('color', FALSE_COLOR);
                }
            });

            $('input[name=citta]').keyup(function(event){
                citta = $('input[name=citta]').val();
                if(valCitta(citta)){
                    $('#indCitta').removeClass('fa-times');
                    $('#indCitta').addClass('fa-check');
                    $('#indCitta').css('color', TRUE_COLOR);
                }else{
                    $('#indCitta').removeClass('fa-check');
                    $('#indCitta').addClass('fa-times');
                    $('#indCitta').css('color', FALSE_COLOR);
                }
            });

            $('input[name=nap]').keyup(function(event){
                nap = $('input[name=nap]').val();
                if(valNap(nap)){
                    $('#indNap').removeClass('fa-times');
                    $('#indNap').addClass('fa-check');
                    $('#indNap').css('color', TRUE_COLOR);
                }else{
                    $('#indNap').removeClass('fa-check');
                    $('#indNap').addClass('fa-times');
                    $('#indNap').css('color', FALSE_COLOR);
                }
            });

            $('input[name=noTelefono]').keyup(function(event){
                noTelefono = $('input[name=noTelefono]').val();
            });

            $('input[name=email]').keyup(function(event){
                email = $('input[name=email]').val();
            });

            $('#genere').blur(function(event){
                genere = $('#genere').val();
                if(valGenere(genere)){
                    $('#indGenere').css('color', TRUE_COLOR);
                }else{
                    $('#indGenere').css('color', FALSE_COLOR);
                }
            });

            $('input[name=hobby]').keyup(function(event){
                hobby = $('input[name=hobby]').val();
                if(valHobby(hobby)){
                    $('#indHobby').removeClass('fa-times');
                    $('#indHobby').addClass('fa-check');
                    $('#indHobby').css('color', TRUE_COLOR);
                }else{
                    $('#indHobby').removeClass('fa-check');
                    $('#indHobby').addClass('fa-times');
                    $('#indHobby').css('color', FALSE_COLOR);
                }
            });

            $('input[name=professione]').keyup(function(event){
                professione = $('input[name=professione]').val();
                if(valProfessione(professione)){
                    $('#indProfessione').removeClass('fa-times');
                    $('#indProfessione').addClass('fa-check');
                    $('#indProfessione').css('color', TRUE_COLOR);
                }else{
                    $('#indProfessione').removeClass('fa-check');
                    $('#indProfessione').addClass('fa-times');
                    $('#indProfessione').css('color', FALSE_COLOR);
                }
            });

            $('#buttonAvanti').click(function(){
                if(allValidated()){
                    //$('#buttonAvanti').
                }else{
                    //Insert all values in right format
                }
            });

            $('#buttonCancella').click(function(){
                $('#indGenere').css('color', FALSE_COLOR);
            });

            /* ---------- Responsive ---------- */

            $(window).resize(function () {
                if ($(window).width() < 1050) {
                    $('div.container').removeClass('col-md-8');
                    $('div.container').addClass('col-md-12');
                }else{
                    $('div.container').removeClass('col-md-12');
                    $('div.container').addClass('col-md-8');
                }
            });

            /* ---------- Validator functions ---------- */

            function valName(text){
                if(text.length > 0){
                    for(var i = 0; i < text.length; i++){
                        if(/([^A-Za-zöäüÖÄÜàèìòùÀÈÌÒÙ -])/.test(text[i])){
                            validated[0] = false;
                            return false;
                        }
                    }
                    validated[0] = true;
                    return true;
                }
            }

            function valSurname(text){
                if(text.length > 0){
                    for(var i = 0; i < text.length; i++){
                        if(/([^A-Za-zöäüÖÄÜàèìòùÀÈÌÒÙ -])/.test(text[i])){
                            validated[1] = false;
                            return false;
                        }
                    }
                    validated[1] = true;
                    return true;
                }
            }

            function valBirthday(date){
                var s = date.split("-");
                if(s.length == 3){
                    if(s[0] >= 1850 && (s[0] <= (new Date()).getFullYear())){
                        if(s[2] > 0 && s[2] < 32){
                            if(s[1] > 0 && s[1] < 13){
                                switch(Number(s[1])){
                                    case 1:
                                        if(s[2] < 32){
                                            validated[2] = true;
                                            return true;
                                        }
                                        break;
                                    case 2:
                                        if(s[2] < 30){
                                            if((s[2] == 29 && isMultiple(s[0], 4)) || s[2] < 29){
                                                validated[2] = true;
                                                return true;
                                            }
                                        }
                                        break;
                                    case 3:
                                        if(s[2] < 32){
                                            validated[2] = true;
                                            return true;
                                        }
                                        break;
                                    case 4:
                                        if(s[2] < 31){
                                            validated[2] = true;
                                            return true;
                                        }
                                        break;
                                    case 5:
                                        if(s[2] < 32){
                                            validated[2] = true;
                                            return true;
                                        }
                                        break;
                                    case 6:
                                        if(s[2] < 31){
                                            validated[2] = true;
                                            return true;
                                        }
                                        break;
                                    case 7:
                                        if(s[2] < 32){
                                            validated[2] = true;
                                            return true;
                                        }
                                        break;
                                    case 8:
                                        if(s[2] < 31){
                                            validated[2] = true;
                                            return true;
                                        }
                                        break;
                                    case 9:
                                        if(s[2] < 32){
                                            validated[2] = true;
                                            return true;
                                        }
                                        break;
                                    case 10:
                                        if(s[2] < 31){
                                            validated[2] = true;
                                            return true;
                                        }
                                        break;
                                    case 11:
                                        if(s[2] < 32){
                                            validated[2] = true;
                                            return true;
                                        }
                                        break;
                                    case 12:
                                        if(s[2] < 31){
                                            validated[2] = true;
                                            return true;
                                        }
                                        break;
                                    default:
                                        break;
                                }
                            }
                        }
                    }
                }
                validated[2] = false;
                return false;
            }

            function valNumeroCivico(text){
                if(text.length > 0 && text.length < 6){
                    if(text[0] != "0"){
                        for(var i = 0; i < text.length; i++){
                            if(/([^A-Za-z0-9])/.test(text[i])){
                                validated[3] = false;
                                return false;
                            }
                        }
                        validated[3] = true;
                        return true;
                    }
                }
                validated[3] = false;
                return false;
            }

            function valCitta(text){
                if(text.length > 0 && text.length < 51){
                    for(var i = 0; i < text.length; i++){
                        if(/([^A-Za-zöäüÖÄÜàèìòùÀÈÌÒÙ -])/.test(text[i])){
                            validated[4] = false;
                            return false;
                        }
                    }
                    validated[4] = true;
                    return true;
                }
                validated[4] = false;
                return false;
            }

            function valNap(nap){
                nap = nap.toString();
                if(nap.length == 4 || nap.length == 5){
                    for(var i = 0; i < nap.length; i++){
                        if(/([^0-9])/.test(nap[i])){
                            validated[5] = false;
                            return false;
                        }
                    }
                    validated[5] = true;
                    return true;
                }
                validated[5] = false;
                return false;
            }

            function valNumeroTelefono(num){
                //validated[x] = true;
            }

            function valEmail(mail){
                //validated[x] = true;
            }

            function valGenere(genere){
                if(genere == "M" || genere == "F"){
                    validated[8] = true;
                    return true;
                }
                return false;
            }

            function valHobby(text){
                if(text.length > 0 && text.length < 501){
                    for(var i = 0; i < text.length; i++){
                        if(/([^A-Za-zöäüÖÄÜàèìòùÀÈÌÒÙ0-9 -.,;:_])/.test(text[i])){
                            return false;
                        }
                    }
                    return true;
                }
            }

            function valProfessione(text){
                if(text.length > 0 && text.length < 501){
                    for(var i = 0; i < text.length; i++){
                        if(/([^A-Za-zöäüÖÄÜàèìòùÀÈÌÒÙ -])/.test(text[i])){
                            return false;
                        }
                    }
                    return true;
                }
            }

            /* ---------- Helper Functions ---------- */

            function isMultiple(num, ofWhat){
                return num % ofWhat == 0;
            }

            function allValidated(){
                for(var i = 0; i < validated; i++){
                    if(!validated[i]){
                        return false
                    }
                }
                return true;
            }

        </script>
    </body>
</html>