<form class="class-form needs-validation" novalidate action="index.html" method="post">
  <div class="modal fade" id="class-modal" tabindex="-1" role="dialog" aria-labelledby="classLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="font-weight-bold "><i class="title-icon"> <span class="modal-title"></span> </i></h5>
          <button type="button" class="close clear" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body font-weight-bold">
          <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="section"><span>Section:</span></label>
            <div class="col-sm-7">
              <select class="form-control" id="section" name="section" required>
                <option value="">SELECT</option>
                <?php
                foreach ($view->section() as $value):?>
                  <option value="<?php echo $value["section_id"]?>">
                    <?php echo $value["section"]?>
                  </option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="strand"><span>Strand:</span></label>
            <div class="col-sm-7">
              <select class="form-control" id="strand" name="strand" required>
                <option value="">SELECT</option>
                <?php
                foreach ($view->strand() as $value):?>
                  <option value="<?php echo $value["strand_id"]?>">
                    <?php echo $value["strand"]?>
                  </option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="level"><span>Grade Level:</span></label>
            <div class="col-sm-7">
              <select class="form-control" id="level" name="level" required>
                <option value="">SELECT</option>
                <option value="Grade 11">Grade 11</option>
                <option value="Grade 12">Grade 12</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <span class="float-right">
            <button type="button" class="btn clear costBtn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times-circle"> Close</i></button>
          </span>
          <span class="float-right mr-2">
            <button id="action-btn" class="btn costBtn btn-outline-primary" name="action-btn" type="submit"><i class="btn-action-icon"> <span class="btn-action-text"></span> </i></button>
          </span>
        </div>
      </div>
    </div>
  </div>
</form>


<form class="schedule-form needs-validation" novalidate action="" method="post">
<div class="modal fade" id="schedule-modal" tabindex="-1" role="dialog" aria-labelledby="edit-schedule-Label" aria-hidden="true">
  <div class="modal-dialog modal-xlg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5><i class="schedule-title-icon"> <span class="schedule-modal-title"></span> </i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body font-weight-bold">
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="subject">Subject:</label>
            <select id="subject" name="subject" class="form-control" required>
              <option value="">SELECT</option>
              <?php
              foreach ($view->subjects() as $value):?>
                <option value="<?php echo $value["subject_id"]?>">
                  <?php echo $value["subject_name"]?>
                </option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="day">Day:</label>
            <select id="day" name="day" class="form-control" required>
              <option value="">SELECT</option>
              <option value="M">M</option><option value="T">T</option><option value="W">W</option>
              <option value="Th">Th</option><option value="F">F</option><option value="S">S</option>
              <option value="MWF">MWF</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="time">Time:</label>
            <select id="time" name="time" class="form-control" required>
              <option value="">SELECT</option>
              <option value="7:00 - 8:00">7:00 - 8:00</option><option value="7:30 - 8:30">7:30 - 8:30</option><option value="8:00 - 9:00">8:00 - 9:00</option>
              <option value="8:30 - 9:30">8:30 - 9:30</option><option value="9:00 - 10:00">9:00 - 10:00</option><option value="9:30 - 10:30">9:30 - 10:30</option>
              <option value="10:00 - 11:00">10:00 - 11:00</option><option value="10:30 - 11:30">10:30 - 11:30</option><option value="11:00 - 12:00">11:00 - 12:00</option>
              <option value="11:30 - 12:30">11:30 - 12:30</option><option value="12:00 - 1:00">12:00 - 1:00</option><option value="1:00 - 2:00">1:00 - 2:00</option>
              <option value="1:30 - 2:30">1:30 - 2:30</option><option value="2:00 - 3:00">2:00 - 3:00</option><option value="2:30 - 3:30">2:30 - 3:30</option>
              <option value="3:00 - 4:00">3:00 - 4:00</option><option value="3:30 - 4:30">3:30 - 4:30</option><option value="4:00 - 5:00">4:00 - 5:00</option>
              <option value="4:30 - 5:30">4:30 - 5:30</option><option value="5:00 - 6:00">5:00 - 6:00</option><option value="5:30 - 6:30">5:30 - 6:30</option>
              <option value="Father">10:00 - 12:00</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="room">Room:</label>
            <select id="room" name="room" class="form-control" required>
              <option value="">SELECT</option>
              <<?php
              foreach ($view->rooms() as $value):?>
                <option value="<?php echo $value["room_id"]?>">
                  <?php echo $value["room"]?>
                </option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="teacher">Adviser:</label>
            <select id="teacher" name="teacher" class="form-control" required>
              <option value="">SELECT</option>
              <?php
              foreach ($view->teacher() as $value):?>
                <option value="<?php echo $value["teacher_id"]?>">
                  <?php echo $value["teacher"]?>
                </option>
              <?php endforeach;?>
            </select>
          </div>
        </div>
      </div>
      <div class="cust-modal-footer">
        <span class="float-left mt-2 mb-2">
          <button id="remove-schedule-btn" class="btn costBtn btn-outline-danger" type="button" name="remove-schedule-btn"><i class="fa fa-trash-alt"> Remove</i></button>
        </span>
        <span class="float-right mt-2">
          <button id="schedule-action-btn" type="submit" class="btn costBtn btn-outline-primary"><i class="schedule-btn-action-icon"> <span class="schedule-btn-action-text"></span> </i></button>
        </span>
      </div>
    </div>
  </div>
</div>
</form>
