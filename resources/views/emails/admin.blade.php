<h1>New Vote Added!</h1>
<p>Hello Admin,</p>
<p>A new vote has been added. Here are the current statistics:</p>
@foreach ($candidates as $candidate)
    <p>{{ $candidate->role }}: {{ $candidate->name }} - {{ $candidate->votes->count() }} votes</p>
@endforeach
<p>Best regards,<br>TCAcademy</p>
