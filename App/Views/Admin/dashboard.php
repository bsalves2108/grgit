<div class="container">
    <div class="row">

        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h3>USERS</h3>
                </div>
                <div class="card-body">
                    <h1><a class="clickable" data-toggle="modal" data-target="#listUsers"><i class="fas fa-user"></i> <?=count($data['users'])?></a></h1>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h3>CONTACTS</h3>
                </div>
                <div class="card-body">
                    <h1><a class="clickable" data-toggle="modal" data-target="#listContacts"><i class="fas fa-phone"></i> <?=count($data['contacts'])?></a> </h1>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h3>RANKING</h3>
                </div>
                <div class="card-body">
                    <p>Most contacts: <?=$data['topUser']['name']." (".$data['topUser']['total'].")"?><br>
                    Less contacts: <?=$data['lessUser']['name']." (".$data['lessUser']['total'].")"?></p>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h3>CONTACTS PER MONTH</h3>
                </div>
                <div class="card-body">
                    <canvas id="cpm"></canvas>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h3>USERS PER MONTH</h3>
                </div>
                <div class="card-body">
                    <canvas id="upm"></canvas>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- Modal Users -->
<div class="modal fade" id="listUsers" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">List of Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table	table-hover datatable">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Level</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($data['users']) > 0): ?>
                                <?php foreach($data['users'] as $index => $user): ?>
                                    <tr>
                                        <td><?=$user->id?></td>
                                        <td><?=$user->name?></td>
                                        <td><?=$user->email?></td>
                                        <td><?=$user->phone?></td>
                                        <td><?=$user->level?></td>
                                    </tr>
                                <?php endforeach;?>
                            <?php else:?>
                                <tr>
                                    <th colspan="5">No users</th>
                                </tr>
                            <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal contacts -->
<div class="modal fade" id="listContacts" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">List of Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table	table-hover datatable">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Parent User</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($data['contacts']) > 0): $users = $data['users'];?>
                                <?php foreach($data['contacts'] as $index => $contacts): ?>
                                    <tr>
                                        <td><?=$contacts->id?></td>
                                        <td>
                                            <?php $closure = (function($userID) use ($users) {
                                                foreach($users as $user) {
                                                    if($userID == $user->id) return $user->name;
                                                }
                                            }); echo $closure($contacts->id_user);?>
                                        </td>
                                        <td><?=$contacts->name?></td>
                                        <td><?=$contacts->email?></td>
                                        <td><?=$contacts->phone?></td>
                                    </tr>
                                <?php endforeach;?>
                            <?php else:?>
                                <tr>
                                    <th colspan="5">No contacts</th>
                                </tr>
                            <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>