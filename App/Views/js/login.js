$(document).ready(() => {
    login();
});

function login() {
    $('#loginBtn').click(() => {
        let data = $('#formLogin').serialize();
        $.ajax({
            url: '/login',
            data: data,
            method: 'POST',
            success: (request) => {
                document.location = '/contacts';
            }
        });
    });
}