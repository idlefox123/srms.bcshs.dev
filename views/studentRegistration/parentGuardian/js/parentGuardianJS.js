var selectedPG = '',actionPG;
var  pgTable = $('#pgTable').DataTable({
    "serverSide": true,
    "processing": false,
    "ajaxSource": '/srms.bcshs.dev/views/studentRegistration/parentGuardian/pgDataSource.php',
    "bFilter": false,
    "bInfo": false,
    "bSort": false,
    "bPaginate": false,
      "fnServerData": function ( sSource, aoData, fnCallback ) {
        aoData.push({ "name": "selectedID", "value": selectedStudent });
        $.getJSON( sSource, aoData, function (json) {
          /* Do whatever additional processing you want on the callback, then tell DataTables */
          //alert(json.iTotalDisplayRecords);
          fnCallback(json)
        });
      }

  });
//var oSettings = pgTable.settings(); //access to the table settings

//row selector for pgTable
$('#pgTable tbody').on( 'click', 'tr', function () {
  var id = this.id;
    if ( $(this).hasClass('table-active') ) {
        $(this).removeClass('table-active');
        selectedPG = null;
    }else {
        pgTable.$('tr.table-active').removeClass('table-active');
        $(this).addClass('table-active');
        selectedPG = id;
    }
});



$('#add-pg-btn').on('click', function(){
  $('#pg-modal').modal('show');
  $('#pg-modal-form')[0].reset();
  $('.title-icon').addClass('fa fa-plus-circle');
  $('.pgmodal-title').text("New Parents/Guardian");
  $('.btn-action-icon').removeClass('fa fa-save');
  $('.btn-action-icon').addClass('fa fa-plus-circle');
  $('.btn-action-text').text(" Add");
  actionPG = 'create';
  //$('#pgActionInfo').val("pgInsert");
  //$('#pgSelectedIDInfo').val(null);

});

$('#add-new-pg-btn').on('click', function(){
  $('#add-new-pg-modal').modal('show');
  $('#add-new-pg-modal-form')[0].reset();
  $('.title-icon').addClass('fa fa-plus-circle');
  $('.pgmodal-title').text("New Parents/Guardian");
  $('.btn-action-icon').removeClass('fa fa-save');
  $('.btn-action-icon').addClass('fa fa-plus-circle');
  $('.btn-action-text').text(" Add");
  //$('#pgActionInfo').val("pgInsert");
  //$('#pgSelectedIDInfo').val(null);
  validate();
});


$('#editPGInfo').on('click', function(){
  actionPG = "edit";
  if (selectedPG!=null) {
    $.ajax({
      url: "/srms.bcshs.dev/views/studentRegistration/parentGuardian/pgController.php",
      method:"POST",
      dataType: "json",
      data:{
        action:actionPG,
        selectedPG:selectedPG
      },
      success:function(data){
        $('#pg-modal').modal("show");
        $('#pg-name').val(data.p_name);
        $('#pg-address').val(data.p_address);
        $('#pg-contact').val(data.p_contact);
        $('#pg-relationship').val(data.relationship);
        $('.title-icon').removeClass('fa fa-plus-circle');
        $('.title-icon').addClass('fa fa-edit');
        $('.pgmodal-title').text(" Edit Parent/Guardian");
        $('.btn-action-icon').addClass('fa fa-save');
        $('.btn-action-text').text(" Update");
        actionPG = 'update';
     }
    });
  }else {
    alert('Select a row.');
  }

});

//send data to Insert or Update
$('#pg-modal-form').on('submit', function(event){
  event.preventDefault();

  $.ajax({
    url: "/srms.bcshs.dev/views/studentRegistration/parentGuardian/pgController.php",
    method:"POST",
    data:$('#pg-modal-form').serialize() + '&action=' + actionPG + '&selectedStudent=' + selectedStudent + '&selectedPG=' + selectedPG,
    success:function(data)
    {
      $('#pg-modal').modal('hide');
      pgTable.draw(false);
      actionPG = 'update';
    }
  });

});

$('#deletePGInfo').on('click', function(){
  actionPG = 'delete';

  if (selectedPG != null) {
    if (confirm("Are you sure you want to delete ?")) {
      $.ajax({
        url: "/srms.bcshs.dev/views/studentRegistration/parentGuardian/pgController.php",
        method:"POST",
        data:{
          action:actionPG,
          selectedPG:selectedPG
        },
        success:function(data)
        {
          pgTable.draw(false);
          selectedPG = null;
          actionPG   = 'update';
        }
      });
    }

  }else {
    alert('Select a row to Delete');
  }
});

$('#addNewStudent').on('click', function(){
  $('.addModalForm')[0].reset();
  //$('.addModalForm')[1].reset();
  $('.title-icon').addClass('fa fa-plus-circle');
  $('.modal-title').text("New Parents/Guardian");
  $('.btn-action-icon').addClass('fa fa-plus-circle');
  $('.btn-action-text').text(" Add");
  $('#action').val("insert");
  $('#selecteID').val("");
  $('#newschlAddress').attr('disabled','disabled');
  $('#newschlName').attr('disabled','disabled');

});
