<?php
require "connect.php";

if (isset($_GET["CustomerID"])) {
    $cid = $_GET["CustomerID"];
    $sql = "SELECT * FROM customer WHERE CustomerID = :CustomerID ";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':CustomerID', $cid);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        echo $row['CustomerID'] . ' ' . $row['Name'] . "<br/>";
    }

    $conn = null;
}
