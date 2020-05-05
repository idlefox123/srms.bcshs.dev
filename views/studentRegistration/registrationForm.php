<div class="card">
  <div class="card-body">

    <form id="studentRecordForm" class="studentRecordForm" action="" method="post">

      <div class="mt-3">
        <h4 class="text-center"><i class="fa fa-info-circle"> Student Profile</i></h4>
      </div>
      <hr>

      <div class="font-weight-bold mt-2">
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
          <div class="form-group col-sm-3">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" class="form-control">
              <option value="">SELECT</option>
              <option value="1">Male</option>
              <option value="2">Female</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="address">Age:</label>
            <input type="text" class="form-control" id="age" name="age" placeholder="Age">
          </div>
          <div class="form-group col-md-3">
            <label for="birth">Birth Date:</label>
            <input type="text" class="form-control" id="bdate" name="bdate" placeholder="Birth Date">
          </div>
          <div class="form-group col-md-4">
            <label for="contact">Contact:</label>
            <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label" for="address"><span class="ml-3">Home Address:</span></label>
          <div class="col-sm-9">
            <input id="address" class="form-control" type="text" name="address" placeholder="Home Address">
          </div>
        </div>

        <div class="">
          <hr>
          <h5><i class="fa fa-users"> Parents/Guardians</i></h5>
          <table id="pgTable"  class="table table-bordered text-center font-weight-normal">
            <thead>
              <th width="5%">Relationship</th>
              <th width="35%">Parents/Guardian's Name</th>
              <th width="45%">Address</th>
              <th width="15%">Contact</th>
            </thead>
          </table>

          <div class="float-left mt-3">
            <button id="add-pg-btn" class="btn costBtn btn-outline-info" type="button" name="addPG" value=""><i class="fa fa-plus-circle"> Add Parents/Guardian</i></button>
          </div>

          <div class="float-right mt-3">
            <button id="editPGInfo" class="btn costBtn btn-outline-success" type="button" name="editPG"><i class="fa fa-edit"> Edit</i></button>
            <button id="deletePGInfo" class="btn costBtn btn-outline-danger" type="button" name="deletePG"><i class="fa fa-trash-alt"> Delete</i></button>
          </div>
        </div>

        <div class="">
          <br>
          <br>
          <hr>
          <h5><i class="fa fa-info-circle"> Other Information</i></h5>
          <div class="form-group row">
            <div class="form-group col-sm-4">
              <label for="inputState">Strand:</label>
              <select disabled id="strand" name="strand" class="form-control">
                <option value="">SELECT</option>
                <?php
                foreach ($view->strand() as $value):?>
                  <option value="<?php echo $value["strand_id"]?>">
                    <?php echo $value["strand"]?>
                  </option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="form-group col-sm-4">
              <label for="inputState">Grade Level:</label>
              <select disabled id="grade" name="grade" class="form-control">
                <option value="">SELECT</option>
                <option value="Grade 11">Grade 11</option>
                <option value="Grade 12">Grade 12</option>
              </select>
            </div>
            <div class="form-group col-sm-4">
              <label for="status">Status:</label>
              <select disabled id="status" name="status" class="form-control">
                <option value="">SELECT</option>
                <option value="new">New</option>
                <option value="old">Old</option>
                <option value="transferee">Transferee</option>
              </select>
            </div>
          </div>
          <i class="fa fa-info-circle font-italic"> If Transferee Please fill the following information:</i>
          <div class="form-row">
            <div class="form-group col-md-7">
              <label for="schlName">School Name:</label>
              <input type="text" class="form-control" id="schlName" name="schlName" placeholder="School Name">
            </div>
            <div class="form-group col-md-5">
              <label for="schlAddress">School Address:</label>
              <input type="text" class="form-control" id="schlAddress" name="schlAddress" placeholder="School Address">
            </div>
          </div>
        </div>

        <div class="">
          <div class="float-right ">
            <button id="save" class="btn costBtn btn-outline-success" data-toggle="modal" data-target="" type="submit" name="save" value="save"><i class="fa fa-save"> Save Changes</i></button>
            <button id="go-to-enrollment-btn" type="button" class="btn costBtn"><span class="font-weight-bold">Go to Enrollment </span><i class="fa fa-arrow-circle-right"></i></button>
            <input id="action" hidden type="text" name="action" value=""></input>
          </div>
        </div><!--footer end--->
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">

</script>
