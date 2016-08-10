
$(document).ready(function () {
    var buttons = $('.btn-remover');
    buttons.on('click', function (ev) {
        var confirm = window.confirm('Tem certeza que deseja remover?');
        if (!confirm) {
            ev.preventDefault();
        }
    })
});