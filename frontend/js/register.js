var email = $("#email").val();
var birthday = $("#birthday").val();
var pseudo = $("#pseudo").val();
var submit = $("#submit");

console.log(submit)
$(submit).click(function(e) {

    e.preventDefault();

    $.ajax({
        url: "../../backend/controller/register_controller.php",
        method: 'POST',
        email: email,
        birthday: birthday,
        pseudo: pseudo,
        password: password,
        success: function(resultat, statut) {

            console.log(resultat)



        }
    });
});