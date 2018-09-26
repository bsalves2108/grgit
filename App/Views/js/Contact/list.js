$(document).ready(() => {
    new contact();
});

class contact extends view
{

    constructor(data) {
        super($('.right-content').html());
        $('.list-group-item-action').on('click',(event) => {
            this.inactiveAll();
            $(event.currentTarget).addClass('active');
            let id = $(event.currentTarget).data('id');
            $.ajax({
                url: 'contacts/' + id,
                success: (response) => {
                    response.createdAt = moment(response.createdAt).format('DD/MM/YYYY HH:mm:ss');
                    response.lastUpdate = moment(response.lastUpdate).format('DD/MM/YYYY HH:mm:ss');
                    super.dataBindSimulator(response, $('.right-content'));
                    this.contactChosen();
                    this.removeContact();

                }
            });
        });
    }

    removeContact() {
        $('.removeContact').on('click', (event) => {
            let id = $(event.currentTarget).data('id');
            $('#removeConfirm').modal('show');
            $('#confirmRemove').on('click', () => {
                this.reallyRemove(id);
            });
        });
    }

    reallyRemove(id) {
        $.ajax({
            url: '/contacts/remove/' + id,
            success: () => {
                document.location = '/contacts';
            }
        });
    }

    contactChosen() {
        $('.info-data').show();
        $('.chose-one').hide();
    }

    inactiveAll() {
        $('.list-group-item-action').removeClass('active');
    }

}


