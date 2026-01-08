<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Submitted Successfully</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .logo-container {
            text-align: center;
            padding: 20px 0;
            background-color: #004829;
            color: #009454;
            border-radius: 8px 8px 0 0;
            border-bottom: 2px solid #227353;
            margin: -30px -30px 0 -30px;
        }
        .logo-container img {
            max-width: 200px;
            height: auto;
        }
        .header {
            background-color: #227353;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            margin: 0 -30px 30px -30px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            margin-bottom: 30px;
        }
        .info-box {
            background-color: #f8f9fa;
            border-left: 4px solid #227353;
            padding: 15px;
            margin: 20px 0;
        }
        .info-box strong {
            color: #227353;
        }
        .details {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .details-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        .details-row:last-child {
            border-bottom: none;
        }
        .details-label {
            font-weight: bold;
            color: #164734;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            color: #666;
            font-size: 14px;
        }
        .button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #227353;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
        .button:hover {
            background-color: #164734;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="https://castobubra.ng/assets/images/castobubra_logo_light.png" alt="{{ config('mail.from.name', 'CAST Obubra') }} Logo">
        </div>
        <!-- <div class="header">
            <h1>Application Submitted Successfully!</h1>
        </div> -->
        
        <div class="content">
            <p>Dear {{ $application->first_name }} {{ $application->surname }},</p>
            
            <p>Thank you for submitting your application to <strong>{{ config('mail.from.name', 'CAST Obubra') }}</strong>. We have successfully received your application and it is currently under review.</p>
            
            <div class="info-box">
                <strong>Your Application ID:</strong> {{ $application->unique_id }}<br>
                <small>Please keep this ID for your records and future reference.</small>
            </div>
            
            <h3 style="color: #227353; margin-top: 30px;">Application Details:</h3>
            <div class="details">
                <div class="details-row">
                    <span class="details-label">Full Name:</span>
                    <span>{{ $application->full_name }}</span>
                </div>
                <div class="details-row">
                    <span class="details-label">Email:</span>
                    <span>{{ $application->email }}</span>
                </div>
                <div class="details-row">
                    <span class="details-label">Phone Number:</span>
                    <span>{{ $application->phone_number }}</span>
                </div>
                <div class="details-row">
                    <span class="details-label">Programme:</span>
                    <span>{{ $application->programme ? $application->programme->type . ' - ' . $application->programme->name : 'N/A' }}</span>
                </div>
                <div class="details-row">
                    <span class="details-label">Status:</span>
                    <span style="text-transform: capitalize;">{{ $application->status }}</span>
                </div>
                <div class="details-row">
                    <span class="details-label">Submitted On:</span>
                    <span>{{ $application->created_at->format('F d, Y \a\t h:i A') }}</span>
                </div>
            </div>
            
            <h3 style="color: #227353; margin-top: 30px;">What's Next?</h3>
            <p>Our admissions team will review your application and all submitted documents. You will be notified via email once a decision has been made on your application.</p>
            
            <p><strong>Please note:</strong> This process may take some time. We appreciate your patience.</p>
            
            <div class="info-box" style="background-color: #e8f5e9; border-left: 4px solid #28a745; margin: 25px 0;">
                <h4 style="color: #227353; margin-top: 0; margin-bottom: 15px;">
                    <i class="fas fa-check-circle"></i> Check Your Admission Status
                </h4>
                <p style="margin-bottom: 15px;">You can check your admission status anytime using your email and application code:</p>
                <div style="text-align: center; margin: 20px 0;">
                    <a href="{{ config('app.url') }}/admission-checker" class="button" style="display: inline-block; padding: 12px 30px; background-color: #227353; color: #ffffff; text-decoration: none; border-radius: 5px;">
                        <i class="fas fa-search"></i> Check Admission Status
                    </a>
                </div>
                <p style="margin-top: 15px; margin-bottom: 0; font-size: 14px;">
                    <strong>Application Code:</strong> <span style="font-family: monospace; font-weight: bold; color: #227353;">{{ $application->unique_id }}</span>
                </p>
            </div>
            
            <h3 style="color: #227353; margin-top: 30px;">What You'll Need Next:</h3>
            <div style="background-color: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin: 20px 0; border-radius: 4px;">
                <p style="margin-top: 0;"><strong>Once your application is reviewed and accepted, you will need:</strong></p>
                <ul style="margin-bottom: 0;">
                    <li>Original copies of all submitted documents (SSCE Certificate, Birth Certificate, JAMB Result, etc.)</li>
                    <li>Medical fitness certificate</li>
                    <li>Acceptance fee payment receipt</li>
                    <li>School fees payment receipt</li>
                    <li>Any other documents as may be required by the admissions office</li>
                </ul>
            </div>
            
            <p style="margin-top: 25px;">If you have any questions or need to update your application, please contact us at:</p>
            <ul>
                <li>Email: <a href="mailto:applications@castobubra.ng">applications@castobubra.ng</a></li>
                <li>WhatsApp: <a href="https://wa.me/2348131913864">08131913864</a></li>
            </ul>
        </div>
        
        <div class="footer">
            <p>Best regards,<br>
            <strong>{{ config('mail.from.name', 'CAST Obubra') }} Admissions Team</strong></p>
            <p style="margin-top: 20px; font-size: 12px; color: #999;">
                This is an automated email. Please do not reply to this message.
            </p>
        </div>
    </div>
</body>
</html>
