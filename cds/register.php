<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a connection to the MySQL database (you should replace these values with your database details)
    $db_host = "Localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "userdb";

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    if ($conn == true) {
        echo "Success";
    }
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user input
    $username = $_POST["register-username"];
    $password = $_POST["register-password"];
    $confirmPassword = $_POST["confirm-password"];

    // Validate input (you should add more validation)
    if ($password === $confirmPassword) {
        // Check if the username is unique
        $check_query = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($check_query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 0) {
            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user into the database
            $insert_query = "INSERT INTO users (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("ss", $username, $hashed_password);

            if ($stmt->execute()) {
                echo "Registration successful!";
            } else {
                echo "Registration failed.";
            }
        } else {
            echo "Username already exists. Please choose a different username.";
        }
    } else {
        echo "Passwords do not match.";
    }

    $stmt->close();
    $conn->close();
}
?>
