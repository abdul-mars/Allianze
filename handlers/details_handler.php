<?php session_start();
	require_once '../includes/database.php';
	$email = $_SESSION['email'];

	// personal info handler
	if (@$_GET['operation'] == 'user_info') {
		if (isset($_POST['submit'])) {
			// echo "string";
			$kin = $_POST['kin'];
			$relationship = $_POST['relationship'];
			$houseNo = $_POST['houseNo'];
			$licence = $_POST['licence'];
			$occupation = $_POST['occupation'];
			$disability = $_POST['disability'];
			// $picture = $_FILES['picture'];

			$relationship = mysqli_real_escape_string($con, $relationship);
			$kin = mysqli_real_escape_string($con, $kin);
			$houseNo = mysqli_real_escape_string($con, $houseNo);
			$licence = mysqli_real_escape_string($con, $licence);
			$occupation = mysqli_real_escape_string($con, $occupation);
			$disability = mysqli_real_escape_string($con, $disability);
			// $insurNo = 'VI-'.rand('111111111', '999999999');

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
	                    $sql = mysqli_query($con, "SELECT `email` FROM personal WHERE `email` = '$email'");
						// if (mysqli_num_rows($sql) > 0) {
						// 	header("location: ../details.php?page=vehicle");
						// 	exit();
						// } else {
						// $sql = mysqli_query($con, "INSERT INTO `personal`(`house_no`, `kin`, `rel_kin`, `licence`, `occupation`, `disability`, `picture`, `insure_no`, `email`) VALUES ('$houseNo','$kin','$relationship','$licence','$occupation','$disability','$target','$insurNo','$email')");
						$sql = mysqli_query($con, "UPDATE `personal` SET `house_no`='$houseNo',`kin`='$kin',`rel_kin`='$relationship',`licence`='$licence',`occupation`='$occupation',`disability`='$disability',`picture`='$target' WHERE `email` = '$email'");
						if ($sql) {
	                        move_uploaded_file($_FILES["picture"]['tmp_name'], '../' . $target);
							$msg = 'Your personale information is save successfully';
							$cssClass = 'alert-success';
							header("location: ../details.php?page=vehicle&msg=$msg&cssClass=$cssClass");
	                        exit();
	                    } else {
			                $msg = 'Unabel to save your personal information';
							$cssClass = 'alert-success';
							header("location: ../details.php?msg=$msg&cssClass=$cssClass");
							exit();
	                    }
	                }
	            }
			}else{ 
				$sql = mysqli_query($con, "INSERT INTO `personal`(`house_no`, `kin`, `rel_kin`, `licence`, `occupation`, `disability`, `insure_no`, `email`) VALUES ('$houseNo','$kin','$relationship','$licence','$occupation','$disability','$insurNo','$email')");
				if($sql){
					$msg = 'Your personale information is save successfully';
					$cssClass = 'alert-success';
					header("location: ../details.php?page=vehicle&msg=$msg&cssClass=$cssClass");
					exit();
				} else {
					$msg = 'Unabel to save your personal information';
					$cssClass = 'alert-success';
					header("location: ../details.php?msg=$msg&cssClass=$cssClass");
					exit();
				}
	        }
		}
	}
                
                
          

	// company info handler
	if (@$_GET['operation'] == 'company_info') {
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$man = $_POST['manager'];
			$driName = $_POST['driver'];
			$location = $_POST['location'];
			$driLin = $_POST['licence'];
			$driDis = $_POST['driDis'];

			// clean inputs
			$name = mysqli_real_escape_string($con, $name);
			$man = mysqli_real_escape_string($con, $man);
			$driDis = mysqli_real_escape_string($con, $driDis);
			$driName = mysqli_real_escape_string($con, $driName);
			$location = mysqli_real_escape_string($con, $location);
			$driLin = mysqli_real_escape_string($con, $driLin);

			$sql = mysqli_query($con, "SELECT `email` FROM `company` WHERE `email` = '$email'");
			if (mysqli_num_rows($sql) == 0) {
				header("location: ../details.php?page=vehicle");
				exit();
			} else {
				$sql = mysqli_query($con, "UPDATE `company` SET `comp_name`='$name',`Man_name`='$man',`location`='$location',`dri_name`='$driName',`dri_linc`='$driLin',`dri_dis`='driDis' WHERE `email` = '$email'");
				if ($sql) {
					header("location: ../details.php?page=vehicle");
					exit();
				}
			}
		}
	}

	// vehicles handler
	if (@$_GET['operation'] == 'vehicles') {
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$type = $_POST['type'];
			$plate = $_POST['plate'];
			$model = $_POST['model'];
			$color = $_POST['color'];
			$capacity = $_POST['capacity'];

			$name = mysqli_real_escape_string($con, $name);
			$model = mysqli_real_escape_string($con, $model);
			$type = mysqli_real_escape_string($con, $type);
			$plate = mysqli_real_escape_string($con, $plate);
			$color = mysqli_real_escape_string($con, $color);
			$capacity = mysqli_real_escape_string($con, $capacity);
			// $name = mysqli_real_escape_string($con, $name);
			
			// $sql = mysqli_query($con, "SELECT * FROM `personal` WHERE `email` = '$email'");
			// if (mysqli_num_rows($sql) > 0) {
			// 	$data = mysqli_fetch_assoc($sql);
			// } else {
			// 	$sql = mysqli_query($con, "SELECT * FROM `company` WHERE `email` = '$email'");
			// 	$data = mysqli_fetch_assoc($sql);
			// }

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
	                    $sql = mysqli_query($con, "SELECT `email` FROM personal WHERE `email` = '$email'");
						// if (mysqli_num_rows($sql) > 0) {
						// 	header("location: ../details.php?page=vehicle");
						// 	exit();
						// } else {
	                    $insurNo = $_SESSION['insurNo'];
						$sql = mysqli_query($con, "INSERT INTO `vehicles`(`name`, `model`, `type`, `plate_no`, `color`, `seat_capa`, `img`, `insure_no`) VALUES ('$name','$model','$type','$plate','$color','$capacity','$target','$insurNo')");
						if ($sql) {
	                        move_uploaded_file($_FILES["picture"]['tmp_name'], '../' . $target);
							$msg = 'Your vehicle information is save successfully';
							$cssClass = 'alert-success';
							header("location: ../index.php?msg=$msg&cssClass=$cssClass");
	                        exit();
	                    } else {
			                $msg = 'Unabel to save your vehicle information';
							$cssClass = 'alert-success';
							header("location: ../details.php?page=vehicle&msg=$msg&cssClass=$cssClass");
							exit();
	                    }
	                }
	            }
			}else{ 
				$sql = mysqli_query($con, "INSERT INTO `vehicles`(`name`, `model`, `type`, `plate_no`, `color`, `seat_capa`, `insure_no`) VALUES ('$name','$model','$type','$plate','$color','$capacity','$insurNo')");
				if($sql){
					$msg = 'Your vehicle information is save successfully';
					$cssClass = 'alert-success';
					header("location: ../index.php?msg=$msg&cssClass=$cssClass");
					exit();
				} else {
					$msg = 'Unabel to save your vehicle information';
					$cssClass = 'alert-success';
					header("location: ../details.php?page=vehicle&msg=$msg&cssClass=$cssClass");
					exit();
				}
	        }
			
			// $insurNo = $data['insure_no'];
			// $insurNo = $_SESSION['insurNo'];
			// $sql = mysqli_query($con, "SELECT * FROM `vehicles` WHERE `insure_no` = '$insurNo'");
			// if (mysqli_num_rows($sql) < 1) {
			// 	// echo $insurNo;
			// 	$sql = mysqli_query($con, "INSERT INTO `vehicles`(`name`, `model`, `type`, `plate_no`, `color`, `seat_capa`, `insure_no`) VALUES ('$name','$model','$type','$plate','$color','$capacity','$insurNo')");
			// 	if ($sql) {
			// 		// header("location: ../details.php?page=vehicle");
			// 		header("location: ../index.php");
			// 		exit();
			// 	}
			// 	exit();
			// } else {
			// 	header("location: ../details.php?page=vehicle");
			// 	header("location: ../index.php");
			// }
		}
	}