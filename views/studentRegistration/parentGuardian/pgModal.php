<!--PG Modal -->
<div class="modal fade" id="pg-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5><i class="title-icon font-weight-bold"> <span class="modal-title pgmodal-title"></span></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="pg-modal-form" action="index.html" method="post">

        <div class="form-row font-weight-bold">
          <div class="form-group col-sm-3">
            <label for="gender">Relationship:</label>
            <select id="pg-relationship" name="pg-relationship" class="form-control">
              <option value="">SELECT</option>
              <option value="Father">Father</option>
              <option value="Mother">Mother</option>
              <option value="Guardian">Guardian</option>
            </select>
          </div>
          <div class="form-group col-md-9">
            <label for="pgName">Parents/Guardian's Name:</label>
            <input id="pg-name" type="text" class="form-control" name="pg-name" placeholder="Parent/Guardian's Name">
          </div>
        </div>
        <div class="form-group col-md-12 font-weight-bold">
          <label for="pgAddress">Parents/Guardian's Address:</label>
          <input id="pg-address" type="text" class="form-control" name="pg-address" placeholder="Address">
        </div>
        <div class="form-group col-md-12 font-weight-bold">
          <label for="pgContact">Parents/Guardian's Contact No.:</label>
          <input id="pg-contact" type="text" class="form-control" name="pg-contact" placeholder="Contact No.">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn costBtn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times-circle"> Close</i></button>
        <button type="submit" name="" class="btn costBtn btn-outline-primary" value=""><i class="btn-action-icon"></i><span class="font-weight-bold btn-action-text"></span></button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal end-->
