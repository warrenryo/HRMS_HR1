<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onboarding Process</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            color: #4CAF50;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to ParadiseHotel!</h1>
        <p>Dear {{$first_name}} {{$last_name}},</p>
        <p>We are thrilled to inform you that you have successfully completed the initial stages of our hiring process, and we would like to move forward with your onboarding at ParadiseHotel!</p>
        <p>To get started, please complete your onboarding form by clicking the button below:</p>
        <p style="text-align: center;">
            <a href="{{ url('/onboarding-application-'.$id) }}" class="btn">Fill Out Onboarding Form</a>
        </p>
        <p>If you encounter any issues or have any questions during the process, please feel free to reach out to us at paradise.hotel@gmail.com.</p>
        <p>We're excited to have you join our team and look forward to your journey with us!</p>
        <p>Sincerely,</p>
        <p><strong>Employer</strong><br>
        Human Resources<br>
        Paradise Hotel<br>
        paradise.hotel@gmail.com</p>

    </div>
    <div class="footer">
        <p>&copy; 2024 ParadiseHotel. All Rights Reserved.</p>
    </div>
</body>
</html>