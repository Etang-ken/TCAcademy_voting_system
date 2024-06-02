<h1>Thank you for voting!</h1>
<p>Dear {{ $user->name }},</p>
<p>Your votes have been recorded. Here are the current statistics:</p>
@foreach ($candidates as $candidate)
    <p>{{ $candidate->role }}: {{ $candidate->name }} - {{ $candidate->votes->count() }} votes</p>
@endforeach
<p>Best regards,<br>TCAcademy</p>
