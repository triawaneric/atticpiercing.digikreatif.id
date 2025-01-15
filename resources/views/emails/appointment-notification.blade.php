<!DOCTYPE html>
<html>
<head>
    <title>Appointment Notification</title>
</head>
<body>
<h2>Dear {{ $appointment->name }},</h2>

<p>{{ $messageContent }}</p>

<p>Appointment Details:</p>
<ul>
    <li><strong>Date & Time:</strong> {{ $appointment->appointment_datetime }}</li>
    <li><strong>Outlet:</strong> {{ $appointment->outlet->name }}</li>
    <li><strong>Status:</strong> {{ ucfirst($appointment->status) }}</li>
    @if($appointment->product)
        <li><strong>Product:</strong> {{ $appointment->product->name }}</li>
    @endif
</ul>

<p>Thank you for choosing our service!</p>
</body>
</html>
