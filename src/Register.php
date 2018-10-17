<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Script Register Page -->


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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

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
                                <toDo><i class="fas fa-times" id="indNome"></i></toDo>
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
                                <toDo><i class="fas fa-times" id="indCognome"></i></toDo>
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
                                <toDo><i class="fas fa-times" id="indDataNascita"></i></toDo>
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
                            <input class="input is-large" type="text" placeholder="No. Telefono" name="noTelefono">
                            <span class="icon is-medium is-left">
                                <i class="fas fa-mobile-alt"></i>
                                <i><obli>*</obli></i>
                            </span>
                            <span class="icon is-medium is-right">
                                <toDo><i class="fas fa-times" id="indNoTelefono"></i></toDo>
                            </span>
                        </div>
                    </div>

                    <br class="hide">

                    <!-- Email -->
                    <div class="col-md-6">
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-large" type="mail" placeholder="E-mail" name="email">
                            <span class="icon is-medium is-left">
                                <i class="fas fa-envelope"></i>
                                <i><obli>*</obli></i>
                            </span>
                            <span class="icon is-medium is-right">
                                <toDo><i class="fas fa-times" id="indEMail"></i></toDo>
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
    </body>
    <script src="./RegisterScript.js"></script>
</html>