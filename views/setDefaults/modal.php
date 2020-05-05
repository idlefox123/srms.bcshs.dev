
<form class="defaults-form needs-validation" novalidate action="/srms.bcshs.dev/Set-Defaults" method="post">
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
          <div class="form-group row font-weight-bold">
            <label class="col-sm-4 col-form-label" for="AY"><span>New Academic Year:</span></label>
            <div class="col-sm-8">
              <input id="AY" class="form-control" type="text" name="AY" value="" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn costBtn btn-outline-primary" type="submit" name="button"><i class="fa fa-plus-circle"> Create</i></button>
        </div>
      </div>
    </div>
  </div>
</form>
