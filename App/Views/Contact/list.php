<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
            <div class="card">
                <div class="card-body left-content">
                    <div class="list-group">
                        <?php foreach ($data['contacts'] as $contact):?>
                        <a href="#" data-id="<?php echo $contact->id?>" class="list-group-item list-group-item-action"><?php echo $contact->name?></a>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-8">
            <div class="card">
                <div class="card-body right-content">
                    <div class="info-data" style="display: none;">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Contact Info</th>
                                <th>
                                    <a class="btn btn-primary" href="/contacts/edit/{{id}}"><i title="Edit contact" class="fas fa-edit"></i></a>
                                    <button data-id="{{id}}" class="btn btn-danger removeContact"><i title="Remove contact" class="fas fa-trash"></i></button>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Name:</td>
                                <td>{{name}}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{email}}</td>
                            </tr>
                            <tr>
                                <td>Telefone:</td>
                                <td>{{phone}}</td>
                            </tr>
                            <tr>
                                <td>Created At:</td>
                                <td>{{createdAt}}</td>
                            </tr>
                            <tr>
                                <td>Last update:</td>
                                <td>{{lastUpdate}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="chose-one">
                        <h2>Chose one contact</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="removeConfirm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remove Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="font-weight-bold">You really want to remove this contact?</p>
                <p>This action can not be undone</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, close this warning</button>
                <button type="button" id="confirmRemove" class="btn btn-danger">Yes, remove</button>
            </div>
        </div>
    </div>
</div>