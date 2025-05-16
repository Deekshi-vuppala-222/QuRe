<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a connection to the MySQL database (you should replace these values with your database details)
    $db_host = "Localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "userdb";

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user input
    $username = $_POST["login-username"];
    $password = $_POST["login-password"];

    // Validate input (you should add more validation)
    
    // Retrieve the stored hashed password from the database
    $query = "SELECT password FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];

        // Verify the password against the stored hash
        if (password_verify($password, $hashed_password)) {
            header("Location: indexx.html");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>
