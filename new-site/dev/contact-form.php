<?php
/* set email recipient */
  $myemail= 'iam@websimplifyd.com';

/* check all form inputs using check_input function */
  $name   = check_input($_POST['name'], 'Required');
  $email  = check_input($_POST['email'), 'Required');
  $phone  = check_input($_POST['tel']);
  $date   = check_input($_POST['date']);
  $time   = check_input($_POST['time']);
  $comment= check_input($_POST['comment']);
  $confirm= check_input($_POST['confirm'], 'Required');


/* prepare message for email delivery */
$message = "Hello!

Your contact form has been submitted by:

  Name: $name
  Email: $email
  Phone: $phone

 Appointment requested for:

   Day: $date
   Time: $time

  Additional Comments from $name: $comment

 End of message
 ";

 /* send the message using mail() function */
 mail($myemail, $subject)

/* redirect visitor to thank you page */
header('Location: thank-you.html');

/* functions used for cleaning and handling errors */
function check_input($data, $problem='')
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  if ($problem && strlen($data) == 0)
  {
    show_error($problem);
  }
  return $data;
}

function show_error($myError)
{
?>
  <html>
  <body>
    <p>Please correct the following errors</p>
    <p><?php echo $myError; ?></p>
  </body>
  </html>
<?php
  exit();
}
?>
