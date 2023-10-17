function call(url, form) {
    var msg = $('#' + form).serialize();
    $.ajax({
        type: 'POST',
        url: url,
        data: msg,
        success: function(data) {
            eval(data);

        },
        error: function(xhr, str) {
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}

function check(id) {
    document.getElementById('loadImg').style.display = 'block';

    $.get('/payments/check/' + id, function(data) {
        var res = JSON.parse(data);
        document.getElementById('loadImg').style.display = 'none';
        if (res.status == "ok") {
			location="/payments/success/"+id;
        } else {
            swal("Ошибка!", "Платеж не найден! Попробуйте позже.", "error")
        }
    });
}
function template(id) {
    $.get('/admin/market/install/' + id, function(data) {
        eval(data);
    });
}