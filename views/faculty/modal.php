<div class="modal fade" id="teacherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="">
  <div class="modal-content">
  <div class="modal-header">
    <h5><i class="title-icon font-weight-bold"> <span class="modal-title"></span></i></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body font-weight-bold">

    <form id="tchform" class="" action="index.html" method="post">

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="lname">Family Name:</label>
          <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
        </div>
        <div class="form-group col-md-6">
          <label for="fname">First Name:</label>
          <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
        </div>

      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="mname">Middle Name:</label>
          <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name">
        </div>
        <div class="form-group col-md-6">
          <label for="extension">Extenion:</label>
          <input type="text" class="form-control" id="extension" name="extension" placeholder="Extension">
        </div>
      </div>

      <div class="form-group row">
        <label for="subject" class="col-sm-4 col-form-label">Position: </label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="position" name="position" placeholder="Position">
        </div>
      </div>


      <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="department"><span>Department:</span></label>
        <div class="col-sm-8">
          <select class="form-control" id="department" name="department">
            <option value="">Department</option>
            <?php $db->loadResult("SELECT * FROM department");

            foreach ($db->getResult() as $value):?>
              <option value="<?php echo $value["dept_id"]?>">
                <?php echo $value["dept_name"]?>
              </option>
            <?php endforeach;?>
          </select>
        </div>
      </div>

  </div><!--end Modal body-->
  <div class="modal-footer">
    <button type="button" class="btn costBtn" data-dismiss="modal"><i class="fa fa-danger"> Close</i></button>
    <button type="submit" name="" class="btn costBtn" value=""><i class="btn-action-icon"></i><span class="font-weight-bold btn-action-text"></span></button>
    <input id ="action" hidden type="text" name="action" value="">
    <input id ="selectedID" hidden type="text" name="selectedID" value="">
  </div><!--end modal footer -->
</div><!--end Modal Content-->
</div><!--end Modal dialog-->
</div> <!--end Modal-->
</form>
