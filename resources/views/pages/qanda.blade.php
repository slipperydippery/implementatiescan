@extends('layouts.master', ['title' => 'kennisbank'])

@section('content')

<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>Q&A Implementatiescan </h1>
			<fieldset class="fieldset large-8">
				<ol class="qanda_index">
					<li><a href="#1"> Waar vind ik de Implementatiescan Arbeidsparticipatie Jongeren met een Kwetsbare Positie?</a><br></li>
					<li><a href="#2"> Wat heb ik er als gemeente, school of andere betrokken organisatie aan?</a><br></li>
					<li><a href="#3"> Voor wie is de Implementatiescan bedoeld? Wie zijn de gebruikers?</a><br></li>
					<li><a href="#4"> Over welke jongeren hebben we het?</a><br></li>
					<li><a href="#5"> Waarop is de kennis over succesvolle arbeidstoeleiding gebaseerd?</a><br></li>
					<li><a href="#6"> Is de Implementatiescan weer iets extra’s? Nog meer beleidsdrukte en tools?</a><br></li>
					<li><a href="#7"> Van wie is de Implementatiescan?</a><br></li>
					<li><a href="#8"> Wie verzorgt het voorzitterschap tijdens de jaarlijkse Implementatiescan sessies?</a><br></li>
					<li><a href="#9"> Wat komt er kijken bij het beleggen en uitvoeren van een Implementatiesessie?</a><br></li>
					<li><a href="#10"> Hoe niet aanwezige organisaties betrekken en committeren?</a><br></li>
					<li><a href="#11"> Hoe verder na de totstandkoming van de gezamenlijke Verbeteragenda?</a><br></li>
					<li><a href="#12"> Waar kan ik contact opnemen als ik vragen heb?</a></li>
					</ol>
			</fieldset>
		</div>
	</div>
</div>
<div class="row page-content qanda_logos">	
	<div class="small-12 large-8 columns">	
		<div class="row">	
			<div class="small-3 columns float"><img src="{{ asset('img/lecso.png') }}" class="float-center" alt=""></div>
			<div class="small-3 columns float"><img src="{{ asset('img/divosa.png') }}" class="float-center" alt=""></div>
			<div class="small-3 columns float"><img src="{{ asset('img/ecorys.png') }}" class="float-center" alt=""></div>
			<div class="small-3 columns float"><img src="{{ asset('img/uwv.png') }}" class="float-center" alt=""></div>
		</div>
		<div class="row">	
			<div class="small-3 columns float"><img src="{{ asset('img/mee.png') }}" class="float-center" alt=""></div>
			<div class="small-3 columns float"><img src="{{ asset('img/vobc.png') }}" class="float-center" alt=""></div>
			<div class="small-3 columns float"><img src="{{ asset('img/bs.png') }}" class="float-center" alt=""></div>
			<div class="small-3 columns float"><img src="{{ asset('img/ingrado.png') }}" class="float-center" alt=""></div>
		</div>
	</div>
</div>

<div class="row page-content">
	<div class="small-12 large-8 columns qanda">
		<h2 id="1">1. Waar vind ik de Implementatiescan Arbeidsparticipatie Jongeren met een Kwetsbare Positie?</h2>
		<p>De Implementatiescan is een webbased kennis- en procestool. Te vinden op www.implementatiescan.nl. Door een account aan te vragen (hyperlink op de homepage) verkrijg je toegang en kun je ermee werken. De Kennisbank is vrij toegankelijk.</p>
		<p>Ook via de websites en/of nieuwsbrieven van de landelijke organisaties in de Stuurgroep bij het Implementatiescan programma kan de Implementatiescan worden gevonden. Deze organisaties zijn LESCO, Divosa, VNG, UWV, SBB, MEE NL, VOBC en Ingrado. De kennisverzameling over succesvolle arbeidstoeleiding van jongeren in een kwetsbare positie is gefinancierd vanuit de UWV Kennisagenda. LECSO heeft vervolgens besloten om de vertaling van kennis naar de op toepassing gerichte Implementatiescan te bekostigen.</p>

		<h2 id="2">2. Wat heb ik er als gemeente, school of andere betrokken organisatie aan?</h2>
		<p>iedere organisatie doet haar best om jongeren in een kwetsbare positie te helpen aan goede kansen op de arbeidsmarkt. Tegelijkertijd geven veel scholen, gemeenten en andere organisaties aan, dat de samenwerking vaak niet is wat het zou moeten zijn en dat het goed zou zijn om de eigen dienstverlening tegen het licht te houden: doen we de goede dingen en doen we de dingen goed? Dit vraagstuk is urgenter en de risico’s zijn groter geworden sinds vangnetten als de Wajong en de Sociale Werkvoorzieningen minder toegankelijk zijn. Ook de arbeidsmarkt wordt steeds veeleisender. De noodzaak is er om jongeren, die dat meer dan anderen nodig hebben, zo goed mogelijk toe te rusten en te begeleiden naar werk. In goede samenwerking.</p>
		<p>De Implementatiescan ontsluit kennis over optimale arbeidstoeleiding, op weg van school naar werk, voor de verantwoordelijke organisaties in de regio. Op een zodanige wijze, dat heel eenvoudig, toegankelijk en systematisch het gesprek tussen de organisaties wordt gefaciliteerd. In twee sessies met twaalf sleutelpersonen leggen zij de eigen aanpak en samenwerking naast de ideale situatie. Namelijk een situatie die voldoet aan 15 kwaliteitsnormen, die afgeleid zijn van gebleken succesfactoren. Met de juiste spelers aan tafel en de juiste voeding vanuit de Implementatiescan volgt er aan het einde van de tweede sessie automatisch een gezamenlijke Verbeteragenda. Met concrete acties aan de kant van de verantwoordelijke organisaties.</p>
		<p>Wie dus de eigen aanpak en samenwerking tegen het licht wil houden, om te weten of er in de regio kansen voor jongeren worden gemist, is welkom om aan de slag te gaan met de Implementatiescan.</p>
		<p><strong>Kennis, verbinden, actie!</strong></p>
		<img src="{{ asset('img/qanda_diagram.png') }}" alt="" class="float-center">

		<h2 id="3">3. Voor wie is de Implementatiescan bedoeld? Wie zijn de gebruikers?</h2>
		<p>De Implementatiescan is gericht op het versterken van de randvoorwaarden voor de uitvoering. Het is dus geen (diagnostische) tool voor de primaire processen binnen scholen, gemeenten etc, maar gericht op management-/beleidsniveau. Onderzoek leert (breed bevestigd bij de totstandkoming van de Implementatiescan), dat daar de oplossing ligt voor betere samenwerking en dienstverlening. ‘Op de werkvloer’ doen docenten, trajectbegeleiders, klantmanagers etc hun best en lopen veel gaten dicht in het belang van de jongeren, maar dat kan beter en efficiënter door voor hen op managementniveau de juiste randvoorwaarden over bijvoorbeeld communicatie, begeleiding, benaderingswijze, casemanagement, budgetten en inzet van instrumenten af te spreken.</p>
		<p>Dat gebeurt aan de hand van de 15 kwaliteitsnormen (reflectievragen), die de basis vormen voor het gesprek tussen de twaalf managers/beleidsvertegenwoordigers die aan de Implementatiescan-sessie deelnemen.</p>
		<p><strong>Twaalf sleutelpersonen, vijftien vragen, één agenda.</strong></p>

		<h2 id="4">4. Over welke jongeren hebben we het?</h2>
		<p>Het gaat bij de Implementatiescan vooral om jongeren op en afkomstig van het PRO, VSO en Mbo Entree onderwijs. Niet alleen om jongeren met licht verstandelijke beperkingen (waar een groot deel van het uitgevoerde onderzoek betrekking op had), maar alle jongeren met een kwetsbare positie. We spreken niet van kwetsbare jongeren, omdat die bril het risico heeft dat de talenten en mogelijkheden die de meeste van deze jongeren wel degelijk hebben niet of minder goed worden gezien en benut.</p>

		<h2 id="5">5. Waarop is de kennis over succesvolle arbeidstoeleiding gebaseerd?</h2>
		<p>Onderzoek over effectieve arbeidstoeleiding van jongeren met een kwetsbare positie is de basis. Op basis van onderzoek (getoetst bij de begeleidingscommissie en experts), heeft Ecorys in 2014 de publicatie Arbeidsparticipatie Jongeren met LVB opgesteld. Uit het onderzoek werden veertig succesfactoren gedestilleerd en ook werden ter illustratie en inspiratie veelbelovende programma’s en praktijkvoorbeelden in beeld gebracht.. Dit onderzoek werd gefinancierd vanuit de Kennisagenda van UWV en is door Ecorys gepresenteerd tijdens het najaarscongres van UWV in 2014 . Daarna kwamen er – landelijk en regionaal - veel positieve reacties en herkenning, afkomstig van de organisaties die met de jongeren werken. Op landelijk niveau bleek breed draagvlak voor de bevindingen bij onder andere LECSO, LWV PrO, Divosa, UWV, SBB, VNG, Ingrado, VOBC, MEE Nederland, MBO Raad, Cedris en de Landelijke Cliënten Raad.</p>
		<p>Ook ander onderzoek, zoals van NJi, KBA, Regioplan, KPC, Berenschot, SEOR, Verwey Jonker, de B&A groep en universiteiten, heeft relevante kennis opgeleverd. Dit is in en na 2014 is betrokken bij de verdere totstandkoming van de Implementatiescan. Met alle onderzoek is een schat aan informatie beschikbaar over hoe het beter kan. Onderzoek dat volgens de gouden wetenschappelijke standaard (controlegroep, meerjarig, schaal, herhaalbaar etc) is uitgevoerd, is zoals bekend schaars in Nederland. Kennisverdieping is dus ook zeker gewenst. Wat we echter wel weten en wat wel zodanig eenduidig door (praktijk)experts wordt onderschreven, is ook veel. En te belangrijk om niets mee te doen. De bestaande kennis en aanwijzingen over wat werkt zijn zodanig manifest, dat het – aldus de landelijke organisaties – zaak is om deze direct toe te passen. In het belang van de jongeren. De risico’s op werkloosheid voor jongeren met een kwetsbare positie zijn – na alle veranderingen in de omgeving en op de arbeidsmarkt – te groot. De verwachting is, dat ook het werken met de Implementatiescan in de komende jaren weer nieuwe kennis zal genereren, die dan weer via de Implementatiescan (kwaliteitsnormen, kennisbank) kan worden ontsloten voor alle regio’s.</p>
		<p>Ofschoon de Implementatiescan is begonnen met onderzoek naar jongeren met LVB, is het programma nu gericht op de bredere doelgroep “Jongeren met een Kwetsbare Positie’. Dit naar aanleiding van de reacties van betrokken organisaties, dat de kennis over succesvolle gezamenlijke arbeidstoeleiding net zo passend en waardevol is voor andere jongeren in een kwetsbare positie (in en na het VSO, PRO en MBO/Entree onderwijs. Daarom is in overleg met de Stuurgroep gekozen voor verbreding, opdat zoveel mogelijk jongeren profiteren.</p>

		<h2 id="6">6. Is de Implementatiescan weer iets extra’s? Nog meer beleidsdrukte en tools?</h2>
		<p>Integendeel. Het is een vereenvoudiging, door gericht ontsluiten van kennis en verbinden met wat er allemaal nog meer is. De Implementatiescan moet juist een antwoord op de signalen uit de regio’s dat er zoveel landelijke onderzoeken, programma’s, websites, tools, instrumenten, methodieken en initiatieven zijn, dat scholen, gemeenten en andere partners door de bomen het bos niet meer zien. En daardoor vaak onnodig zelf het wiel uitvinden of onzeker zijn over te maken keuzes. Met andere woorden: de Implementatiescan ontzorgt.</p>
		<p>Landelijke organisaties doen uiteraard ook ieder voor zich veel om de eigen achterban toe te rusten om jongeren zo goed mogelijk te begeleiden. De Implementatiescan wil verbindend zijn door relevante landelijke kennis en informatie op toegankelijke wijze via de Implementatiescan te ontsluiten voor de regio’s. Aan de hand van vijftien kernvragen, visueel materiaal en een kennisbank worden scholen, gemeenten en andere gebruikers geholpen om systematisch en periodiek de bestaande samenwerking en aanpak tegen het licht te houden. Wat gaat goed en wat kan beter?</p>

		<h2 id="7">7. Van wie is de Implementatiescan?</h2>
		<p>De Implementatiescan is in opdracht van Lecso ontwikkeld door Ecorys in samenwerking met EMB AV. Omdat het succes staat of valt met gezamenlijke ontwikkeling en toepassing, is in 2015 goed onderzocht of er draagvlak bij de betrokken organisaties was om gezamenlijk verantwoordelijkheid te nemen. Nadat dit het geval bleek te zijn, is een Stuurgroep gevormd, waarmee Lecso, Divosa, UWV, VNG, MEE NL, SBB, VOBC en Ingrado commitment hebben uitgesproken. Landelijke samenwerking ten behoeve van regionale samenwerking. Alle organisaties hebben meegedacht, regio vertegenwoordigers aangedragen voor de landelijke testsessie, inhoudelijke input geleverd en communicatiemiddelen ingezet. Iedere landelijke organisatie heeft de eigen communicatiemiddelen naar de achterban toe ingezet, opdat ook in de regio alle netwerkpartners goed geïnformeerd zijn over de inhoud, toepassing en toegevoegde waarde van de Implementatiescan. Met een oproep aan de verschillende achterbannen om mee te doen en te gaan voor gezamenlijke acties.</p>
		<p>Vaak zullen het de scholen zijn, die het initiatief nemen om afspraken te maken over gezamenlijke arbeidstoeleiding van de jongeren. Ze zitten vaak nog bij hen op school en zijn op weg naar de arbeidsmarkt zijn, Bij die overgang van school naar werk zit een belangrijk deel van de verbeterruimte De Implementatiescan is echter niet iets van de scholen alleen. Alle organisaties zijn verantwoordelijk en ook de Verbeteragenda, die via de sessies tot stand komt, is een gezamenlijke Verbeteragenda. Ook van gemeenten, ook van SBB, ook van UWV en van de werkgeversservicepunten en ook van de overige netwerkpartners. Ontvang je bijvoorbeeld als gemeente niet binnen afzienbare tijd een uitnodiging van de scholen, dan is het goed en zelfs gewenst dat de school contact opneemt met de scholen om gezamenlijk met de Implementatiescan aan de slag te gaan.</p>
		<p><strong>Gezamenlijke belangen, gezamenlijke mogelijkheden, gezamenlijk verantwoordelijk.</strong></p>

		<h2 id="8">8. Wie verzorgt het voorzitterschap tijdens de jaarlijkse Implementatiescan sessies?</h2>
		<p>In lijn met het antwoord op vraag 7 (gedeeld eigenaarschap): het is belangrijk dat het voorzitterschap van de Implementatiescan sessies niet steeds weer door dezelfde organisatie wordt verzorgd. Gedeeld eigenaarschap moet niet alleen worden gezegd en geschreven, maar ook gevoeld en in uitvoering gebracht. Dus: niet altijd de school als trekker, voorzitter, coördinator van acties etcetera, maar roulerend. Ook het voorzitterschap: niet altijd een school, niet altijd een gemeente, niet altijd een RMC, maar jaarlijks laten wisselen.</p>

		<h2 id="9">9. Wat komt er kijken bij het beleggen en uitvoeren van een Implementatiesessie?</h2>
		<p>De praktische logistiek bij het beleggen van een Implementatiescan sessie wordt toegelicht in een visuele procesinstructie op de website. In die procesinstructie wordt onder meer aangegeven dat:</p>
		<ul>
			<li>De initiatiefnemer via de website een account kan aanvragen, waarmee hij of zij per email elf andere sleutelpersonen in het netwerk kan uitnodigen voor een Implementatiescan sessie (niet meer, anders wordt een gesprek een vergadering en verwordt interactie tot standpunten naar voren brengen);</li>
			<li>Het wordt aanbevolen om eerst even telefonisch contact op te nemen met de beoogde gesprekspartner, opdat de email positief wordt ontvangen en deelname wordt toegezegd;</li>
			<li>Te zorgen voor een goede internetverbinding in de zaal waar de sessie plaatsvindt: het gesprek wordt met visueel materiaal en met ICT ondersteund en de techniek moet het dus zeker goed doen. Ook testen vooraf. Iedere deelnemer neemt zelf een tablet/iPad of laptop mee (dit wordt aangegeven in de standaard uitnodigingstekst).</li>
		</ul>
		<p>Een goede voorbereiding op een Implementatiescansessie is bevorderlijk voor een goed resultaat. Belangrijk is wel, dat we op basis van de eerdere feedback en test weten dat de context sterk bepalend zal zijn voor de snelheid en concreetheid van de eerste sessies. Soms is er al een redelijk intensieve samenwerking, waarbij de Implementatiescan sessies het karakter hebben van reflectie en finetuning: kleinere verbeterpunten op onderdelen, waarover de organisaties het snel eens zijn. Soms ook zal het zelfs zo zijn dat de aanwezigen zich aan elkaar moeten voorstellen tijdens de sessie, omdat nog niet iedereen elkaar kent. Het is zaak realistisch te zijn. Het is, als men elkaar nog niet (goed) kent, grote winst dat de verbinding ontstaat door een goed gesprek over de juiste onderwerpen. En dat er een gezamenlijk besef van noodzaak en urgentie ontstaat om tot een gezamenlijke Verbeteragenda te komen. Beide uitkomsten zijn belangrijke progressie.</p>
		<p>Hoe dan ook is in samenwerkingsprocessen geduld, respect, investeren in en groeien van vertrouwen de basis. Geef elkaar de ruimte, tel zegeningen en leg de basis voor een volgende, grotere stap voorwaarts in de samenwerking voor de jongeren. De Implementatiescan wil een duurzaam versterkende impact hebben in plaats van een korte termijn oplevingseffect.</p>
		<p>Het proces zal dus altijd maatwerk zijn. In een regio waar nog echt wordt samengewerkt, zal het bijvoorbeeld verstandig zijn om met een hogere frequentie vervolgbijeenkomsten te hebben. Om sneller de achterstand die er is op regio’s, waar die samenwerking al wel bestaat, in te lopen en zichtbaar de ontstane gezamenlijke wil te vertalen naar concrete, door jongeren en ouders merkbare verbeteringen in de begeleiding.</p>
		<p>Tijdens de train de trainer sessies voor scholen en gemeenten in het najaar van 2016 wordt hier verder op ingegaan. Door Lecso worden overigens voor scholen vouchers beschikbaar gesteld voor de eventuele inschakeling van een ervaren procesbegeleider, mocht dat in sommige gevallen gewenst zijn voor een goed startproces.</p>

		<h2 id="10">10. Hoe niet aanwezige organisaties betrekken en committeren?</h2>
		<p>Wat de schaal/afbakening van de regio is, dat bepaalt iedere initiatiefnemer zelf, kijkend naar de eigen situatie. Ieder domein hanteert op landelijk niveau eigen regio-indelingen, zodat landelijke blauwdrukken en sturing niet vruchtbaar zijn. Als een school andere organisaties om tafel roept om samen te komen tot een verbeteragenda, dan is het zaak daar zelf goed over na te denken. Waar wonen de jongeren? Welke samenwerking (dienstverlening/expertise/netwerken) heb je nodig voor optimale begeleiding van en hulp aan jongeren op weg van school naar werk? En als afgeleide daarvan: wat zijn dan de twaalf belangrijkste organisaties met bijbehorende sleutelpersonen op het niveau van management/beleid, met wie je in gesprek wilt gaan over samenwerking, die de kansen voor de jongeren vergroot?</p>
		<img src=" {{ asset('img/qanda_tafel.png') }} " alt="" class="float-center">
		<p>De twaalf personen aan tafel bestaan uit twee vertegenwoordigers per domein:</p>
		<ol>
			<li>Onderwijs: scholen (VSO/PRO/MBO)</li>
			<li>Sociale Diensten / Werkbedrijf: bijvoorbeeld een gemeentelijk werkbedrijf of een SW-bedrijf</li>
			<li>Leerplicht / RMC</li>
			<li>Werkgevers(vertegenwoordigers): bijv SBB, een werkgeversservicepunt of een werkgever met impact)</li>
			<li>Zorg: bijvoorbeeld MEE. OBC of Gemeente/WMO</li>
			<li>Overig: bijvoorbeeld UWV of een specifieke regionale organisatie.</li>
		</ol>
		<p>Daarmee dragen deze twaalf personen een bijzondere verantwoordelijkheid. Namelijk om mede namens de niet aanwezige organisaties goede afspraken te maken over betere samenwerking en begeleiding van jongeren met een kwetsbare positie naar werk.</p>
		<p>Het verschilt per regio sterk of er wel of niet goede verbindingen binnen domeinen bestaan en hoe deze dan zijn ingevuld. Zo bestaat in sommige regio’s al een effectief overlegplatform (bijvoorbeeld in het kader van de VSV convenanten), waarbij het logisch is om daarbij aan te sluiten. In andere regio’s is het beter om een op maat groep te formeren, die gezamenlijk met de Implementatiescan-sessie aan de slag gaat. De wijze waarop vooraf en/of achteraf afstemming plaatsvinden met niet aanwezige organisaties (ook bijvoorbeeld: tussen scholen onderling en tussen gemeenten onderling) is dan ook iets wat niet eenduidig kan worden aangegeven. Regionaal maatwerk in het proces is nodig. Dit komt ook aan de orde bij de train de trainer bijeenkomsten eind 2016.</p>
		<p>Hoe dan ook is het van belang om aan het slot van de tweede Implementatiescan sessiegoede afspraken te maken over de verdere afhechting van de overeengekomen Verbeteragenda:</p>
		<ul>
			<li>Intern: moet de aanwezige gemeentelijke manager nog voor goedkeuring voorleggen aan het College van B&W?;</li>
			<li>Extern: het verzoek aan niet aanwezige organisaties om in het belang van de jongern ook mee te doen aan de uitvoering van eenduidige samenwerkingsafspraken.</li>
		</ul>
		<p>Ook hier geldt: Rome is niet in één dag gebouwd. Samenwerkingsprocessen kennen vaak een weg van geleidelijkheid. Succes is echter een katalysator. Als het niet lukt om in het eerste jaar al meteen alle relevante organisaties te betrekken, dan haken deze daarna doorgaans wel aan. De ervaring leert dat door succesvolle uitvoering en meer jongeren aan het werk een positieve olievlek van de netwerksamenwerking ontstaat: Bijvoorbeeld doordat een gemeente of een school, die niet direct meedoet, het volgende jaar wel aanhaakt. Zo wordt de aanpak en samenwerking steeds sluitender en profiteren steeds meer jongeren van betere arbeidstoeleiding.</p>
		<p>Hoe dan ook is het aan te bevelen om niet pas na de tweede Implementatiescan sessie te communiceren met de niet aanwezige gemeenten, scholen en overige partners. Doe dit als het even kan uiterlijk na de eerste sessie. Liefst natuurlijk is er al contact en is er iets van mandaat of verbinding voorafgaand aan de eerste sessie. In veel gevallen zal dit niet meteen lukken. Ook dat is niet erg. De Implementatiescan gaat om met elkaar in gesprek zijn over onderlinge verwachtingen en goede afspraken maken over optimale randvoorwaarden voor de uitvoering. Ook als dat niet in één stap plaatsvindt. Samenwerking is geduld, respect en investeren.</p>

		<h2 id="11">11. Hoe verder na de totstandkoming van de gezamenlijke Verbeteragenda?</h2>
		<p>Bij het maken van de afspraken op de Verbeteragenda moeten ook procesafspraken over de uitvoering en de monitoring daarvan worden gemaakt. Komen de twaalf managers aan tafel met een bepaalde frequentie bijeen om de voortgang te bespreken? Is er een bestaand platform waar het bewaken en bespreken (PDCA) van de verbeterafspraken beter kan worden belegd? Hoe wordt gerapporteerd en gecommuniceerd door de trekkers van de uitvoering van de verbeteracties?</p>
		<p>Bureaucratiseren is uit den boze voor duurzame samenwerking. Het gaat erom dat het gevoel van gezamenlijkheid en de gezamenlijke focus op de jongeren blijft bestaan en dat er dus het volgen en bespreken van de voortgang op een pragmatische, energiegevende wijze worden georganiseerd. Er zijn allerlei manieren om het leuk te houden, met elkaar plezier te hebben in het beter helpen van de jongeren (met gezichten, mensen, verhalen) en niet te verzanden in ‘het bespreken van stukken’. Inclusief het vieren van successen. Al meteen rond de totstandkoming van de Verbeteragenda.</p>
		
		<h2 id="12">12. Waar kan ik contact opnemen als ik vragen heb?</h2>
		<p>Inhoudelijke vragen over de Implementatiescan kunnen worden gesteld aan het landelijke programmamanagement (Ecorys):</p>
		<ul>
			<li>Henk Bakker (<a href="mailto:henk.bakker@ecorys.com" class="visible_link">henk.bakker@ecorys.com</a>; 06-13000603)</li>
			<li>Lisa van Beek (<a href="mailto:lisa.vanbeek@ecorys.com" class="visible_link">lisa.vanbeek@ecorys.com</a>; 010 453 86 43)</li>
		</ul>
		<p>Vragen van technische aard (werking Implementatiescan) graag stellen aan EMB AV:</p>
		<ul>
			<li>Susanne Meeuwissen: <a href="mailto:susanne@embav.nl" class="visible_link">susanne@embav.nl</a></li>
		</ul>
		<p>Heb je vragen aan je eigen landelijke vertegenwoordiger in de Stuurgroep?:</p>
		<ul>
			<li>Lecso: Albert Boelen en Marc Cantrijn (<a href="mailto:a.boelen@lecso.nl" class="visible_link">a.boelen@lecso.nl</a>; <a href="mailto:m.cantrijn@lecso.nl" class="visible_link">m.cantrijn@lecso.nl</a>)</li>
			<li>Divosa: Peter Killestijn (<a href="mailto:pkillestijn@divosa.nl" class="visible_link">pkillestijn@divosa.nl</a>)</li>
			<li>VNG: Paulina Hublart (<a href="mailto:paulina.hublart@vng.nl" class="visible_link">paulina.hublart@vng.nl</a>)</li>
			<li>UWV: Alfred van Hardeveld (<a href="mailto:alfred.vanhardeveld@uwv.nl" class="visible_link">alfred.vanhardeveld@uwv.nl</a>)</li>
			<li>MEE NL: Angelika Herben (<a href="mailto:a.herben@mee.nl" class="visible_link">a.herben@mee.nl</a>)</li>
			<li>VOBC: Erie Merkus (<a href="mailto:e.merkus@vobc.nu" class="visible_link">e.merkus@vobc.nu</a>)</li>
			<li>S-BB: Will Seignette (<a href="mailto:w.seignette@s-bb.nl" class="visible_link">w.seignette@s-bb.nl</a>)</li>
			<li>Ingrado: Ellen de Wit (<a href="mailto:e.dewit@ingrado.nl" class="visible_link">e.dewit@ingrado.nl</a>)</li>
		</ul>
	</div>
</div>


@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 columns page-next">	
		<a href="{{ URL::route('home') }}" class="button button-next">Home</a>
	</div>
</div>

@stop