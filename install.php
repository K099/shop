<?php
	require_once("include/config.php");
	if(isset($_GET["do"])){
		$do = $_GET["do"];
		if($do == "servercheck"){
			if(strtolower(substr(PHP_OS,0,3)) == "win"){
				exit("a");
			}else{
				
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php require_once("page/tem.head.php"); ?>
		<style>
			paper-tab.iron-selected {
    			color: #ffff8d;
  			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="col-md-2"></div>
			<div class="col-md-8" style="margin-top:15px;">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-cogs"></i> ระบบติดตั้งร้านค้าออนไลน์มายคราฟ</div>
				<div class="panel-body">
					<center>
						<div class="alert" style="display:none;" id="return"></div>
						<div id="step1">
							<paper-button class="btn-blue" onclick="server_check();" id="server_check"><i class="fa fa-check"></i> ตรวจสอบระบบ</paper-button>
						</div>
					</center>
				</div>
			</div>
			</div>
			<div class="col-md-2"></div>
		</div>
		<script>
			var current_step = 1;
			function nextstep(){
				$("#step" + current_step).fadeOut(250,function(){
					current_step += 1;
					$("#step" + current_step).fadeIn(250);
				});
			}
			function server_check(){
				$("#return").removeClass("alert-info alert-danger alert-success");
				$.ajax({
					url: "install.php?do=servercheck",
					beforeSend: function(){
						$("#server_check").attr("disabled",true);
						showAlert("info",loading);
					},success: function(data){
						data = $.parseJSON(data);
						if(data.status == false){

						}else if(data.status == true){

						}else{
							$("#return").addClass("alert-info")
						}
					}
				});
			}
		</script>
	</body>
</html>
