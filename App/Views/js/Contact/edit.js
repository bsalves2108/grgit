$(document).ready(() => {
    new editContact();
});

class editContact
{
    constructor() {
        this.edit();
    }

    edit() {
        $('#submitEdit').click((event) => {
            var data = $('#editContactForm').serialize();
            $.ajax({
                url: '/contacts/edit',
                data: data,
                method: 'post',
                success: () => {
                    document.location = '/contacts';
                }
            });
        });
    }
}