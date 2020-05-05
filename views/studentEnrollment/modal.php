  <div id="studEnrollModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xlg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-edit"> Edit Enrollee</i></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body font-weight-bold">
          <div class="" style="padding:20px">
            <div class="">
              <h5>
                <p id="student"><i class="fa fa-user-circle"> Enrollee: </i><?php echo ' ' .$enrollee['student']; ?></p>
              </h5>
              <h5>
                <p style="text-indent:113px"><span id="lrn"><?php echo $enrollee['lrn']; ?></span></p>
              </h5>
              <div class="container">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <div class="form-row" style="padding:10px;">
                      <div class="form-group col-sm-4">
                        <label for="enrolleeStrand">Strand:</label>
                        <select id="enrolleeStrand" name="enrolleeStrand" class="form-control">
                          <option value="">SELECT</option>
                          <?php
                          foreach ($view->strand() as $value):?>
                            <option <?php if($enrollee['strand_id']==$value['strand_id']){echo "selected";} ?> value="<?php echo $value["strand_id"]?>">
                              <?php echo $value["strand"]?>
                            </option>
                          <?php endforeach;?>
                        </select>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="enrolleeLevel">Grade:</label>
                        <select id="enrolleeLevel" name="enrolleeLevel" class="form-control">
                          <option value="">SELECT</option>
                          <option <?php if($enrollee['grade_level'] == 'Grade 11'){echo "selected";} ?> value="Grade 11">Grade 11</option>
                          <option <?php if($enrollee['grade_level'] == 'Grade 12'){echo "selected";} ?> value="Grade 12">Grade 12</option>
                        </select>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="enrolleeStatus">Status:</label>
                        <select id="enrolleeStatus" name="enrolleeStatus" class="form-control">
                          <option value="">SELECT</option>
                          <option <?php if($enrollee['status']== 'new'){echo "selected";} ?> value="new">New</option>
                          <option <?php if($enrollee['status'] == 'old'){echo "selected";} ?> value="old">Old</option>
                          <option <?php if($enrollee['status'] == 'transferee'){echo "selected";} ?> value="transferee">Transferee</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn costBtn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times-circle"> Close</i></button>
          <button id="update-enrollee-btn" type="button" class="btn costBtn btn-outline-success"><i class="fa fa-save"> Updates</i></button>
        </div>
      </div>
    </div>
  </div>
