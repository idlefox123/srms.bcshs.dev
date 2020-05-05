//$(".btn").css("box-shadow","0 0 0 0");
$('#sidebarCollapse').on('click',function(){
  //$("#containerLeftSide").removeClass("col-lg-5").addClass("col-lg-4");
  //$("#containerRightSide").removeClass("col-lg-7").addClass("col-lg-8");
  $('#sidebar').toggleClass('active');
  $('#main-container').toggleClass('active');
  $(".btn").css("box-shadow","0 0 0 0");
});
