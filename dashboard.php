<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Admin Page</h1>

    <h2>Reservation Requests</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Number</th>
            <th>Subject</th>
            <th>Availability</th>
            <th>Photographer</th>
            <th>Message</th>
        </tr>
        <?php
            // Include the file containing your database connection code
            require_once 'includes/connect.php';

            $sql_pending = "SELECT * FROM reservations";
            $result_pending = $conn->query($sql_pending);

            // Check if any rows were returned
            if ($result_pending->num_rows > 0) {
                // Loop through each row
                while ($row = $result_pending->fetch_assoc()) {
                    // Assign values to variables
                    $name = $row["name"];
                    $email = $row["email"];
                    $number = $row["number"];
                    $subject = $row["subject"];
                    $availability = $row["availability"];
                    $photographers = $row["photographer_id"];
		            $message = $row["message"];

                    // Display the data in table rows
                    echo "<tr>";
                    echo "<td>$name</td>";
                    echo "<td>$email</td>";
                    echo "<td>$number</td>";
                    echo "<td>$subject</td>";
                    echo "<td>$availability</td>"; // Displaying availability
                    echo "<td>$photographers</td>"; // Displaying photographers
                    echo "<td>$message</td>";
                    echo "</tr>";
                }
            } else {
                // If no rows were returned, display a message in a single row
                echo "<tr><td colspan='7'>No data available</td></tr>";
            }
            ?>
    </table>

    <a href="index.html" class="btn">Back to Website</a>
</body>
</html>