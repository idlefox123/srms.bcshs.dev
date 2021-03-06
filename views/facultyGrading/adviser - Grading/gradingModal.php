
<form class="gradingForm" action="index.html" method="post">
  <div id="set-AY-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <h5><i class="fa fa-edit"> Set Academic Year</i></h5>
          <button type="button" class="close clear" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label class=" col-form-label" for="AY"><span><i class="fa fa-calendar-alt"> School Year:</i></span></label>
              <select class="form-control" id="AY" name="AY">
                <<?php
                foreach ($view->allAY() as $value):?>
                 <option <?php if($view->AY () == $value["schl_year"]){echo "selected";} ?> value="<?php echo $value["schl_year"]?>">
                  <?php echo $value["schl_year"] . ' - '?><?php echo $value["schl_year"]+ 1  ?>
                 </option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label class=" col-form-label" for="semester"><span><i class="fa fa-leaf"> Semester:</i></span></label>
              <select class="form-control" id="semester" name="semester">
                <option <?php if($view->semester() == '1'){ echo 'selected';} ?> value="1">First Semester</option>
                <option <?php if($view->semester() == '2'){ echo 'selected';} ?> value="2">Second Semester</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn costBtn btn-outline-danger" data-dismiss="modal" type="button" name="button"><i class="fa fa-times-circle"> Close</i></button>
        </div>
      </div>
    </div>
  </div>
</form>

</style>
<form class="gradingForm" action="index.html" method="post">
  <div id="gradingModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5><i class="fa fa-edit"> Edit</i></h5>
          <button type="button" class="close clear" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-hover" width="100%" >
              <thead>
                <tr class="text-center">
                  <th width="50%">Subject</th>
                  <th width="10%">1ST</th>
                  <th width="10%">2ND</th>
                  <th width="10%">Final</th>
                  <th width="20%">Remark</th>
                </tr>
              </thead>
              <tr>
                <td> <span id="subject"></span> </td>
                <td> <input id="1st_quarter" class="input-min form-control text-center" type="text" name="1st_quarter" value=""> </td>
                <td> <input id="2nd_quarter" class="input-min form-control text-center" type="text" name="2nd_quarter" value=""> </td>
                <td> <input id="final" readonly class="input-med form-control text-center" type="text" name="final" value=""> </td>
                <td>
                  <select id="remark" name="remark" class="form-control text-center">
                    <option value="PENDING">PENDING</option>
                    <option value="PASSED">PASSED</option>
                    <option value="FAILED">FAILED</option>
                  </select>
               </td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn costBtn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times-circle"> Close</i></button>
            <button class="btn costBtn btn-outline-success" type="submit" name="button"> <i class="fa fa-save"> Update</i> </button>
            <input id="action" type="hidden" name="action" value="">
            <input id="gradeSelectedID" type="hidden" name="gradeSelectedID" value="">
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
