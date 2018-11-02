/*
    Main script of the Register page.
    @author Jari Naeser
 */


/* ---------- Constants ---------- */

const TRUE_CHAR = 'fa-check';
const FALSE_CHAR = 'fa-times';
const TRUE_COLOR = '#abdd92';
const FALSE_COLOR = '#f76a6a';

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
var hobbyStatus = false;
var professioneStatus = false;

/* ---------- Start Up ---------- */

$(window).ready(function(){
    console.log("Welcome on the Register page!");
    $('#showInputs').hide();
    $('#errorMessage').hide();
    $('#datePicker').css('color', 'rgb(194,194,194)');
    $('#genere').css('color', 'rgb(194,194,194)');
});

/* ---------- Events handler functions ---------- */

function setIcon(id, method){
    if(method){
        setTrue(id);
    }else{
        setFalse(id);
    }
}

function setTrue(id){
    $(id).removeClass(FALSE_CHAR);
    $(id).addClass(TRUE_CHAR);
    $(id).css('color', TRUE_COLOR);
}

function setFalse(id){
    $(id).removeClass(TRUE_CHAR);
    $(id).addClass(FALSE_CHAR);
    $(id).css('color', FALSE_COLOR);
}

// Name field
$('input[name=nome]').keyup(function(event){
    nome = $('input[name=nome]').val();
    setIcon('#indNome', valName(nome));
});

// Surname field
$('input[name=cognome]').keyup(function(event){
    cognome = $('input[name=cognome]').val();
    setIcon('#indCognome', valSurname(cognome));
});

// Birthday field
$('input[name=dataNascita]').blur(function(event){
    dataNascita = $('input[name=dataNascita]').val();
    setIcon('#indDataNascita', valBirthday(dataNascita));
});

$('input[name=dataNascita]').keyup(function(event){
    dataNascita = $('input[name=dataNascita]').val();
    setIcon('#indDataNascita', valBirthday(dataNascita));
});

// Civic number field
$('input[name=noCivico]').keyup(function(event){
    noCivico = $('input[name=noCivico]').val();
    setIcon('#indNoCivico', valNumeroCivico(noCivico));
});

// City field
$('input[name=citta]').keyup(function(event){
    citta = $('input[name=citta]').val();
    setIcon('#indCitta', valCitta(citta));
});

// Nap field
$('input[name=nap]').keyup(function(event){
    nap = $('input[name=nap]').val();
    setIcon('#indNap', valNap(nap));
});

// Phone-Number field
$('input[name=noTelefono]').keyup(function(event){
    noTelefono = $('input[name=noTelefono]').val();
    setIcon('#indNoTelefono', valNumeroTelefono(noTelefono));
});

// E-Mail field
$('input[name=email]').keyup(function(event){
    email = $('input[name=email]').val();
    setIcon('#indEMail', valEmail(email));
});

// Gender field
$('#genere').blur(function(event){
    genere = $('#genere').val();
    if(valGenere(genere)){
        $('#indGenere').css('color', TRUE_COLOR);
    }else{
        $('#indGenere').css('color', FALSE_COLOR);
    }
    if(genere == "M" || genere == "F"){
        $('#genere').css('color', 'black');
    }else{
        $('#genere').css('color', 'rgb(194,194,194)');
    }

});

// Hobby field
$('input[name=hobby]').keyup(function(event){
    hobby = $('input[name=hobby]').val();
    setIcon('#indHobby', valHobby(hobby));
});

// Job field
$('input[name=professione]').keyup(function(event){
    professione = $('input[name=professione]').val();
    setIcon('#indProfessione', valProfessione(professione));
});

$('#buttonAvanti').click(function(){
    if(allValidated()){
        if(!hobbyStatus){
            hobby = "-";
        }
        if(!professioneStatus){
            professione = "-";
        }
        $('#mainRegister').hide();
        fillTable();
        $('#showInputs').show();
        $('#messages div').remove();
    }else{
        $('#messages')
            .append("<div class=\"alert alert-danger alert-dismissible\" " +
                "id=\"errorMessage\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" " +
                "aria-label=\"close\">&times;</a><strong>Attenzione!" +
                "</strong>Devi completare tutti i campi obbligatori nel modo corretto.</div>"
            );
    }
});

$('#buttonCancella').click(function(){
    $('#indGenere').css('color', FALSE_COLOR);
    setFalse('#indNome');
    setFalse('#indCognome');
    setFalse('#indDataNascita');
    setFalse('#indNoCivico');
    setFalse('#indCitta');
    setFalse('#indNap');
    setFalse('#indNoTelefono');
    setFalse('#indEMail');
    setFalse('#indHobby');
    setFalse('#indProfessione');
    for(var i = 0; i < validated.length; i++){
        validated[i] = false;
    }
});

$('#buttonCorreggi').click(function(){
    $('#table tr').remove();
    $('#showInputs').hide();
    $('#mainRegister').show();
});

$('#buttonRegistra').click(function(){
    $.ajax({
        type:"POST",
        url:"Saves.php",
        data: {
            nome: nome,
            cognome: cognome,
            dataNascita: dataNascita,
            noCivico: noCivico,
            citta: citta,
            nap: nap,
            noTelefono: noTelefono,
            email: email,
            genere: genere,
            hobby: hobby,
            professione: professione
        },
        success: function(data){
            console.log("Transfer of " + data + " is OK.");
            document.open();
            document.write(data);
            document.close();
        },
        error: function(data){
            console.log("Couldn't transfer " + data);
        }
    });
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

function testInput(regex, text, validatedNum){
    for(var i = 0; i < text.length; i++){
        if(regex.test(text[i])){
            validated[validatedNum] = false;
            return false;
        }
    }
    validated[validatedNum] = true;
    return true;
}

function testShortInput(regex, text, num){
    for(var i = 0; i < text.length; i++){
        if(regex.test(text[i])){
            if(num == 0){
                hobbyStatus = false;
            }else{
                professioneStatus = false;
            }
            return false;
        }
    }
    if(num == 0){
        hobbyStatus = true;
    }else{
        professioneStatus = true;
    }
    return true;
}

function valName(text){
    if(!isNullOrWhiteSpace(text)){
        if(text.length > 0){
            if(text[0] == '-' || text[0] == '.'){
                return false;
            }
            return testInput(/([^A-Za-zöäüÖÄÜàèìòùÀÈÌÒÙ -.])/, text, 0);
        }
    }
    validated[0] = false;
}

function valSurname(text){
    if(!isNullOrWhiteSpace(text)){
        if (text.length > 0) {
            if(text[0] == '-' || text[0] == '.'){
                return false;
            }
            return testInput(/([^A-Za-zöäüÖÄÜàèìòùÀÈÌÒÙ -.])/, text, 1);
        }
    }
    validated[1] = false;
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
}

function valNumeroCivico(text){
    if(!isNullOrWhiteSpace(text)) {
        if (text.length > 0 && text.length < 6) {
            if (text[0] != "0") {
                if(text.length == 1){
                    return testInput(/([^A-Za-z0-9])/, text, 3);
                }else{
                    if(isLastChar(text)){
                        return testInput(/([^A-Za-z0-9])/, text, 3);
                    }
                }
            }
        }
    }
    validated[3] = false;
}

function valCitta(text){
    if(!isNullOrWhiteSpace(text)) {
        if (text.length > 0 && text.length < 51) {
            return testInput(/([^A-Za-zöäüÖÄÜàèìòùÀÈÌÒÙ -])/, text, 4);
        }
    }
    validated[4] = false;
}

function valNap(nap){
    nap = nap.toString();
    if(nap.length == 4 || nap.length == 5){
        return testInput(/([^0-9])/, nap, 5);
    }
    validated[5] = false;
}

function valNumeroTelefono(num){
    if(!isNullOrWhiteSpace(num)) {
        if ((num.replace(' ','').trim()).length > 9 && (num.replace(' ','').trim()).length < 31) {
            return testInput(/([^0-9 +*#-])/, num, 6);
        }
    }
    validated[6] = false;
}

function valEmail(mail){
    // RegEx characters found on StackOverflow
    var re = /(([^<>()\[\]\.,:\s@\"]+(\.[^<>()\[\]\.,:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,:\s@\"]+\.)+[^<>()[\]\.,:\s@\"]{2,})$/i;
    if(mail.length > 4){
        if(mail.includes('@') && mail.includes('.') && !mail.includes(';')){
            for(var i = 0; i < mail.length; i++){
                if(re.test(mail[i])){
                    validated[7] = false;
                    return false;
                }
            }
            if(mail[0] != '.'){
                var splitted = mail.split('@');
                if(splitted.length == 2){
                    var s2 = splitted[1];
                    if(s2[s2.length - 1] != '.' && s2.includes('.')){
                        validated[7] = true;
                        return true;
                    }
                }
            }
        }
    }
    validated[7] = false;
}

function valGenere(genere){
    if(genere == "M" || genere == "F"){
        validated[8] = true;
        return true;
    }
    validated[8] = false;
}

function valHobby(text){
    if(!isNullOrWhiteSpace(text)) {
        if (text.length > 0 && text.length < 501) {
            return testShortInput(/([^A-Za-zöäüÖÄÜàèìòùÀÈÌÒÙ0-9 -.,:_])/, text, 0);
        }
    }
}

function valProfessione(text){
    if(!isNullOrWhiteSpace(text)) {
        if (text.length > 0 && text.length < 501) {
            return testShortInput(/([^A-Za-zöäüÖÄÜàèìòùÀÈÌÒÙ0-9 -.,:_])/, text, 1);
        }
    }
}

/* ---------- Helper Functions ---------- */

function isNullOrWhiteSpace(text){
    return (text.length === null || text.trim() === '');
}

function isMultiple(num, ofWhat){
    return num % ofWhat === 0;
}

function allValidated(){
    for(var i = 0; i < validated.length; i++){
        if(!validated[i]){
            return false
        }
    }
    return true;
}

function isLastChar(str){
    var rest = str.substr(0, str.length - 1);
    return rest.match(/[0-9]/);
}

function fillTable(){

    $('#table')
        .append("<tr><td>Nome</td><td>" + nome + "</td></tr>")
        .append("<tr><td>Cognome</td><td>" + cognome + "</td></tr>")
        .append("<tr><td>Data di nascita</td><td>" + dataNascita + "</td></tr>")
        .append("<tr><td>Numero civico</td><td>" + noCivico + "</td></tr>")
        .append("<tr><td>Città</td><td>" + citta + "</td></tr>")
        .append("<tr><td>Nap</td><td>" + nap + "</td></tr>")
        .append("<tr><td>Numero di telefono</td><td>" + noTelefono + "</td></tr>")
        .append("<tr><td>E-mail</td><td>" + email + "</td></tr>")
        .append("<tr><td>Genere</td><td>" + genere + "</td></tr>")
        .append("<tr><td>Hobby</td><td>" + hobby + "</td></tr>")
        .append("<tr><td>Professione</td><td>" + professione + "</td></tr>");
}

$('#datePicker').focus(function(){
   $('#datePicker').css('color', 'black');
});

$('#datePicker').blur(function(){
    console.log($('#datePicker').val());
    if($('#datePicker').val() === ''){
        $('#datePicker').css('color', 'rgb(194,194,194)');
    }else{
        $('#datePicker').css('color', 'black');
    }
});

//Initialize tooltips

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
