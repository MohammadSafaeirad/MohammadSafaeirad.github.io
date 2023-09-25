

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username'], $_POST['email'], $_POST['subject'], $_POST['contact_message'])) {
        $name = $_POST['username'];
        $visitor_email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['contact_message'];

        $email_from = "mohammad.ml";
        $email_subject = "New form submission.";
        $email_body = "User name: $name.\n" .
            "User email: $visitor_email.\n" .
            "User subject: $subject.\n" .
            "User message: $message.\n";

        $to = "m.safaei81@hotmail.com";

        $headers = "From: $email_from \r\n";
        $headers .= "Reply-To: $visitor_email \r\n";

        if (mail($to, $email_subject, $email_body, $headers)) {
            header("Location: index.html");
            exit; // Stop script execution after redirection
        } else {
            echo "Failed to send email. Please try again later.";
        }
    }
}
?>

