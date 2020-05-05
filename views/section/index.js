var selectedSection,action;
var sectionTable = $('#sectionTable').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "bFilter": true, "bInfo": true, "dom":'lt<"row"<"col-sm-2"i><"col-sm-8"><"col-sm-2"p>>',
  "bLengthChange": true, "bSort": false,
  "ajax":{
    url:"/srms.bcshs.dev/views/section/sectionDataSource.php",
    type:"POST",
  },
  /*"oLanguage":
         {
          "sZeroRecords": "No matching Subject found for this filter",
          "sSearch": "Filter:"
        },*/
  "columnDefs": [{
              "targets": '_all',
              "createdCell": function (td, cellData, rowData, row, col) {

              }
          },
        ],

  "initComplete": function () {

    $('#sectionTable tbody').on( 'click', 'tr', function () {
      var id = this.id;
        if ( $(this).hasClass('table-active') ) {
            $(this).removeClass('table-active');
            selectedSection = null;
            $('.sectionForm')[0].reset();
        }else {
          sectionTable.$('tr.table-active').removeClass('table-active');
          $(this).addClass('table-active');
          selectedSection = id;
          getSection();
          $('#selectedSection').val(selectedSection);
          $('#update-section-btn').removeAttr('disabled');
          $('#delete-section-btn').removeAttr('disabled');
          $('#add-section-btn').attr('disabled','disabled');
          action = 'update';
          validated();
        }
    });

  }
});

$.fn.DataTable.ext.pager.numbers_length = 5;

$('#search').keyup( function(){
  sectionTable.search($(this).val()).draw();
});

function getSection(){
  action = 'edit';
  $.ajax({
    url: "/srms.bcshs.dev/views/section/controller.php",
    method:"POST",
    dataType: "json",
    data:{
      action:action,
      selectedSection:selectedSection
    },
    success:function(data)
    {
      $('#section').val(data.section);
      action = 'update';
    }
  });
}

$('#new-section-btn').on('click', function(){
  $('.sectionForm')[0].reset();
  $('#update-section-btn').attr('disabled','disabled');
  $('#delete-section-btn').attr('disabled','disabled');
  $('#add-section-btn').removeAttr('disabled');
  action = 'create';
  validate();
});



$('.sectionForm').on('submit', function(){
  event.preventDefault();
  if (true) {
    $.ajax({
      url: "/srms.bcshs.dev/views/section/controller.php",
      method:"POST",
      data:$('.sectionForm').serialize() + '&action=' + action + '&selectedSection=' + selectedSection,
      success:function(data)
      {
        sectionTable.draw(false);
        $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
        validated();
      }
    });
  }else {
    alert('Select a Section.')
  }
});

$('#delete-section-btn').on('click', function(){
  action = 'delete';
  if (selectedSection!=null) {
    if (confirm("Are you sure you want to delete")) {
      $.ajax({
        url: "/srms.bcshs.dev/views/section/controller.php",
        method:"POST",
        data:{
          action:action,
          selectedSection:selectedSection
        },
        success:function(data)
        {
          sectionTable.draw(false);
          selectedSection = null;
          $('.sectionForm')[0].reset();
          action = 'update';
          $('#message').fadeIn().delay(2000).fadeOut('slow').html(data);
        }
      });
    }
  }else {
    $('#message').fadeIn().delay(2000).fadeOut('slow').html(message());
  }
});

function message() {
  message = '<div class="alert alert-danger position-absolute text-center" style="width:100%;">'
    + "Select a Section to Delete." +
    '</div>'
    return message;
}

function validated() {
  if (action == 'update') {
    var forms = document.getElementsByClassName('needs-validation');

    var validation = Array.prototype.filter.call(forms, function(form) {
      form.classList.remove('was-validated');
    });
  }
}

function validate() {
  var forms = document.getElementsByClassName('needs-validation');

  var validation = Array.prototype.filter.call(forms, function(form) {
    form.classList.add('was-validated');
  });
}
