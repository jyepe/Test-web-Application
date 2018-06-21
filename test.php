<?php

	function creatLayoutHTML()
	{
				echo "<table style='width: 100%; border: 1px solid black;' >
					<tr>
						<th style='border: 1px solid black;'>Address</th>
						<th style='border: 1px solid black;'>City</th>
						<th style='border: 1px solid black;'>State</th>
						<th style='border: 1px solid black;'>Zip</th>
						<th style='border: 1px solid black;'>Country</th>
					</tr>";
	}

?>




<?php

	//What the form passes to php file
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$type = $_POST["businessType"];
	$compName = $_POST["compName"];
	$address = $_POST["address"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zip = $_POST["zip"];
	$country = $_POST["country"];
	
	

	//Info to connect to DB
	$servername = "localhost";
	$username = "jyepe";
	$password = "9373yepe";
	$dbname = "userDB";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) 
	{
	    die("Connection failed: " . $conn->connect_error);
	}
	

	$sql = "INSERT INTO USER (FIRST_NAME, LAST_NAME, PHONE, EMAIL, ADDRESS, CITY, STATE, ZIP, COUNTRY, COMPANY_NAME, BUSINESS_TYPE) 
						VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


	$stmt = $conn->prepare($sql);

	

	$stmt->bind_param("sssssssssss", $firstName, $lastName, $phone, $email, $address, $city, $state, $zip, $country, $compName, $type);
	

	$stmt->execute();

	$stmt->close();
	$conn->close();
	
	
?>



<?php
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) 
	{
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT ADDRESS, CITY, STATE, ZIP, COUNTRY FROM USER";

	$result = $conn->query($sql);


	if ($result->num_rows > 0) 
	{
		$data = $result->fetch_assoc();
		$theaddy = $data['ADDRESS'];
		creatLayoutHTML();
		

    	// output data of each row
	    while($row = $result->fetch_assoc()) 
	    {
	    	echo "<tr ondblclick='editValue();'>";
			echo "<td style='border: 1px solid black;'>" . $row['ADDRESS'] . "</td>";
			echo "<td style='border: 1px solid black;'>" . $row['CITY'] . "</td>";
			echo "<td style='border: 1px solid black;'>" . $row['STATE'] . "</td>";
			echo "<td style='border: 1px solid black;'>" . $row['ZIP'] . "</td>";
			echo "<td style='border: 1px solid black;'>" . $row['COUNTRY'] . "</td>";
			echo "</tr>";
	    }
	} 
	else 
	{
	    echo "0 results";
	}

	echo "</table>";

	$conn->close();
?>





<script type="text/javascript">

	function editValue()
	{
		window.location.href = "home.html";
	}

</script>