<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../styles/bootstrap.min.css">
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="../styles/all.css">
		<title>Allianze new admin</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<h2 class="text-center">You must set your password</h2>
				<div class="form-group">
					<form action="../handlers/admin_handler.php?operation=new_admin" method="post">
						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="password" class="form-label">Password</label>
								<input type="password" name="password" id="password" class="form-control">
							</div>
							<div class="col-md-6 mb-2">
								<label for="confirmPassword" class="form-label">Re Enter Password</label>
								<input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
							</div>
							<div class="col-md-6">
								<button type="submit" name="adminSetPass" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>