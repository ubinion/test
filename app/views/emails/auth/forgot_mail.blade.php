<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html, image/html; charset=UTF-8" />
		<title>It's ok, it happens. Here is yours...</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>		
		<table align="center" cellpadding="0" cellspacing="0" width="100%" style="border: 0 solid #cccccc;">
			<tr>
				<td bgcolor="#1a202c" style="padding: 25px 0 25px 0;" align="center">
					<img src="http://test.ubinion.com/public/img/logo/logo_email.png" alt="Logo_Ubinion" width="250px" height="61px"/>
				</td>
			</tr>
			<tr>
				<td bgcolor="#f3f3f3" style="padding: 40px 30px 40px 30px;">
				 	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="font-family: Arial, sans-serif; font-size: 15px; border: 1px solid #cccccc; background-color: #fff ">
						<tr>
						   	<td style="text-transform:uppercase; padding:15px 0 0 15px;">
						   		Hello {{ $name }},
						   	</td>
						</tr>
						<tr>
						   	<td style="padding:15px 0 15px 15px;">
						   		<strong>Please click the link below to active the temporary password:</strong>
						   	</td>
						</tr>
					  	<tr>
						   <td style="padding:0 0 15px 15px;">
						    	<a href="{{ $link}}"> Click to active your account</a>
						   </td>
					  	</tr>																 		
					  	<tr>
						   <td style="font-family: Arial, sans-serif; font-size: 15px; padding:0 0 15px 15px;">
						    	Your New password is: <strong>{{ $password }}</strong>
						    </td>	
					  	</tr>
					  	<tr>
						   <td style="padding:15px 15px 15px 15px;">
						    	Best regards,<br/>
						    	The Ubinion Team
						   </td>
					  	</tr>						  	
				 	</table>	
				</td>
			</tr>
			<tr>
				<td bgcolor="#f3f3f3" style="font-family: Arial, sans-serif; font-size: 12px; padding:15px 30px 0 30px; text-align:justify;">
				Ubinion will never e-mail you and ask you to disclose or verify your password, credit card, or banking account number. If you receive a suspicious e-mail with a link to update your account information, do not click on the link, report the e-mail to ubinion.com
				for investigation. Please remember that your password is confidential, and should never be shared with others.	
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

