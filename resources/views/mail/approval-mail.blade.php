<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Email</title>
</head>
<body>
    <h1>{{ $mail_message['subject'] }} - <p>{{ $mail_message['body'] }}</p></h1>
    <h2>Hello, {{ $user->fullname }}</h2>
    <p>Your leave request status:</p>
    <p>Review Status: {{ $leave_recodrs->review_status }}</p>
    <p>Start Date: {{ $leave_recodrs->start_date }}</p>
    <p>End Date: {{ $leave_recodrs->end_date }}</p>
</body>
</html>
