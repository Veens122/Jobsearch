<!DOCTYPE html>
<html>

<head>
    <title>Application Shortlisted</title>
</head>

<body>
    <h1>Congratulations!</h1>
    <p>Dear {{ $candidate->name }},</p>

    <p>Your application for the position of <strong>{{ $job->title }}</strong> has been shortlisted.</p>

    <p>We will contact you soon with more details.</p>

    <p>Best regards,<br>
        The {{ config('app.name') }} Team</p>
</body>

</html>