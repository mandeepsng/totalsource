<!DOCTYPE html>
<html>
<body style="background:#f8f9fa;padding:35px 15px;">
<table align="center" border="0" cellpadding="0" cellspacing="0" style="max-width: 600px;width:100%;background:#ffffff;border: 1px solid #e6e6e6;color:#222222;text-align:center;">
    <tr>
        <td style="padding-top: 30px;">
            {!!isset($email_logo) ? '<img style="background: black;" width="150" src="'.$domain.'/uploads/globalimg/'.$email_logo.'">' : ''!!}
        </td>
    </tr>
    <tr>
        <td style="background:#f8f9fa;padding:25px 15px 30px;">
            <p style="font-size: 14px;font-weight: bold;margin: 0 0 20px;">Hi {!!isset($to_name) ? $to_name : ''!!},</p>
            <p style="font-size: 18px;line-height: 1.8;margin: 0 0 30px;">Welcome to Helloclinic.<br />
                You have successfully Registered.<br/>
                Please use below crenditials to login your Helloclinic Account.<br/>
                <strong style="font-size: 22px;">{!!isset($appointmentdate) ? date('d-m-Y',strtotime($appointmentdate)) : ''!!}</strong></p>
        </td>
    </tr>
    <tr>
        <td>
            <p style="font-size: 16px;text-align:center;">Company Name:- {{$compname}}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p style="font-size: 16px;text-align:center;">Company ID:- {{$companycode}}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p style="font-size: 16px;text-align:center;">Email :- {{$user_email}}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p style="font-size: 16px;text-align:center;">Password:- {{$user_password}}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p style="margin: 0 0 30px;">Thank you!</p>
        </td>
    </tr>
    <tr>
        <td>
            <p style="font-size: 16px;font-weight: bold;margin: 30px 0 25px;">Login Here</p>
            <p style="margin: 0 0 20px;"><a href="{!!(isset($home_url) ? $home_url : '')!!}" style="background:#00d0f1;border-radius: 4px;color:#ffffff;display:inline-block; font-size: 18px;max-width: 300px;    padding: 15px 5px;text-decoration: none;width: 85%;">Login</a></p>
            <p style="margin: 0 0 30px;">Thank you!</p>
        </td>
    </tr>
</table>
</body>
</html>
