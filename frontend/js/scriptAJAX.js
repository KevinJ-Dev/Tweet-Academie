$("#create").click(function () {
    $.ajax({
        url: 'frontend/view/register.php',
        type: 'POST'
    });
});

$("#create-connect").click(function () {
    $.ajax({
        url: 'frontend/view/login.php',
        type: 'POST'
    });
});
