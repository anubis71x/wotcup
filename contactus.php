<?php
require('conf/variables.php');
require('top.php');

$sent = $_GET['sent'];
if ( $sent == "sent" ) {
	echo "<font color=\"blue\">Message sent successfully</font><br>";
}
else if ( $sent == "fail" ) {
        echo "<font color=\"red\">Message failed to send! </font><br>";
}
if ( isset($_POST['submit']) ) {
	//initialize variables from the input form
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	//$organization = $_POST['organization'];
	//$phoneNumber = $_POST['phoneNumber'];
	//set receipient address
	$to = "LadderWoTConsole@gmail.com";
	$subject = "Mail from WoT Ladder Contact Form";

	//Set from name
	$from_header = "From: $name";

	if($message != "") {

	 //Add form info to the message
   		if ($name != "") {
        		$content = "From: $name \n";
			$content = "Email: $email \n";
    		}
		$content .= $message;	
		mail($to, $subject, $content, $from_header);
		echo "Message recieved by $adminemail <br> <a href=index.php>Go Home?</a>";
		
	} else {
    		echo "Your message seems to have failed, check to make sure you typed one!<br> <a href=contactus.php>Try again?</a>";
	}
} else {
?>
<form method="POST">

		<h2>Contact us</h2>
<table class="content" cellSpacing="5" cellPadding="0" border="0">
  <tbody>
	<tr valign="middle">

                <td colspan=2>
	 <font face="arial" size="1" color="red">Required items 
indicated with *.</font>
                </td>
      </tr>
    	<tr>
			<td><p>Name:</p></td>
			<td>
            <input type=text name="name" size=35  value="" 
maxlength=100>  
			</td>

    	</tr>
		<tr>
			<td><p>Email:</p></td>
			<td>
            <input type=text name="email" size=35  value="" 
maxlength=100>  
			</td>
    	</tr>
    	<tr>
			<td><p>Question or Comment:<font face="arial" 
size="2" color="red">*</font></p></td>

         <td>
            <textarea cols="35" rows="6" name="message"></textarea>   
         </td>
    	</tr>
	<tr>
		<td>&nbsp; </td>
		<td>
		    <input class="button" name="submit" type="submit" value="Send" 
name="update">

		</td>
		<td>&nbsp;</td>
	</tr>
  </tbody>
</table>

<?php
}
require('bottom.php');
?>