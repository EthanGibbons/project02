<?php <form action="process_eoi.php">
if ($_SERVER["REQUEST_METHOD"] =="POST"){
    $jobReferenceNumber = sanitise_input[$_POST["number"]];
    $firstName = sanitise_input[$_POST["Firstname"]];
    $lastName = sanitise_input[$_POST["Lastname"]];
    $dateOfBirth = sanitise_input[$_POST["dob"]];
    $streetAddress = sanitise_input[$_POST["streetaddress"]];
    $Suburb = sanitise_input[$_POST["suburb"]];
    $State = sanitise_input[$_POST["state"]];
    $postCode = sanitise_input[$_POST["postcode"]];
    $Email = sanitise_input[$_POST["email"]];
    $phoneNumber = sanitise_input[$_POST["phonenumber"]];
    $requiredSkills = isset ($_POST("checkbox")) ? $_POST["checkbox"] : [];
    $otherSkills = sanitise_input[$_POST["description"]];
    

    //seperate validation before big one 
    if (empty($firstName)) {
      echo "First Name is required.<br>";
    }
    if (empty($lastName)) {
      echo "Last Name is required.<br>";
    }
    if (empty($dateOfBirth)) {
      echo "Date of Birth Name is required.<br>";
    }
    if (empty($streetAddress)) {
      echo "Street Address is required.<br>";
    }
    if (empty($Suburb)) {
      echo "Suburb is required.<br>";
    }
    if (empty($State)) {
      echo "State is required.<br>";
    }
    if (!postCode("/^[0-9]{4}$/", $postCode)) {
    echo "Please enter a valid Post Code.<br>";
    }
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format.<br>";
    }
    if (!phoneNumber("/^[0-9]{10}$/", $phoneNumber)) {
    echo "Please enter a valid Phone Number.<br>";
    }
    if (empty($requiredSkills)) {
      echo "Required Skills is required.<br>";
    }
    if (empty($otherSkills)) {
      echo "Other Skills is required.<br>";
    }
}
//if states for all not empty
if (!empty($firstName) && !empty($lastName) && !empty($dateOfBirth) &&  !empty($streetAddress) && !empty($Suburb) && !empty($State) &&  !empty($postCode) && !postCode("/^[0-9]{1}$/", $postCode) && !empty($Email) && !phoneNumber("/^[0-9]{1}$/", $phoneNumber) && !empty($requiredSkills) && !empty($otherSkills)) {
//display the results
echo "<h2>Your Form Results Have Been Submitted:</h2>";
echo "<p><strong>First Name:</strong> $firstName</p>";
echo "<p><strong>Last Name:</strong> $lastName</p>";
echo "<p><strong>Date of Birth:</strong> $dateOfBirth</p>";
echo "<p><strong>Street Address:</strong> $streetAddress</p>";
echo "<p><strong>Suburb:</strong> $Suburb</p>";
echo "<p><strong>State:</strong> $State</p>";
echo "<p><strong>Post Code:</strong> $postCode</p>";
echo "<p><strong>Email:</strong> $Email</p>";
echo "<p><strong>Phone Number:</strong> $phoneNumber</p>";
echo "<p><strong>Required Skills:</strong> " . implode(", ", $requiredSkills) . "</p>"; 
echo "<p><strong>Other Skills:</strong> $otherSkills</p>";



} else {
echo "Big Validation Did Not Work<br>";
}

function sanitise_input($data){//sanatizes input , to note get hacked
    $data= trim($data); // trim removes spaces before and after and trim and save again ontop the location of data
    $data= stripslashes($data); 
    $data = htmlspecialchars($data);//using this function to whatever user types evne if its code converted to normal text
    return $data;
}

?>
<?php
session_start();
require_once("settings.php");
$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
  error_log("Database connection failed: " . mysqli_connect_error());
    die("Database connection failed: ". mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $input_username = trim($_POST["username"]);
     $input_password = trim($_POST["password"]);
     
      // Sql for query to check if username and password are matching with the database
     $stmt +$conn ("SELECT users, password FROM users WHERE username = ?");
     $stmt->bind_param("s", $input_username);
     $stmt->execute();
     $result = $stmt->get_result();

     // if the username and password found

      if ($user = $result ->fetch_assoc()) {
          if (password_verify($input_password, $user["password"])) {
              session_regenerate_id(true); // regenerate session id to prevent session fixation

              
            // save the username and password in the session to know the user logged in
          $_SESSION["username"] = $user["username"];
          $_SESSION["password"] = $user["password"];
          // redirect to the jobs page
          header("Location: jobs.php");
          exit;
      } else {
          header ('Location: about.php');
          exit;
      }
    }
  }else {
    // if the username and password not found

    $_SESSION['error'] = "Invalid username or password" ;
    header("Location: login.php");
    exit();
  }
    ?>