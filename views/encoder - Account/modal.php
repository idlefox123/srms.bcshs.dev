<form class="account-form" action="" method="post">
<div class="modal fade" id="account-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="">
  <div class="modal-content">
  <div class="modal-header">
    <h5><i class="fa fa-edit"> Edit Account</i></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body font-weight-bold">

      <div class="form-group row">
        <label for="user" class="col-sm-4 col-form-label">User's name: </label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="user-on-modal" name="user" placeholder="User's name">
        </div>
      </div>

      <div class="form-group row">
        <label for="username" class="col-sm-4 col-form-label">Username: </label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="username-on-modal" name="username" placeholder="Username">
        </div>
      </div>

      <div class="form-group row">
        <label for="password" class="col-sm-4 col-form-label">Password: </label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
      </div>


  </div><!--end Modal body-->
  <div class="modal-footer">
    <button type="button" class="btn costBtn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times-circle"> Close</i></button>
    <span class="float-right mr-2">
      <button id="update-account-btn" class="btn costBtn btn-outline-success" name="update-account-btn" type="submit"><i class="btn-action-icon fa fa-save"> Update</i></button>
    </span>
  </div><!--end modal footer -->
</div><!--end Modal Content-->
</div><!--end Modal dialog-->
</div> <!--end Modal-->
</form>
