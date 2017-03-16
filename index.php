<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

	<link rel="stylesheet" href="style.css" />
	
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	
</head>
<body>
	<img src="logo.png" alt="" class="logo">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2>SEARCH EMAIL DATABASE</h2>
			</div>
		</div>	
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10 text-center">
				<form id="frm" class="form form-inline" style="width: 100%">
					<input type="text" id="term" class="form-control input-sm" style="width: 300px;" placeholder="Type in email address or text to find" required />
					<input type="text" id="from" class="form-control input-sm datepicker" placeholder="From" />
					<input type="text" id="to" class="form-control input-sm datepicker" placeholder="To" />
					<button type="button" class="btn btn-sm btn-warning">SEARCH</button>
					<button type="button" class="btn btn-sm btn-info">CLEAR</button>
				</form>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10" id="workspace">
			
			</div>
			<div class="col-md-1"></div>
		</div>	
	</div>
	<script type="text/javascript" >
		$(document).ready(function () {
			jQuery.validator.setDefaults({
				errorClass: 'customerror',
				errorPlacement: function(error,element) {
					return true; // No labels for the error fields. Just highlight with error class! Looks better and more fluid
				}
			});
			$(".datepicker").datepicker({
				dateFormat: 'dd/mm/yy'			
			});
	
			$("#term").focus()			
			
			$(".btn-info").click(function () {
				$("#workspace").empty();
				$("input[type=text]").val("")
				$("#term").focus();
			})
			
			$(".btn-warning").click(function () {
				$("#frm").validate()
				// Check if oe date is segt then the other has to be too
				var blngo = true;
				
				if ($("#term").val().length > 0) {
					if (($("#from").val().length > 0 && $("#to").val().length == 0)  || ($("#from").val().length == 0 && $("#to").val().length > 0)) {
						blngo = false;
					}	
				}
				
				if ($("#frm").valid() == true && blngo == true) {
					$("#workspace").empty().load("emails.php?term=" + $("#term").val() + "&from=" + $("#from").val() + "&to=" + $("#to").val());	
				} else {
					alert('YOU HAVE SELECTED ONLY ONE DATE. PLEASE SET ALSO THE SECOND ONE!')
				}
			})
		})
	</script>
</body>
</html>