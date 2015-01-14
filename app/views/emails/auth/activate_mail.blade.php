<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Welcome to Ubinion!</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<table align="center" cellpadding="0" cellspacing="0" width="100%" style="border: 1px solid #cccccc;">
			<tr>
				<td bgcolor="#1a202c" style="padding: 25px 0 25px 0;" align="center">
					<img src="logo_email.png" alt="Logo_Ubinion" width="250px" height="61px"/>
				</td>
			</tr>
			<tr>
				<td bgcolor="#f3f3f3" style="padding: 40px 30px 40px 30px;">
				 	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="font-family: Arial, sans-serif; font-size: 17px; border: 1px solid #cccccc; background-color: #fff ">
						<tr>
						   	<td style="text-transform:uppercase; padding:15px 0 0 15px;">
						   		Dear {{ $name }},
						   	</td>
						</tr>
						<tr>
						   	<td style="padding:15px 0 15px 15px;">
						   		<strong>Thank you for registering on Ubinion.com!</strong>
						   	</td>
						</tr>										 		
					  	<tr>
						   <td style="font-family: Arial, sans-serif; font-size: 17px; padding:0 0 15px 15px;">
						    	To activate your account, please click the link below.
					  	</tr>
					  	<tr>
						   <td style="padding:0 0 15px 15px;">
						    	{{ $link}}
						   </td>
					  	</tr>
				 	</table>	
				</td>
			</tr>
			<tr>
			  	<td bgcolor="#f3f3f3" style="font-family: Arial, sans-serif; font-size: 15px; color:#ggg; padding:10px 0 10px 30px;">
			   	Ubinion &copy; <?PHP echo date("Y"); ?> | <a href="https://www.facebook.com/ubinion" style="text-decoration:none"> Facebook</a>
			  	</td>
			</tr>
		</table>	
	</body>
</html>