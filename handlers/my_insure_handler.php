<?php session_start();
	$insurNo = $_SESSION['insurNo'];
	require_once '../includes/database.php';
	// echo 'working';
	if (@$_GET['operation'] == 'update_info') {
		if (isset($_POST['submit'])) {
			// echo "string";
			$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
			$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
			$email = mysqli_real_escape_string($con, $_POST['email']);
			$phone = mysqli_real_escape_string($con, $_POST['phone']);

			// echo $firstname;
			// echo $lastname;
			// echo $email;
			// echo $phone;
			if (empty($firstname) || empty($lastname) || empty($email) || empty($phone)) {
				$msg = 'All fields are required';
				header('location: ../my_insure.php?msg=$msg');
				exit();
			} else {
				$sql = mysqli_query($con, "UPDATE `logins` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`phone`='$phone' WHERE `email` = '$email'");
				if ($sql) {
					$msg = "Information update successfuly";
					header("location: ../my_insure.php?msg=$msg");
					exit();
				} else {
					$msg = "All fields are required";
					header("location: ../my_insure.php?msg=$msg");
					exit();
				}
			}
		}
	}

	// vehicle info update handler
	if (@$_GET['operation'] == 'update_vehicle') {
		if (isset($_POST['submit'])) {
			// $name = $_POST['name'];
			// $model = $_POST['model'];
			// $type = $_POST['type'];
			// $color = $_POST['name'];
			// $plate = $_POST['plate'];
			// $seats = $_POST['seat'];
			// $picture = $_POST['picture'];
			// $name = $_POST['name'];
			// $name = $_POST['name'];

			$name = mysqli_real_escape_string($con, $_POST['name']);
			$model = mysqli_real_escape_string($con, $_POST['model']);
			$type = mysqli_real_escape_string($con, $_POST['type']);
			$color = mysqli_real_escape_string($con, $_POST['color']);
			$plate = mysqli_real_escape_string($con, $_POST['plate']);
			$seats = mysqli_real_escape_string($con, $_POST['seat']); //echo $seats;

			if (empty($name) || empty($model) || empty($type) || empty($color) || empty($plate)) {
				$msg = 'All fields are required';
				$cssClass = 'alert-danger';
				header("location: my_insure.php?msg=$msg&cssClass=$cssClass");
				exit();
			} else {
				if(isset($_FILES["picture"])){
		            $picture = $_FILES["picture"]['name'];
		            if($_FILES["picture"]["name"] === 4) {
		                // echo "<script> alert('Image Does Not Exits'); <scritp>";
		                $msg = 'Image Does Not Exits';
		                $cssClass = 'alert-danger';
		                header("location ../details.php?msg=$msg&cssClass=$cssClass");
		                exit();
		            } else {
		                $picture = $_FILES["picture"]['name'];
		                $pictureSize = $_FILES["picture"]['size'];
		                $tmpName = $_FILES["picture"]['tmp_name'];

		                // create extension array for accepted file format
		                $pictureValidExtension = ['jpg', 'jpeg', 'png'];
		                $pictureExtension = explode('.', $picture);
		                $pictureExtension = strtolower(end($pictureExtension));

		                // check to see if selected is in the accepted file format extension array
		                if(!in_array($pictureExtension, $pictureValidExtension)) {
		                    // echo "<script> alert('Unsupported File Format'); <scritp>";
		                    $msg = 'Unsupported File Format. please try again';
		                    $cssClass = 'alert-danger';
		                    header("location ../details.php?msg=$msg&cssClass=$cssClass");
		                    exit();
		                    // echo $msg;
		                } else if($pictureSize > 3000000){ // check if profile pic is larger than 3mb
		                    $msg = 'Image Size Is Too Large. please try again';
		                    $cssClass = 'alert-danger';
		                    header("location ../details.php?msg=$msg&cssClass=$cssClass");
		                    exit();
		                    // echo $msg;
		                } else {
		                    $pictureName = uniqid(); // give profile pic a unique name
		                    $pictureName .= '.' . $pictureExtension;
		                    // $pictureName = time() . '_' . $picture;
		                    $target = 'img/' . $pictureName;
		                    // echo $target;

		                    //$sql = "UPDATE `userstable` SET `profile_pic`='$target' WHERE email = '$email'";
		                    // mysqli_query($con, $sql);
		                    //     move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $target);
		                    //$sql = mysqli_query($con, "SELECT `email` FROM personal WHERE `email` = '$email'");
							// if (mysqli_num_rows($sql) > 0) {
							// 	header("location: ../details.php?page=vehicle");
							// 	exit();
							// } else {
							// $sql = mysqli_query($con, "INSERT INTO `personal`(`house_no`, `kin`, `rel_kin`, `licence`, `occupation`, `disability`, `picture`, `insure_no`, `email`) VALUES ('$houseNo','$kin','$relationship','$licence','$occupation','$disability','$target','$insurNo','$email')");
							$sql = mysqli_query($con, "UPDATE `vehicles` SET `name`='$name',`model`='$model',`type`='$type',`plate_no`='$plate',`color`='$color',`seat_capa`='$seats',`img`='$target' WHERE `insure_no` = '$insurNo'");
							if ($sql) {
		                        move_uploaded_file($_FILES["picture"]['tmp_name'], '../' . $target);
								$msg = 'Your vehicle information is updated successfully';
								$cssClass = 'alert-success';
								header("location: ../my_insure.php?msg=$msg&cssClass=$cssClass");
		                        exit();
		                    } else {
				                $msg = 'Unabel to update your vehicle information';
								$cssClass = 'alert-success';
								header("location: ../my_insure.php?msg=$msg&cssClass=$cssClass");
								exit();
		                    }
		                }
		            }
				}else{ 
					$sql = mysqli_query($con, "UPDATE `vehicles` SET `name`='$name',`model`='$model',`type`='$type',`plate_no`='$plate',`color`='$color',`seat_capa`='$seats' WHERE `insure_no` = '$insurNo'");
					if($sql){
						$msg = 'Your vehicle information is updated successfully';
						$cssClass = 'alert-success';
						header("location: ../my_insure.php?msg=$msg&cssClass=$cssClass");
						exit();
					} else {
						$msg = 'Unabel to update your vehicle information';
						$cssClass = 'alert-success';
						header("location: ../my_insure.php?msg=$msg&cssClass=$cssClass");
						exit();
					}
		        }
			}
		}
	}

	