var pgTableAdd = $('#pgAddTable').DataTable({
  "bFilter": false,
  "bInfo": false, "bSort": false,
  "bPaginate": false,
  "columns": [{ data: "relationship" },{ data: "pgName" },{ data: "pgAddress" },{ data: "pgContact" }
  ],
});

$('#pgAddTable tbody').on( 'click', 'tr', function () {
  var id = this.id;
    if ( $(this).hasClass('table-active') ) {
        $(this).removeClass('table-active');

    }else {

        pgTableAdd.$('tr.table-active').removeClass('table-active');
        $(this).addClass('table-active');
    }
});

$('#add-new-pg-row-btn').on('click', function () {
    pgTableAdd.row.add({
        "relationship": $('#relationship').val(),
        "pgName": $('#pgName').val(),
        "pgAddress": $('#pgAddress').val(),
        "pgContact": $('#pgContact').val(),
    }).draw();

    $('#add-new-pg-modal').modal('hide');
    $('#add-new-pg-modal-form')[0].reset();
});

$('#addRemovePG').on('click', function(){
  pgTableAdd.row( '.table-active' ).remove().draw(false);
});

$('#newstatus').on('change', function(){
  if ($('#newstatus').val()=='transferee') {
    $('#newschlAddress').removeAttr('disabled');
    $('#newschlName').removeAttr('disabled');
  }else {
    $('#newschlAddress').attr('disabled','disabled');
    $('#newschlName').attr('disabled','disabled');
  }
});

$('#addbdate').datetimepicker({
  timepicker: false,
  datepicker: true,
  format: 'm-d-Y',
  value: '',
  week: true
})
