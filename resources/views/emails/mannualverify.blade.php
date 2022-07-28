<!DOCTYPE html>
<html>
<body style="background:#f8f9fa;padding:35px 15px;">
<table align="center" border="0" cellpadding="0" cellspacing="0" style="max-width: 600px;width:100%;background:#ffffff;border: 1px solid #e6e6e6;color:#222222;text-align:center;">
    <tr>
        <td style="padding-top: 30px;">
        </td>
    </tr>
    <tr>
        <td style="background:#f8f9fa;padding:25px 15px 30px;">
            <p style="font-size: 14px;font-weight: bold;margin: 0 0 20px;">Hi </p>
            <p style="font-size: 18px;line-height: 1.8;margin: 0 0 30px;">{{ isset($details['subject']) ? $details['subject'] : '' }}<br />
                {{isset($details['message']) ? $details['message'] : ''}}<br/>
        </td>
    </tr>
</table>
</body>
</html>
