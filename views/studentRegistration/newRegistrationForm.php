<form id="addModalForm" class="addModalForm needs-validation" novalidate action="" method="post">

<div id="addModal" class="modal fade bd-example-modal-lg" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="card">
        <div class="modal-header">
          <h5 class="font-weight-bold"><i class="fa fa-plus-circle"> New Student Record</i></h5>
        </div>

        <div class="card-body font-weight-bold">
          <div class="mb-4 mt-3"><h4 class="text-center"><i class="fa fa-info-circle"> Student Profile</i></h4></div>
          <hr>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="lname">Family Name:</label>
                <input type="text" class="form-control" name="addlname" placeholder="Last Name" required>
              </div>
              <div class="form-group col-md-3">
                <label for="fname">First Name:</label>
                <input type="text" class="form-control" name="addfname" placeholder="First Name" required>
              </div>
              <div class="form-group col-md-3">
                <label for="mname">Middle Name:</label>
                <input type="text" class="form-control" name="addmname" placeholder="Middle Name" required>
              </div>
              <div class="form-group col-md-2">
                <label for="extension">Extenion:</label>
                <input type="text" class="form-control" name="addextension" placeholder="Extension" required>
              </div>
            </div>

            <div class="form-row">

              <div class="form-group col-sm-3">
                <label for="gender">Gender:</label>
                <select name="addgender" class="form-control" required>
                  <option value="">SELECT</option>
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="age">Age:</label>
                <input type="text" class="form-control" name="addage" placeholder="Age" required>
              </div>
              <div class="form-group col-md-3">
                <label for="birth">Birth Date:</label>
                <input type="text" class="form-control" id="addbdate" name="addbdate" placeholder="Birth Date" required>
              </div>
              <div class="form-group col-md-4">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control" name="addcontact" placeholder="Contact" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="addaddress"><span class="ml-3">Home Address:</span></label>
              <div class="col-sm-9">
                <input id="addaddress" class="form-control" type="text" name="addaddress" placeholder="Home Address" required>
              </div>
            </div>
          <!--</form>-->
            <!---Parents/Guardian's Table-->
            <hr>
            <div class="">
              <h5><i class="fa fa-users"> Parents/Guardians</i></h5>
            </div>

            <div class="">
              <table width="100%" id="pgAddTable"  class="table table-hover table-bordered text-center font-weight-normal">
                <thead>
                  <th>Relationship</th>
                  <th width="">Parents/Guardian's Name</th>
                  <th width="">Address</th>
                  <th width="">Contact</th>
                </thead>
              </table>

              <div class="float-left">
                <button id="add-new-pg-btn" class="btn costBtn btn-outline-primary" type="button" name="addPG" value=""><i class="fa fa-plus-circle"> Add Parents/Guardian</i></button>
              </div>

              <div class="float-right">
                <button id="addRemovePG" class="btn costBtn btn-outline-danger" type="button" name="removePG"><i class="fa fa-trash-alt"> Remove</i></button>
              </div>
            </div>


            <!--<form class="addModalForm" action="index.html" method="post">-->

            <br>
            <hr>
            <h5><i class="fa fa-info-circle"> Other Information</i></h5>

            <div class="form-row font-weight-bold">
              <div class="form-group col-sm-4">
                <label for="inputState">Strand:</label>
                <select name="addstrand" class="form-control" required>
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
                <select name="addlevel" class="form-control" required>
                  <option value="">SELECT</option>
                  <option value="Grade 11">Grade 11</option>
                  <option value="Grade 12">Grade 12</option>
                </select>
              </div>
              <div class="form-group col-sm-4">
                <label for="newstatus">Status:</label>
                <select id="newstatus" name="addstatus" class="form-control" required>
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
                <input disabled type="text" id="newschlName" class="form-control" name="addschlName" placeholder="School Name">
              </div>
              <div class="form-group col-md-5">
                <label for="schlAddress">School Address:</label>
                <input disabled type="text" id="newschlAddress" class="form-control" name="addschlAddress" placeholder="School Address">
              </div>
            </div>

        </div><!--cardbody end--->

        <div class="card-footer">
          <div class="float-right">
            <button type="button" class="btn costBtn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times-circle"> Close</i></button>
            <!--<button id="newsave" class="btn costBtn" data-toggle="modal" data-target="" type="button" name="save" value="save"><i class="fa fa-save"> Save Changes</i></button>-->
            <button id="newsave" class="btn costBtn btn-outline-success" data-toggle="modal" data-target="" type="submit" name="newsave" value="submit"><i class="fa fa-save"> Save Changes</i></button>
            <!---<input id="selectedID" hidden type="text" name="selectedID" value=""></input>-->
            </form>
          </div>
        </div><!--footer end--->
      </div><!--card end--->
    </div>
  </div>
</div><!-- Modal END -->

<!--PG Modal -->
<div class="modal fade" id="add-new-pg-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5><i class="title-icon font-weight-bold"> <span class="modal-title pgmodal-title"></span></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
          <!--<span aria-hidden="true">&times;</span>-->
        </button>
      </div>
      <div class="modal-body">

        <form id="add-new-pg-modal-form" action="index.html" method="post">

        <div class="form-row font-weight-bold">
          <div class="form-group col-sm-3">
            <label for="gender">Relationship:</label>
            <select id="relationship" name="relationship" class="form-control">
              <option value="">SELECT</option>
              <option value="Father">Father</option>
              <option value="Mother">Mother</option>
              <option value="Guardian">Guardian</option>
            </select>
          </div>
          <div class="form-group col-md-9">
            <label for="pgName">Parent/Guardian's Name:</label>
            <input type="text" class="form-control" id="pgName" name="pgName" placeholder="Parent/Guardian's Name">
          </div>
        </div>
        <div class="form-group col-md-12 font-weight-bold">
          <label for="pgAddress">Parent/Guardian's Address:</label>
          <input type="text" class="form-control" id="pgAddress" name="pgAddress" placeholder="Address">
        </div>
        <div class="form-group col-md-12 font-weight-bold">
          <label for="pgContact">Parent/Guardian's Contact No.:</label>
          <input type="text" class="form-control" id="pgContact" name="pgContact" placeholder="Contact No.">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn costBtn" data-dismiss="modal"><i class="fa fa-times-circle"> Close</i></button>
        <button id="add-new-pg-row-btn" data-dismiss="modal" type="button" name="" class="btn costBtn" value=""><i class="btn-action-icon"></i><span class="font-weight-bold btn-action-text"></span></button>
      </div>
    </div>
  </div>
</div>
</form>
