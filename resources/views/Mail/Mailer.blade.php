

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initial Interview Invitation</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333333; margin: 20px; padding: 0;">
    <p>Dear <strong>{{$firstname}} {{$lastname}}</strong>,</p>

    <p>Thank you for your interest in the <strong>{{$job}}</strong> at <strong>Paradise Hotel</strong>. After reviewing your application and qualifications, we are pleased to invite you to an initial interview to discuss your experience and the potential fit for this role.</p>

    <p>The interview will be held on <strong>{{$date}}</strong> at <strong>{{$time}}</strong> via <strong>{{$via}}</strong>. Please let us know if the proposed time works for you or if another time would be more convenient. The interview will last approximately <strong>less than 30 minutes</strong> and will provide an opportunity for you to learn more about our team and the position.</p>

    <p>To help you prepare, we suggest reviewing the job description and familiarizing yourself with our company’s values and recent initiatives. Feel free to bring any questions you may have as well.</p>

    <p>Please confirm your availability by replying your full name, and do not hesitate to reach out if you have any questions in advance.</p>

    <p>We look forward to speaking with you soon.</p>

    <p><strong>Interview Link:</strong> <a href="{{ $link }}">{{ $link }}</a></p>

    <p>Best regards,</p>
    <p><strong>Employer</strong><br>
       Human Resource<br>
       ParadiseHotel<br>
       paradise.hotel@gmail.com</p>
</body>
</html>