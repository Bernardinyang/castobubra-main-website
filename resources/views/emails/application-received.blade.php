<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Application Received</title>
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
            border-radius: 8px 8px 0 0;
            color: #009454;
            border-bottom: 2px solid #dc3545;
            margin: -30px -30px 0 -30px;
        }
        .logo-container img {
            max-width: 200px;
            height: auto;
        }
        .header {
            background-color: #dc3545;
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
        .alert-box {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 20px 0;
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
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-pending {
            background-color: #ffc107;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="https://castobubra.ng/assets/images/castobubra_logo_light.png" alt="{{ config('mail.from.name', 'CAST Obubra') }} Logo">
        </div>
        <!-- <div class="header">
            <h1>New Application Received</h1>
        </div> -->
        
        <div class="content">
            <p>Hello Admissions Team,</p>
            
            <p>A new application has been submitted and requires your review.</p>
            
            <div class="alert-box">
                <strong>Application ID:</strong> {{ $application->unique_id }}<br>
                <strong>Status:</strong> <span class="status-badge status-pending">{{ ucfirst($application->status) }}</span>
            </div>
            
            <h3 style="color: #227353; margin-top: 30px;">Applicant Information:</h3>
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
                    <span class="details-label">Gender:</span>
                    <span>{{ $application->gender ?? 'Not specified' }}</span>
                </div>
                <div class="details-row">
                    <span class="details-label">State of Origin:</span>
                    <span>{{ $application->state_of_origin ?? 'Not specified' }}</span>
                </div>
                <div class="details-row">
                    <span class="details-label">Local Government:</span>
                    <span>{{ $application->local_government ?? 'Not specified' }}</span>
                </div>
            </div>
            
            <h3 style="color: #227353; margin-top: 30px;">Programme Details:</h3>
            <div class="details">
                <div class="details-row">
                    <span class="details-label">Programme:</span>
                    <span>{{ $application->programme ? $application->programme->type . ' - ' . $application->programme->name : 'Not specified' }}</span>
                </div>
            </div>
            
            <h3 style="color: #227353; margin-top: 30px;">Documents Submitted:</h3>
            <div class="details">
                <div class="details-row">
                    <span class="details-label">SSCE Certificate:</span>
                    <span>{{ $application->ssce_certificate ? '✓ Uploaded' : '✗ Missing' }}</span>
                </div>
                <div class="details-row">
                    <span class="details-label">Birth Certificate:</span>
                    <span>{{ $application->birth_certificate ? '✓ Uploaded' : '✗ Missing' }}</span>
                </div>
                <div class="details-row">
                    <span class="details-label">Passport Photograph:</span>
                    <span>{{ $application->passport_photograph ? '✓ Uploaded' : '✗ Missing' }}</span>
                </div>
                <div class="details-row">
                    <span class="details-label">Evidence of Payment:</span>
                    <span>{{ $application->evidence_of_payment ? '✓ Uploaded' : '✗ Missing' }}</span>
                </div>
                <div class="details-row">
                    <span class="details-label">JAMB Result:</span>
                    <span>{{ $application->jamb_result ? '✓ Uploaded' : '✗ Missing' }}</span>
                </div>
                <div class="details-row">
                    <span class="details-label">Other Uploads:</span>
                    <span>{{ $application->other_uploads ? '✓ Uploaded' : 'Not provided' }}</span>
                </div>
            </div>
            
            <div class="details">
                <div class="details-row">
                    <span class="details-label">Submitted On:</span>
                    <span>{{ $application->created_at->format('F d, Y \a\t h:i A') }}</span>
                </div>
            </div>
            
            <p style="margin-top: 30px;">
                <a href="{{ config('app.url') }}/admin/applications/{{ $application->id }}" class="button">View Full Application</a>
            </p>
            
            <p><strong>Action Required:</strong> Please review this application and update its status in the admin panel.</p>
        </div>
        
        <div class="footer">
            <p>This is an automated notification from <strong>{{ config('mail.from.name', 'CAST Obubra') }} Application System</strong></p>
            <p style="margin-top: 10px; font-size: 12px; color: #999;">
                Application ID: {{ $application->unique_id }} | Submitted: {{ $application->created_at->format('Y-m-d H:i:s') }}
            </p>
        </div>
    </div>
</body>
</html>
