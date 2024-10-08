<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validar que los campos no estén vacíos
    if (!empty($name) && !empty($email) && !empty($message)) {
        $to = "romeroresek@gmail.com";
        $subject = "New Message from Website Contact Form";
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email";

        // Enviar el correo
        if (mail($to, $subject, $body, $headers)) {
            echo "<script>alert('Message successfully sent');</script>";
        } else {
            echo "<script>alert('Failed to send message. Please try again later.');</script>";
        }
    } else {
        echo "<script>alert('All fields are required. Please fill out the form completely.');</script>";
    }
} else {
    // Redirigir si se intenta acceder directamente al script
    header("Location: contact.html");
    exit();
}
?>
