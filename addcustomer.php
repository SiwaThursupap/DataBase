<html>

<head>
    <title>User Registration11</title>
</head>

<body>
    <h1>Add Customer</h1>
    <form action="addcustomer.php" method="POST">

        <input type="text" placeholder="Enter Customer ID" name="CustomerID">
        <br> </br>

        <input type="text" placeholder="Enter Your Name" name="Name">
        <br> </br>

        Enter Your Birth Date <br>
        <input type="date" name="Birthdate">
        <br> </br>

        <input type="email" placeholder="Enter Your Email" name="Email">
        <br> </br>

        <input type="text" placeholder="Enter Your Country Code" name="CountryCode">
        <br> </br>

        <input type="number" placeholder="Enter Your OutStandingDebt" name="OutstandingDebt">
        <br> </br>

        <input type="submit">

    </form>
</body>

</html>

<?php
if (isset($_POST['CustomerID']) && isset($_POST['Name'])) {

    echo "<br>" .
        $_POST['CustomerID'] .
        $_POST['Name'] .
        $_POST['Birthdate'] .
        $_POST['Email'] .
        $_POST['CountryCode'] .
        $_POST['OutstandingDebt'];

    require 'connect.php';

    $sql = "insert into customer values (:CustomerID, :Name, :Birthdate, :Email, :CountryCode, :OutstandingDebt)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':CustomerID', $_POST['CustomerID']);
    $stmt->bindParam(':Name', $_POST['Name']);
    $stmt->bindParam(':Birthdate', $_POST['Birthdate']);
    $stmt->bindParam(':Email', $_POST['Email']);
    $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
    $stmt->bindParam(':OutstandingDebt', $_POST['OutstandingDebt']);

    if ($stmt->execute()) :
        $message = 'Successfully add new customer';
    else :
        $message = 'Fail to add new customer';
    endif;
    echo $message;
}
$conn = null;
?>