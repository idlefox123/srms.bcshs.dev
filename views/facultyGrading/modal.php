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
                  <th width="10%">FINAL</th>
                  <th width="20%">ACTION</th>
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
