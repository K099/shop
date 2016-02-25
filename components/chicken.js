var loading = "<i class='fa fa-refresh fa-spin'></i> ระบบกำลังทำงาน";
var success = "<i class='fa fa-check'></i> ";
var warning = "<i class='fa fa-warning'></i> ";
var error = "<i class='fa fa-warning'></i> ระบบเกิดข้อผิดพลาด";
function showAlert(type,txt){
	$("#return").removeClass("alert-info alert-danger alert-success");
	$("#return").addClass("alert-" + type);
	$("#return").html(txt);
	$("#return").slideDown(250);
}
function clearAlert(){
	$("#return").slideUp(250);
}