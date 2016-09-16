<html>
<head></head>
<body style="color: black;">
<h1>{{$title}}</h1>
<p>Beste {{ $participant->name_first }} {{ $participant->name_last }}, </p>
<p>{!!$content!!}</p>
<h2>Uw inloggegevens:</h2>
<b>Gebruikersnaam:</b> {!! $participant->email !!}  <br>
<b>Wachtwoord:</b> {!! $participant->initial_pwd !!}	<br>
<i></i>
</body>
</html>