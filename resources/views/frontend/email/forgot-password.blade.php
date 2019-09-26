<table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="30"></td>
                    <td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="font-family:Arial, Helvetica, sans-serif; font-size: 17px; color: #434b4d; text-transform:uppercase; font-weight:bold;">Dear User,</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td width="23" height="35">
                                                Reset your password, and we'll get you on your way.
                                                <br>
                                                To change your  password, click here or paste the following link into your browser: <a href="{{ env('APP_URL') }}/reset/{{$user->email}}/{{$code}}">Click here!</a></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="30"></td>
                </tr>
            </table>
