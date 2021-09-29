<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		.err{
			color: red;
		}
	</style>
</head>
<body>


	<?php
	// define variables and set to empty values

	$nameErr = $emailErr = $dobErr = $genderErr = $degreeErr = $bgErr"";
	$name = $email = $dob $gender = $degree = $bg = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["name"])) {
	    $nameErr = "Name is required";
	  } else {
	    $name = test_input($_POST["name"]);
	    // check if name only contains letters and whitespace
	    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
	      $nameErr = "Only letters and white space allowed";
	    }
	  }

	  if (empty($_POST["email"])) {
	    $emailErr = "Email is required";
	  } else {
	    $email = test_input($_POST["email"]);
	    // check if e-mail address is well-formed
	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	      $emailErr = "Invalid email format";
	    }
	  }

	  if (empty($_POST["date of birth"])) {
	    $dob = "";
	  } else {
	    $dob = test_input($_POST["dob"]);
	    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
	    if (!filter_var($dob, FILTER_VALIDATE_URL)) {
	      $dobErr = "Invalid URL";
	    }
	  }

	  if (empty($_POST["gender"])) {
	    $genderErr = "Gender is required";
	  } else {
	    $gender = test_input($_POST["gender"]);
	  }
	}


	  if (empty($_POST["degree"])) {
	    $degreeErr = "Gegree is required";
	  } else {
	    $degree = test_input($_POST["degree"]);
	  }
	}


	  if (empty($_POST["blood group"])) {
	    $bgErr = "blood group is required";
	  } else {
	    $bg = test_input($_POST["blood group"]);
	  }
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	?>



	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

		Name: <input type="text" name="name"><span class="err">*

			<?php 
			if (isset($nameErr)) {
				echo $nameErr; 
			}
			?>
		</span>
		<br>
		E-mail: <input type="text" name="email">
		<span class="err">*
		<?php 
			if (isset($emailErr)) {
				echo $emailErr; 
			}
			?>

				?>
		</span>
		<br>
		Date of birth: <input type="text" name="date of birth">
		<span class="err">*
		<?php 
			if (isset($dobErr)) {
				echo $dobErr; 
			}
			?>

		Gender:
		<input type="radio" name="gender" value="female">Female
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="other">Other
		<span class="err">*
		<?php 
			if (isset($genderErr)) {
				echo $genderErr; 
			}
			?>

		Degree:
		<input type="radio" name="degree" value="SSC">SSC
		<input type="radio" name="degree" value="HSC">HSC
		<input type="radio" name="degree" value="BSC">BSC
		<input type="radio" name="degree" value="MSC">MSC
		<span class="err">*
		<?php 
			if (isset($degreeErr)) {
				echo $degreeErr; 
			}
			?>

			Blood group:
           <input type="radio" name="blood group"
            <?php if (isset($bg) && $bg=="B+") echo "checked";?>
             value="B+">B+
			</span>
		<br>

  		<input type="submit" name="submitButton">
	</form>

	<?php 
	if (isset($_POST['submitButton'])) {
		echo "<h1>Your Input</h1>";

		echo $name . "<br>";
		echo $email . "<br>";
		echo $dob . "<br>";
		echo $gender . "<br>";
		echo $degree . "<br>";
		echo $bg . "<br>";
	}

	 ?>


</body>
</html>