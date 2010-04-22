<?php
//medical_records.php - Responds to a request to create a new medical record
include_once("lib/connect.php"); //establish initial connection to database
//Validate the data we got before we try to insert it into the database
		$firstName = $_POST['firstName'];
		$middleName = $_POST['middleName'];
		$lastName = $_POST['lastName'];
		$address = $_POST['address'];
		$phoneNumber = $_POST['phoneNumber'];
		$dateOfBirth = $_POST['dateOfBirth'];
		$sex = $_POST['sex'];
		$hairColor = $_POST['hairColor'];
		$eyeColor = $_POST['eyeColor'];
		$ethnicity = $_POST['ethnicity'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$bloodType = $_POST['bloodType'];
		$allergies = $_POST['allergies'];
		$emergencyName = $_POST['emergencyName'];
		$emergencyNumber = $_POST['emergencyNumber'];
		$emergencyAddress = $_POST['emergencyAddress'];
		
		$errors = ""; //will keep a collection the fields that have errors in them
		
		//Check phone numbers format
		if (!strstr($phoneNumber, "-") == false || !strstr($phoneNumber, " ") == false || strlen($phoneNumber) != 10)
			$errors .= "phoneNumber";
		if (!strstr($emergencyNumber, "-") == false || !strstr($emergencyNumber, " ") == false || strlen($emergencyNumber) != 10)	
			$errors .= ",emergencyNumber";
			
		//Check the date format
		if (!strstr($dateOfBirth, "-") == false || !strstr($dateOfBirth, "/") == false || !strstr($dateOfBirth, " ") == false || strlen($dateOfBirth) != 8)
			$errors .= ",dateOfBirth";
		
		//TODO: REMOVE OR DISALLOW THE USE OF CHARACTERS THAT MUST BE ESCAPED, SUCH AS SINGLE QUOTES IN THE HEIGHT, ETC.
		if ( strlen($errors) < 1) {			
			//Now insert the data if it all looks correct
			$query = "INSERT INTO medicalRecords(firstName, middleName, lastName, address, phoneNumber,"
			 ." dateOfBirth, sex, hairColor, eyeColor, ethnicity, height, weight, bloodType, allergies,"
			 ." emergencyName, emergencyNumber, emergencyAddress) VALUES ('$firstName', '$middleName',"
			 ." '$lastName', '$address', '$phoneNumber', '$dateOfBirth', '$sex', '$hairColor',"
			 ." '$eyeColor', '$ethnicity', '$height', '$weight', '$bloodType', '$allergies', '$emergencyName', '$emergencyNumber', '$emergencyAddress')";

			$result = mysql_query($query);

			if ($result) //redirect back to the patientinfo page if all is well
				header("location: ../webui/patientinfo.php");
			else echo "ERROR, Could not create record in database.";
		}
		//Display the errors the user has and force the user to fix them before continuing
		else { 
			$error = explode(",", $errors);
			echo "<b>ERROR in processing the following field(s):</b> <br/>";
			for ($i=0; $i<= count($error); $i++)
				echo "<i>$error[$i] </i><br/>";
			echo "<b>Please use your browser's back button and correct this problem.</b>";
		}

//Wah
//Validate Medical History data we got before we try to insert it into the database
		$medicalConditions = $_POST['medicalConditions'];
		$medications = $_POST['medications'];
		$procedures = $_POST['procedures'];
		$visitDate = $_POST['visitDate'];
		
		$errors = ""; //will keep a collection the fields that have errors in them
	
		//Check the date format
		if (!strstr($dateOfBirth, "-") == false || !strstr($dateOfBirth, "/") == false || !strstr($dateOfBirth, " ") == false || strlen($dateOfBirth) != 8)
			$errors .= ",dateOfBirth";
		
		//TODO: REMOVE OR DISALLOW THE USE OF CHARACTERS THAT MUST BE ESCAPED, SUCH AS SINGLE QUOTES IN THE HEIGHT, ETC.
		if ( strlen($errors) < 1) {			
			//Now insert the data if it all looks correct
			
//PATIENT ID SHOULD BE GENERATED FROM THE MEDICAL RECORDS INSERT AND PROPOGATED INTO THE OTHER TABLES. IT SHOULDN'T BE ENTERED BY THE USER
			$query = "INSERT INTO medicalhistories(patientID, medicalConditions, medications, procedures, visitDate) VALUES ('$patientID', '$medicalConditions','$medications', '$procedures', '$visitDate')";

			$result = mysql_query($query);

			if ($result) //redirect back to the patientinfo page if all is well
				header("location: ../webui/patientinfo.php");
			else echo "ERROR, Could not create record in database.";
		}
		//Display the errors the user has and force the user to fix them before continuing
		else { 
			$error = explode(",", $errors);
			echo "<b>ERROR in processing the following field(s):</b> <br/>";
			for ($i=0; $i<= count($error); $i++)
				echo "<i>$error[$i] </i><br/>";
			echo "<b>Please use your browser's back button and correct this problem.</b>";
		}


//Wah
//Validate Healthcare Providers data we got before we try to insert it into the database

		$name = $_POST['name'];
        //this is a different phone numeber from patient one, it is healthcare' number
		$hthcarphoneNumber = $_POST['hthcarphoneNumber'];
		$referredBy = $_POST['referredBy'];
		
		$errors = ""; //will keep a collection the fields that have errors in them
	//Check phone numbers format
		if (!strstr($hthcarphoneNumber, "-") == false || !strstr($hthcarphoneNumber, " ") == false || strlen($hthcarphoneNumber) != 10)
			$errors .= "hthcarphoneNumber";
            
		//TODO: REMOVE OR DISALLOW THE USE OF CHARACTERS THAT MUST BE ESCAPED, SUCH AS SINGLE QUOTES IN THE HEIGHT, ETC.
		if ( strlen($errors) < 1) {			
			//Now insert the data if it all looks correct
			
//PATIENT ID SHOULD BE GENERATED FROM THE MEDICAL RECORDS INSERT AND PROPOGATED INTO THE OTHER TABLES. IT SHOULDN'T BE ENTERED BY THE USER
			$query = "INSERT INTO healthcareproviders(patientID, name, phoneNumber, referredBy) VALUES ('$patientID', '$name', '$phoneNumber', '$referredBy')";

			$result = mysql_query($query);

			if ($result) //redirect back to the patientinfo page if all is well
				header("location: ../webui/patientinfo.php");
			else echo "ERROR, Could not create record in database.";
		}
		//Display the errors the user has and force the user to fix them before continuing
		else { 
			$error = explode(",", $errors);
			echo "<b>ERROR in processing the following field(s):</b> <br/>";
			for ($i=0; $i<= count($error); $i++)
				echo "<i>$error[$i] </i><br/>";
			echo "<b>Please use your browser's back button and correct this problem.</b>";
		}

//Wah
//Wah
//Validate Insurance Company Information data we got before we try to insert it into the database

		$insuranceCompany = $_POST['insuranceCompany'];
		$policyNumber = $_POST['policyNumber']; //this is a different phone numeber from patient one, it is healthcare' number
		        
		$errors = ""; //will keep a collection the fields that have errors in them
	
                    
		//TODO: REMOVE OR DISALLOW THE USE OF CHARACTERS THAT MUST BE ESCAPED, SUCH AS SINGLE QUOTES IN THE HEIGHT, ETC.
		if ( strlen($errors) < 1) {			
			//Now insert the data if it all looks correct
			
//PATIENT ID SHOULD BE GENERATED FROM THE MEDICAL RECORDS INSERT AND PROPOGATED INTO THE OTHER TABLES. IT SHOULDN'T BE ENTERED BY THE USER
			$query = "INSERT INTO insuranceinfo(patientID, insuranceCompany, policyNumber) VALUES ('$patientID', '$insuranceCompany', '$policyNumber')";

			$result = mysql_query($query);

			if ($result) //redirect back to the patientinfo page if all is well
				header("location: ../webui/patientinfo.php");
			else echo "ERROR, Could not create record in database.";
		}
		//Display the errors the user has and force the user to fix them before continuing
		else { 
			$error = explode(",", $errors);
			echo "<b>ERROR in processing the following field(s):</b> <br/>";
			for ($i=0; $i<= count($error); $i++)
				echo "<i>$error[$i] </i><br/>";
			echo "<b>Please use your browser's back button and correct this problem.</b>";
		}
?>