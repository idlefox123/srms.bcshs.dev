<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="">
  <div class="modal-content">
  <div class="modal-header">
    <h5><i class="title-icon font-weight-bold"> <span class="modal-title"></span></i></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body font-weight-bold">

    <form id="userForm" class="" action="index.html" method="post">

      <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="user">User's Name:</label>
        <div class="col-sm-8">
          <input id="user" class="form-control" type="text" name="user" value="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="username">Username:</label>
        <div class="col-sm-8">
          <input id="username" class="form-control" type="text" name="username" value="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="password">Password</label>
        <div class="col-sm-8">
          <input id="password" class="form-control" type="password" name="password" value="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="retry-password">Re-type password</label>
        <div class="col-sm-8">
          <input id="retype-password" class="form-control" type="password" name="retry-password" value="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="role">Role:</label>
        <div class="col-sm-8">
          <select class="form-control" id="role" name="role">
            <option value="">SELECT</option>
            <option value="Admin">Admin</option>
            <option value="Faculty">Faculty</option>
            <option value="Encoder">Encoder</option>
          </select>
        </div>
      </div>

  </div><!--end Modal body-->
  <div class="modal-footer">
    <button type="button" class="btn costBtn" data-dismiss="modal"><i class="fa fa-times-circle"> Close</i></button>
    <button type="submit" name="" class="btn costBtn" value=""><i class="btn-action-icon"></i><span class="font-weight-bold btn-action-text"></span></button>
    <input id ="action" hidden type="text" name="action" value="">
    <input id ="selectedID" hidden type="text" name="selectedID" value="">
  </div><!--end modal footer -->
</div><!--end Modal Content-->
</div><!--end Modal dialog-->
</div> <!--end Modal-->
</form>
