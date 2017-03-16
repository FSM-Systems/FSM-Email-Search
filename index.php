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
				<form class="form form-inline" style="width: 100%">
					<input type="text" id="term" class="form-control input-sm" style="width: 300px;" placeholder="Type in email address or text to find" />
					<button type="button" class="btn btn-sm btn-warning">SEARCH</button>
					<button type="button" class="btn btn-sm btn-info">CLEAR</button>
				</form>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row" id="workspace">
		
		</div>	
	</div>
	<script type="text/javascript" >
		$(document).ready(function () {
			$(".btn-info").click(function () {
				$("#workspace").empty()
			})
			$(".btn-warning").click(function () {
				$("#workspace").empty().load("emails.php?term=" + $("#term").val());
			})
		})
	</script>
</body>
</html>