<?php 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $db = "test-db";
 $con = mysqli_connect($servername, $username, "", $db);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

echo "ananda";
echo "<br />";

$query = mysqli_query($con, "select * from enquiry_backup");
echo mysqli_num_rows($query);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $lead_source = $row["lead_source"];

     echo $enquiry_date = $row["enquiry_date"];

     if(strpos($name, "'") !== FALSE){
         $name = str_replace("'", "", $name);
     }

    if(strpos($phone, "'") !== FALSE){
        $phone = str_replace("'", "", $phone);
    }

    if(strpos($email, "'") !== FALSE){
        $email = str_replace("'", "", $email);
    }
    if(strpos($lead_source, "'") !== FALSE){
         $lead_source = str_replace("'", "", $lead_source);
     }
    

    $secondQuery = mysqli_query($con, "insert into enquiries(account_id,name,customer_type_id,lead_source_id,is_enquiry,proposed_transaction_date,enquiry_date,phone,email,created_at,updated_at,lead_source) 
    values('2','$name','4','1','1','$enquiry_date','2019-02-21','$phone','$email','2019-02-21','2019-02-21','$lead_source')") OR die("Error:".mysqli_error($con));
    if ($secondQuery) {
        echo $row["id"] . " = "."success</br>" . mysqli_connect_error(intl_get_error_message($con));
    } else {
        echo $row["id"] . " = ".mysqli_error($con) . " not successful</br>";
    }
}


?>

