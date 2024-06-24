<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Order #1</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link` rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo Section -->
        <table>
            <tr>
                <td >
                    <img 
                        src="{{ Storage::url(core()->getConfigData('sales.invoice_settings.invoice_slip_design.logo')) }}" 
                        alt=""
                        style="height: 90.98px; width: 197px;"
                    />
                </td>
                <td>
                    <div style="margin-left: 50px;">
                        <div style="font-size: 18px; font-weight: 700; color: #CC035C; line-height: 16.8px; margin-top: 30px;">
                            Thank you for choosing Raemulan Lands Inc. for your reservation.
                        </div>

                        <div style="margin-top: 20px; font-size: 12px; font-weight: 400; line-height: 12px;">
                            We are looking forward to making your stay comfortable and enjoyable.
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <!-- Border -->
        <div style="margin-top: 30px; margin-bottom: 30px; border: 1px solid #D9D9D9;"></div>

        <!-- Reservation Details -->
        <div style="display: flex; justify-content: left; align-items: center; padding: 20px;  background: #FAF6F6; color: #CC035C; font-weight: 500; border-radius: 15px; font-size: 16px;">
            <span>Reservation Details:</span>
        </div>

        <table style="padding-left: 20px; padding-right: 20px; margin-bottom: 30px;">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div style="font-size: 16px; font-weight: 600; text-wrap: nowrap; margin-top:10px; line-height: 30px;">Reference Code</div>
                            </td>
                            <td>
                                <div style="font-size: 16px; font-weight: 400; text-wrap: nowrap; margin-top:10px; line-height: 30px;">JN-0989</div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div style="font-size: 16px; font-weight: 600; text-wrap: nowrap; line-height: 30px;">Name</div>
                            </td>
                            <td>
                                <div style="font-size: 16px; font-weight: 400; text-wrap: nowrap; line-height: 30px;">Charles Ley Baldemor</div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div style="font-size: 16px; font-weight: 600; text-wrap: nowrap; line-height: 30px;">Contact Number</div>
                            </td>
                            <td>
                                <div style="font-size: 16px; font-weight: 400; text-wrap: nowrap; line-height: 30px;">09478800962</div>
                            </td>
                        </tr>
                    </table>
                </td>

                <td>
                    <table>
                        <tr>
                            <td>
                                <div style="font-size: 16px; font-weight: 600; text-wrap: nowrap; margin-top:20px; line-height: 30px;">Project Name</div>
                            </td>
                            <td>
                                <div style="font-size: 16px; font-weight: 400; text-wrap: nowrap; margin-top:20px; line-height: 30px;">Zaya</div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div style="font-size: 16px; font-weight: 600; text-wrap: nowrap; line-height: 30px;">Unit Type</div>
                            </td>
                            <td>
                                <div style="font-size: 16px; font-weight: 400; text-wrap: nowrap; line-height: 30px;">Studio Unit</div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div style="font-size: 16px; font-weight: 600; text-wrap: nowrap; line-height: 30px;">Total Contract Price</div>
                            </td>
                            <td>
                                <div style="font-size: 16px; font-weight: 400; text-wrap: nowrap; line-height: 30px;">₱2,700,000.00</div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div style="font-size: 16px; font-weight: 600; text-wrap: nowrap; line-height: 30px;">Reservation Fee</div>
                            </td>
                            <td>
                                <div style="font-size: 16px; font-weight: 400; text-wrap: nowrap; line-height: 30px;">₱27,000.00</div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>


        <!-- Payment Details: -->
        <div style="display: flex; justify-content: left; align-items: center; padding: 20px;  background: #FAF6F6; color: #CC035C; font-weight: 500; border-radius: 15px; font-size: 16px;">
            <span>Payment Details:</span>
        </div>

        <table style="padding-left: 20px; padding-right: 20px; margin-bottom: 30px;">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div style="font-size: 16px; font-weight: 600; text-wrap: nowrap; margin-top:10px; line-height: 30px;">Mode of Payment</div>
                            </td>
                            <td>
                                <div style="font-size: 16px; font-weight: 400; text-wrap: nowrap; margin-top:10px; line-height: 30px;">QR PH</div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div style="font-size: 16px; font-weight: 600; text-wrap: nowrap; line-height: 30px;">Reservation Date</div>
                            </td>
                            <td>
                                <div style="font-size: 16px; font-weight: 400; text-wrap: nowrap; line-height: 30px;">January 1, 2023</div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div style="font-size: 16px; font-weight: 600; text-wrap: nowrap; line-height: 30px;">Payment Due Date</div>
                            </td>
                            <td>
                                <div style="font-size: 16px; font-weight: 400; text-wrap: nowrap; line-height: 30px;">January 6, 2023</div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div style="font-size: 16px; font-weight: 600; text-wrap: nowrap; line-height: 30px;">Amount to Pay</div>
                            </td>
                            <td>
                                <div style="font-size: 16px; font-weight: 400; text-wrap: nowrap; line-height: 30px;">P27,000.00</div>
                            </td>
                        </tr>
                    </table>
                </td>

                <td>
                    <table>
                        
                    </table>
                </td>
            </tr>
        </table>

        <!-- Border -->
        <div style="margin-top: 30px; margin-bottom: 30px; border: 1px solid #D9D9D9;"></div>

        <table>
            <tr>
                <td style="width: 40%; border-right: 2px solid #FCB115;">
                    <div style="font-size: 18px; font-weight: 600; text-wrap: nowrap; margin-bottom:10px;">Scan to pay</div>

                    <div>
                        <img height="200" width="250" src="{{ Storage::url(core()->getConfigData('sales.invoice_settings.invoice_slip_design.logo')) }}" alt="http://192.168.15.214/rli-bagisto/public/storage/theme/pdf-qr/QR-code.svg">
                    </div>
                </td>
                
                <td style="width: 60%; padding-left: 10px;">
                    <div style="font-size: 18px; font-weight: 600; text-wrap: nowrap;">
                        Heres how to pay
                    </div>

                    <div>
                        <p style="margin-top: 13px; font-size: 13px;">
                            1. Open your preferred banking or EMI mobile app and choose Transfer money or pay via QR. (Aub, GCash, Maya, RCBC, China Bank, Landbank, Union Bank, View More)
                        </p>
                        
                        <p style="margin-top: 13px; font-size: 13px;">
                            2. Scan your recipient’s QR Ph code and if asked by the app, type the amount to be sent.
                        </p>

                        <p style="margin-top: 13px; font-size: 13px;">
                            3. Check the details and approve the transaction. You will receive a confirmation of a successful transaction. Depending on your bank or EMI, applicable transfer fee maybe charged which is the same as your bank or EMI’s transfer fee for InstaPay.
                        </p>
                    </div>
                </td>
            </tr>
        </table>

        <p style="margin-top: 13px; font-size: 13px;">
            To ensure the seamless processing of your reservation, we kindly request that you complete the payment before the due date. If you have already made the payment, kindly disregard this message
        </p>

        <p style="margin-top: 13px; font-size: 13px;">
            Should you have any questions/concerns, please feel free to contact us at <a href="https://officesale.enclaves.com.ph" class="link">officesale.enclaves.com.ph</a>
        </p>
    </div>

</body>
</html>