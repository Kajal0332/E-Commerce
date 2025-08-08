{{-- resources/views/emails/contact-form.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { width: 80%; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9; }
        h2 { color: #0056b3; }
        p { margin-bottom: 10px; }
        strong { color: #555; }
    </style>
</head>
<body>
    <div class="container">
        <h2>New Contact Form Submission</h2>
        <p>You have received a new message from your website contact form:</p>
        <p><strong>Name:</strong> {{ $formData['name'] }}</p>
        <p><strong>Email:</strong> {{ $formData['email'] }}</p>
        @if (isset($formData['phone']) && !empty($formData['phone']))
            <p><strong>Phone:</strong> {{ $formData['phone'] }}</p>
        @endif
        <p><strong>Message:</strong></p>
        <p style="white-space: pre-wrap; border: 1px solid #eee; padding: 10px; background-color: #fff;">{{ $formData['message'] }}</p>
        <p>Thank you.</p>
    </div>
</body>
</html> 