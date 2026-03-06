<?php
require 'connect.php';

$sql_select = "select * from country order by CountryCode";
$stmt_s = $conn->prepare($sql_select);
$stmt_s->execute();
?>
<html>

<head>
    <title>User Registration11</title>
</head>

<body>
    <h1>Add Customer but not in order of columns</h1>
    <form action="addcustomer_dropdownfull_swapinsert.php" method="POST">

        <input type="text" placeholder="Enter Customer ID" name="CustomerID">
        <br> </br>

        <input type="text" placeholder="Enter Your Name" name="Name">
        <br> </br>

        <input type="number" placeholder="Enter Your OutStandingDebt" name="OutstandingDebt">
        <br> </br>

        <input type="email" placeholder="Enter Your Email" name="Email">
        <br> </br>

        <input type="date" placeholder="Birthdate" name="Birthdate">
        <br> </br>

        <label> Select a country code </label>
        <select name="CountryCode">

            <?php
            require 'connect.php';

            while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)):;
            ?>
                <option value="<?php echo $cc["CountryCode"]; ?>">
                    <?php echo $cc["CountryName"]; ?>
                </option>
            <?php
            endwhile;
            ?>

        </select>
        <br> </br>

        <input type="submit" value="Submit" name="submit" />
    </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {

    if (!empty($_POST['CustomerID']) && !empty($_POST['Name'])) {

        $sql = "insert into customer (CustomerID,Name,CountryCode,OutstandingDebt,Email,Birthdate)
                values (:CustomerID, :Name, :CountryCode, :OutstandingDebt, :Email, :Birthdate)";

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
}
$conn = null;
?>