{{-- @component('mail::message')
# Applicant Feedback Form

We are sending you this feedback form please open for the result of your application.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

From,<br>
{{ config('app.name') }}
@endcomponent --}}

<!DOCTYPE html>
<html>

<head>
    <title>BSU Job Applicant Feedback Form</title>
</head>

<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <p>Kind Regards, <br />Benguet State University - Human Resource Management Office</p>
</body>

</html>
