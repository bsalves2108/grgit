$(document).ready(() => {
    new newContact();
});

class newContact
{
    constructor() {
        this.new();
        this.validator();
    }

    validator() {
        $("#newContactForm").validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    minlength: 15
                }
            },
            messages: {
                name: "Please enter your name",
                email: "Please enter a valid email address",
                phone: "Please enter your phone"
            }
        });
    }

    new() {
        let form = $("#newContactForm");
        form.validate();
        $("#submitNew").click((e) => {
            e.preventDefault();
            if(form.valid()) {
                let data = form.serialize();
                $.ajax({
                    url: '/contacts/new',
                    type: 'POST',
                    data: data,
                    success: () => {
                        document.location = '/contacts';
                    }
                });
            }
        });
    }
}