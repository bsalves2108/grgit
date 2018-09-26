<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 offset-lg-3 offset-xl-3">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Contact</h4>
                </div>
                <div class="card-body">
                    <form id="editContactForm">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" value="<?php echo $data['contact']->name ?>" class="form-control" name="name" id="name" placeholder="Full name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" value="<?php echo $data['contact']->email ?>" class="form-control" name="email" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" value="<?php echo $data['contact']->phone ?>" class="form-control phone" name="phone" id="phone" placeholder="Phone">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $data['contact']->id ?>">
                        <button type="button" id="submitEdit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>