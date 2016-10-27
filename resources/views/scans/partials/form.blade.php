<!-- Naam Form Input -->
<div class="form-group">
	{!! Form::label('title', 'Naam school:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Regio Form Input -->
<div class="form-group">
	{!! Form::label('regio', 'Regio / vestigingsplaats:') !!}
	{!! Form::text('regio', null, ['class' => 'form-control']) !!}
</div>

<!-- Voornaam voorzitter Form Input -->
<div class="form-group">
	{!! Form::label('name_first', 'Voornaam voorzitter:') !!}
	{!! Form::text('name_first', null, ['class' => 'form-control']) !!}
</div>

<!-- Achternaam voorzitter Form Input -->
<div class="form-group">
	{!! Form::label('name_last', 'Achternaam voorzitter:') !!}
	{!! Form::text('name_last', null, ['class' => 'form-control']) !!}
</div>

<!-- Email adress beheerder Form Input -->
<div class="form-group">
	{!! Form::label('beheerder_email', 'Email adres voorzitter:') !!}
	{!! Form::text('beheerder_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Instantie Form Input -->
<div class="form-group">
    {!! Form::label('instantie', 'Instantie van voorzitter:') !!}
    {!! Form::select('instantie', $scanmodels, 'none', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('datepicker', 'Datum scan:') !!}
	<input id="datedeeleen" class="hidden" name="datedeeleen" type="hidden" placeholder="Choose a date">
  
</div>

<!-- Email Bericht Form Input -->
<div class="form-group">
	{!! Form::label('email_bericht', 'Email Bericht:') !!}
	{!! Form::textarea('email_bericht', 'Beste schoolbestuurder,

Lecso heeft in samenwerking met Ecorys een kennis- en procestool ontwikkeld waarmee u als school samen met netwerkpartners de huidige aanpak en samenwerking om leerlingen in het VSO/PRO aan een baan te helpen kunt analyseren op sterktes en zwaktes. Op basis van succesfactoren (kwaliteitsnormen) op basis van onderzoek, kan met het netwerk worden vastgesteld wat de gezamenlijke agenda moet zijn om de kansen van onze leerlingen op de arbeidsmarkt te vergroten.

Via een gebruikersgroep en de KAN-bijeenkomsten in het voorjaar en najaar van 2016 hebben de scholen meegedacht over de voorwaarden waar deze Implementatiescan moet voldoen om in uitvoering te kunnen nemen in de regio\'s. Er bleek breed draagvlak om aan de hand van de Implementatiescan met de netwerkpartners aan de slag te gaan. Ook bij de landelijke organisaties van uw netwerkpartners (oa Divosa, Ingrado, MEE NL, UWV, S-BB en VOBC) is dit initiatief zeer positief ontvangen en wordt via de eigen kanalen naar gemeenten, MEE, zorginstellingen etc toe een oproep gedaan om samen met de scholen de analyse te maken en een gezamenlijke Werkagenda op te stellen.

Hierbij stellen we de Implementatiescan aan u beschikbaar. Aan het gebruik ervan zijn geen kosten verbonden.

Om de tool te gebruiken ontvangt u hierbij uw eigen inlogcode en wachtwoord. Daarnaast ontvangt u bijgaand een gebruikersinstructie over hoe te werken met de tool en over het proces naar de netwerkpartners toe eromheen.

Vanuit Lecso hopen we dat heel veel scholen het initiatief nemen om de netwerkpartners te benaderen met het verzoek om een Implementatiescan sessie te organiseren en met elkaar het gesprek aan te gaan over vergroting van kansen voor onze leerlingen. De partners in uw regio weten er door de landelijke communicatie van en wachten uw uitnodiging ongetwijfeld met grote belangstelling af.

Ga naar www.implementatiescan.nl en klik op de knop:
scan inrichten - voorzitter - het proces wijst zich vanzelf.

Heeft u vragen? Neem dan contact op met Lecso', ['class' => 'form-control']) !!}
</div>

<!-- Hidden video_id Type Form Input -->
{!! Form::hidden('video_id', '1', null) !!}

<!-- Hidden scanmodel Type Form Input -->
{!! Form::hidden('scanmodel_id', '1', null) !!}

    


<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'button form-control']) !!}
</div>