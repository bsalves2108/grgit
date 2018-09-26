<div class="container">
    <div class="row">

        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h3>USERS</h3>
                </div>
                <div class="card-body">
                    <h1><i class="fas fa-user"></i> <?=count($data['users'])?></h1>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h3>CONTACTS</h3>
                </div>
                <div class="card-body">
                    <h1><i class="fas fa-phone"></i> <?=count($data['contacts'])?></h1>
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