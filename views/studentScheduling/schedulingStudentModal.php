<!-- Block Scheduling for Enrolees -->
<div class="modal fade" id="schedulingEnrolleeModal" tabindex="-1" role="dialog" aria-labelledby="schedulingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5><i class="fa fa-calendar-alt"> Schedules</i></h5>
        <button type="button" class="close clear" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10" >

            <div class="card-header">
              <h5><i class="fa fa-calendar-alt"> Class Schedule</i></h5>
            </div>

            <table id="scheduleTable" class="table" width="100%">
              <thead>
                <tr class="text-center">
                  <th>Subject</th>
                  <th>Day</th>
                  <th>Time</th>
                  <th>Room</th>
                </tr>
              </thead>
            </table>

          </div>
          <div class="col-md-1"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn clear costBtn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times-circle"> Close</i></button>
      </div>
    </div>
  </div>
</div>


<!-- Costum Subject Scheduling for Enrolees (currenty disabled)-->
<!--
<form id="subjectSchedulingForm" class="" action="index.html" method="post">
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="subjectSchedulingModal" tabindex="-1" role="dialog" aria-labelledby="schedulingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xlg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5><i class="fa fa-plus-circle"> Add Subject</i></h5>
        <button type="button" class="close clear" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6" >
            <div class="form-row padding-top-10 font-weight-bold">
              <div class="form-group col-md-4">
                <label for="sectionFilter">Section:</label>
                <select id="sectionFilter" name="sectionFilter" class="form-control">
                  <option value="">SELECT</option>
                  <<?php
                  //foreach ($view->section() as $value):?>
                    <option value="<?php //echo $value["section_id"]?>">
                      <?php //echo $value["section"]?>
                    </option>
                  <?php //endforeach;?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="strand">Strand:</label>
                <select id="strand" name="strand" class="form-control">
                  <option value="">SELECT</option>
                  <<?php
                  //foreach ($view->strand() as $value):?>
                    <option value="<?php //echo $value["strand_id"]?>">
                      <?php //echo $value["strand"]?>
                    </option>
                  <?php //endforeach;?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="grade">Grade Level:</label>
                <select id="grade" name="grade" class="form-control">
                  <option value="">SELECT</option>
                  <option value="Grade 11">Grade 11</option>
                  <option value="Grade 12">Grade 12</option>
                </select>
              </div>
            </div>
            <table id="defScheduleTable" class="table table-hover" width="100%">
              <thead>
                <tr>
                  <th>Subject</th>
                  <th>Day</th>
                  <th>Time</th>
                  <th>Room</th>
                </tr>
              </thead>
            </table>
            <div class="float-right mt-2">
              <button id="add-subject-btn" class="btn costBtn btn-outline-primary" data-toggle="" data-target="#" type="button" name="button"><i class="fa fa-plus-circle"> Add Subject</i></button>
            </div>
          </div>

          <div class="col-md-6">
            <div style="margin-top:13px"></div>
            <div class="card-header">
              <h5> <i class="fa fa-calendar-alt"> Enrollee 's Schedule</i> </h5>
            </div>
            <hr>

            <div class="mt-3">
              <h5 style="text-indent:10px" class="font-weight-bold"> Section: <span id="enrolled-class-modal"><?php echo $enrollee['section']; ?></span> </h5>
            </div>
            <table id="enrolleeTableOnModal" class="table table-hover" width="100%">
              <thead>
                <tr>
                  <th>Subject</th>
                  <th>Day</th>
                  <th>Time</th>
                  <th>Room</th>
                </tr>
              </thead>
            </table>
            <div class="float-right mt-2">
              <button id="remove" class="btn costBtn btn-outline-danger" type="button" name="button"><i class="fa fa-trash-alt"> Remove</i></button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn costBtn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times-circle"> Close</i></button>
        <button id="enroll-subject-btn" type="button" class="btn costBtn btn-outline-success"><i class="fa fa-pen-square"> Enroll Subjects</i></button>
      </div>
    </div>
  </div>
</div>
</form>
-->
