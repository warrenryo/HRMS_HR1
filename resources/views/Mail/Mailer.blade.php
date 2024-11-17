<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if($isFinal == false)
    <title>Initial Interview Invitation</title>
    @else
    <title>Final Interview Invitation</title>

    @endif
</head>

<body style="font-family: Arial, sans-serif; color: #333333; margin: 20px; padding: 0;">
    @if($isFinal == false)
    <p>Dear <strong>{{$firstname}} {{$lastname}}</strong>,</p>

    <p>Thank you for your interest in the <strong>{{$job}}</strong> at <strong>Paradise Hotel</strong>. After reviewing your application and qualifications, we are pleased to invite you to an initial interview to discuss your experience and the potential fit for this role.</p>

    <p>The interview will be held on <strong>{{$date}}</strong> at <strong>{{$time}}</strong> via 
    <strong>
        @if($via == 'On Site') 
            102 Sunrise Avenue, Brgy. Commonwealth, Quezon City, Metro Manila 1121, Philippines 
        @else  
            {{$via}} 
        @endif
    </strong>. Please let us know if the proposed time works for you or if another time would be more convenient. The interview will last approximately <strong>less than 30 minutes</strong> and will provide an opportunity for you to learn more about our team and the position.</p>

    <p>To help you prepare, we suggest reviewing the job description and familiarizing yourself with our company’s values and recent initiatives. Feel free to bring any questions you may have as well.</p>

    <p>Please confirm your availability by replying your full name, and do not hesitate to reach out if you have any questions in advance.</p>

    <p>We look forward to speaking with you soon.</p>

    <p><strong>Interview Link:</strong> <a href="{{ $link }}">{{ $link }}</a></p>

    <p>Best regards,</p>
    <p><strong>Employer</strong><br>
        Human Resource<br>
        ParadiseHotel<br>
        paradise.hotel@gmail.com</p>
    @else
    <p>Dear <strong>{{$firstname}} {{$lastname}}</strong>,</p>

    <p>Thank you for your continued interest in the <strong>{{$job}}</strong> position at <strong>Paradise Hotel</strong>. After carefully reviewing your qualifications and previous discussions, we are pleased to invite you to the final interview to further assess your experience and how you would contribute to the team.</p>

    <p>The final interview will be held on <strong>{{$date}}</strong> at <strong>{{$time}}</strong> via 
    <strong>
        @if($via == 'On Site') 
            102 Sunrise Avenue, Brgy. Commonwealth, Quezon City, Metro Manila 1121, Philippines 
        @else  
            {{$via}} 
        @endif
    </strong>. Please confirm if this time works for you, or let us know if another time would be more suitable. The interview is expected to last approximately <strong>less than 45 minutes</strong> and will focus on finalizing details related to the position and your fit with our company culture.</p>

    <p>In preparation, we recommend reviewing the job description and any information you've received from previous interviews. Additionally, feel free to come with any final questions you may have regarding the role or our team.</p>

    <p>Please confirm your availability by replying with your full name. If you have any questions beforehand, don’t hesitate to reach out.</p>

    <p>We look forward to our conversation and to potentially welcoming you to the team.</p>

    <p><strong>Interview Link:</strong> <a href="{{ $link }}">{{ $link }}</a></p>

    <p>Best regards,</p>
    <p><strong>Employer</strong><br>
        Human Resources<br>
        Paradise Hotel<br>
        paradise.hotel@gmail.com</p>
    @endif


</body>

</html>