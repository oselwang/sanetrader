<head></head>

<body>
<div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:'Helvetica Neue',Arial,sans-serif;text-align:left;">
    <center>
        <table style="width:550px;text-align:center">
            <tbody>
            <tr>
                <td colspan="2" style="padding:30px 0;">
                    <p style="color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;">Hi {{$name}}.</p>
                    <p style="margin:0 10px 10px 10px;padding:0;">Kami hanya ingin memberitahukan bahwa <i>premium membership</i> anda akan habis pada tanggal <b>{{\Carbon\Carbon::parse($expired_premium_membership_date)->toDateString()}}</b></p>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding:30px 0 0 0;border-top:1px solid #e9edee;color:#9b9fa5">
                    Jika kamu mempunyai pertanyaan silahkan kontak kita ke <a style="color:#666d74;text-decoration:none;" href="mailto:samuelwidjaya@windowslive.com" target="_blank">samuelwidjaya@windowslive.com</a>
                </td>
            </tr>
            </tbody>
        </table>
    </center>
</div>
</body>