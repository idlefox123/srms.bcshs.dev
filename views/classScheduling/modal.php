<form class="scheduleFormModal" action="" method="post">
<div class="modal fade"  data-backdrop="static" data-keyboard="false"  id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xlg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5><i class="fa fa-edit"> Edit Schedule</i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body font-weight-bold">
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="subject">Subject:</label>
            <select id="subject" name="subject" class="form-control">
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
            <select id="day" name="day" class="form-control">
              <option value="TBA">TBA</option>
              <option value="M">M</option><option value="T">T</option><option value="W">W</option>
              <option value="Th">Th</option><option value="F">F</option><option value="S">S</option>
              <option value="MWF">MWF</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="time">Time:</label>
            <select id="time" name="time" class="form-control">
              <option value="TBA">TBA</option>
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
            <select id="room" name="room" class="form-control">
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
            <label for="editAdviser">Adviser:</label>
            <select id="editAdviser" name="editAdviser" class="form-control">
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
        <span class="float-left mt-2">
          <button id="remove-saved-schedule-btn" class="btn costBtn btn-outline-danger" type="button" name="button"><i class="fa fa-trash-alt"> Remove</i></button>
        </span>
        <span class="float-right mt-2">
          <button type="submit" class="btn costBtn btn-outline-success"><i class="fa fa-save"> Update</i></button>
        </span>
      </div>
    </div>
  </div>
</div>
</form>
