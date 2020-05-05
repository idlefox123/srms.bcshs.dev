<div class="modal fade" id="facultyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-m" role="">
  <div class="modal-content">
  <div class="modal-header">
    <h5><i class="fa fa-edit"> Edit Profile</i></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body font-weight-bold">

    <form class="facultyForm" action="" method="post">

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="lname">Family Name:</label>
          <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
        </div>
        <div class="form-group col-md-3">
          <label for="fname">First Name:</label>
          <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
        </div>
        <div class="form-group col-md-3">
          <label for="mname">Middle Name:</label>
          <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name">
        </div>
        <div class="form-group col-md-2">
          <label for="extension">Extenion:</label>
          <input type="text" class="form-control" id="extension" name="extension" placeholder="Extension">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="edit-contact">Contact:</label>
          <input type="text" class="form-control" id="edit-contact" name="edit-contact" placeholder="Contact">
        </div>
        <div class="form-group col-md-6">
          <label for="edit-address">Address:</label>
          <input type="text" class="form-control" id="edit-address" name="edit-address" placeholder="Address">
        </div>
      </div>

      <div class="form-group row">
        <label for="edit-position" class="col-sm-4 col-form-label">Position: </label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="edit-position" name="edit-position" placeholder="Position">
        </div>
      </div>


      <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="edit-department"><span>Department:</span></label>
        <div class="col-sm-8">
          <select class="form-control" id="edit-department" name="edit-department">
            <option value="">Department</option>
            <?php
            foreach ($view->department() as $value):?>
              <option value="<?php echo $value["dept_id"]?>">
                <?php echo $value["dept_name"]?>
              </option>
            <?php endforeach;?>
          </select>
        </div>
      </div>

  </div><!--end Modal body-->
  <div class="modal-footer">
    <button type="button" class="btn costBtn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times-circle"> Close</i></button>
    <span class="float-right mr-2">
      <button id="update-faculty-btn" class="btn costBtn btn-outline-success" name="update-faculty-btn" type="submit"><i class="btn-action-icon fa fa-save"> Update</i></button>
    </span>
  </div><!--end modal footer -->
</div><!--end Modal Content-->
</div><!--end Modal dialog-->
</div> <!--end Modal-->
</form>

<div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="">
  <div class="modal-content">
  <div class="modal-header">
    <h5><i class="fa fa-edit"> Edit Account</i></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body font-weight-bold">

    <form class="facultyForm" action="" method="post">

      <div class="form-group row">
        <label for="user" class="col-sm-4 col-form-label">User's name: </label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="user" name="user" placeholder="User's name">
        </div>
      </div>

      <div class="form-group row">
        <label for="username" class="col-sm-4 col-form-label">Username: </label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
      </div>

      <div class="form-group row">
        <label for="password" class="col-sm-4 col-form-label">Password: </label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
      </div>

      <div class="form-group row">
        <label for="retry-password" class="col-sm-4 col-form-label">Retry-Password: </label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="retry-password" name="retry-password" placeholder="Retry-Password">
        </div>
      </div>


  </div><!--end Modal body-->
  <div class="modal-footer">
    <button type="button" class="btn costBtn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times-circle"> Close</i></button>
    <span class="float-right mr-2">
      <button id="update-account-btn" class="btn costBtn btn-outline-success" name="update-faculty-btn" type="submit"><i class="btn-action-icon fa fa-save"> Update</i></button>
    </span>
    <input id ="action" hidden type="text" name="action" value="">
  </div><!--end modal footer -->
</div><!--end Modal Content-->
</div><!--end Modal dialog-->
</div> <!--end Modal-->
</form>
