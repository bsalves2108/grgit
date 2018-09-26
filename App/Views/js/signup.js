$(document).ready(() => {
    validate();
    signup();
});

function signup() {

    let form = $("#signupForm");
    form.validate();
    $("#signup").click((e) => {
        e.preventDefault();
        if(form.valid()) {
            let data = $('#signupForm').serialize();
            $.ajax({
                url: '/signup',
                data: data,
                method: 'POST',
                success: () => {
                    document.location = '/home';
                }
            });
        }
    });

}

function validate() {
    $("#signupForm").validate({
        rules: {
            name: "required",
            password: "required",
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true
            }
        },
        messages: {
            name: "Please enter your name",
            email: "Please enter a valid email address",
            phone: "Please enter your phone",
            password: "Please enter a valid password"
        }
    });
}