<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <p>Hello {{ $application->user->name }},</p>

    <p>Your application for the job <strong>{{ $application->job->title }}</strong> has been viewed by the employer and
        is
        now under review.</p>

    <p>Thank you for applying through our platform. We wish you the best!</p>

    <p>Regards,<br>Job Veens Portal Team</p>

    <p><small>This is an automated message. Please do not reply to this email.</small></p>

</body>

</html>