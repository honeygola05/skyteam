<?php
include('include/connection.php');

if (isset($_POST['newsletter'])) {
    $email = $_POST['email'];

    $sql = "INSERT INTO `newsletter`(`email`) VALUES ('$email')";
    $res = mysqli_query($con, $sql);
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

if (isset($_POST['contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject1 = $_POST['subject'];
    $message1 = $_POST['message'];

    $sql = "INSERT INTO `contact`(`name`, `email`, `phone`, `subject`, `message`) VALUES ('$name', '$email', '$phone', '$subject1', '$message1')";
    $res = mysqli_query($con, $sql);

//     $to = "chetanprakashjewels@gmail.com";
//     $subject = "New Query On CP Real Diamonds Nagpur";

//     $message = "
// <html>
// <head>
// <title>Enquiry</title>
// </head>
// <body>
// <p>New Query On CP Real Diamonds Nagpur</p>
// <table>
// <tr>
//     <th>Name</th>
//     <th>Email</th>
//     <th>Phone</th>
//     <th>Subject</th>
//     <th>Message</th>
// </tr>
// <tr>
//     <td>$name</td>
//     <td>$email</td>
//     <td>$phone</td>
//     <td>$subject1</td>
//     <td>$message</td>
//     <td>Doe</td>
// </tr>
// </table>
// </body>
// </html>
// ";

    // Always set content-type when sending HTML email
    // $headers = "MIME-Version: 1.0" . "\r\n";
    // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    // $headers .= 'From: info@cprealdiamonds.com' . "\r\n";
    // $headers .= 'Cc: myboss@example.com' . "\r\n";

    // $mail = mail($to, $subject, $message, $headers);
    // if ($mail) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    // }
}
