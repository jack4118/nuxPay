function beforeLogout() {
    var yes     = 'Yes';
    var message = 'Are you sure you want to logout';
    var title   = 'Logout';
    var alert   = 'Error';
    var canvasBtnArray = {
        'Yes' : yes
    };
    showMessage(message, 'info', title, 'sign-out', '', canvasBtnArray);
    $('#canvasYesBtn').click(function() {
        $.ajax({
            type: 'POST',
            url: 'scripts/reqLogin.php',
            data: {type : "logout"},
            success	: function(result) {
                window.location.href = 'pageLogin.php';
            },
            error	: function(result) {
                alert(alert);
            }
        });
    });
}