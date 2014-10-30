<?php 
//$verifyUrl = base_url('users/verifyidentity/?key='.base64_encode($row->email));
$verifyUrl = $this->config->item('front_url').'users/verifyidentity/?key='.base64_encode($row->last_name); ?>

<!-- Hi,
<?php echo $row->first_name;?>
You have been notified that your successfully Register in Our site

Email Id : <?php echo $row->email;?> 
but you cant login before verify your identity for verify identity click <a href="<?php echo $verifyUrl; ?>">here</a> 

Thank you for using our services!

With Regards
Waddress Team
 -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mail Conformation- W-address Team</title>
<style>
a{color:#1155CC;}
</style>
</head>
<body>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #CCCCCC">
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="padding-left:15px; padding-top:17px; border-top:4px solid #000"><img src="<?=base_url('assets/images/logo.png');?>" width="195" height="43" /></td>
      </tr>
      <tr><td height="30"></td></tr>
      <tr>
        <td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#222; line-height:18px; padding:0 25px;">
      Hi <strong><?php echo ucfirst($row->first_name);?></strong>,<br /><br />
      Welcome to W-Address!!<br /><br />
      You have been notified that your successfully register(by Admin) in our site. 
	  <br/>
      Email :- <strong><?php echo $row->email;?></strong>
      <br/><br/>
     	You have to verify your mail for activate your account.<a href="<?php echo $verifyUrl; ?>">click here for Verify</a>
      <br/>Thank you for using our services!.<br />
      For any queries please refer to W-address Help<br /><br /><br />

	Best Regards<br />
	W-address Team <br /><br />
	<p style="text-align:center; margin:0px; font-size:11px; color:#999; padding-bottom:3px;">Copyrights <?=date('Y')?> W-Address.com All Rights Reserved.</p>
      </td></tr>
	</table>
	</td>
  </tr>
</table>
</body>
</html>