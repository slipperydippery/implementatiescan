<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->delete();

        $questions = [
            [
                'title' 					=> 'Werkend leren',
                'blurbtitle' 				=> '',
                'blurb' 					=> '',
                'succesfactor' 				=> 'Werkend leren centraal, ook op school: jongeren met LVB leren het meest en best via learning by doing. Niet schools en simulatie, maar – ‘zo reëel en realistisch mogelijk’ – praktijk centraal: oefenen, (liefst gecertificeerde) werkervaring en vaardigheden opdoen, ontdekken, groeien door iets kunnen en steeds meer (blijken te) kunnen.',
                'weergave_succesfactor' 	=> '<ul>
    <li>Learning by doing</li>
    <li>De praktijk centraal</li>
    <li>Zo reëel en realistisch mogelijk</li>
    <li>(Gecertificeerde) vaardigheden en werkervaring opdoen</li>
</ul>
',
                'norm' 						=> 'School werkt volgens het principe: Learning by doing. Het, zo reëel en realistisch mogelijk, werkend  leren staat centraal. ',
                'range' 					=> '100',
                'locked' 					=> false,
            ],
            [
                'title' 					=> 'Professionele relatie met werkgevers',
                'blurbtitle' 				=> '',
                'blurb' 					=> '',
                'succesfactor' 				=> 'Samenwerking met werkgevers niet als secundaire activiteit (‘erbij’), maar professioneel, door te investeren in kennis en relatie. Goed aansluiten op de context, belangen en taal van bedrijven) en zakelijk (open en eerlijk vooraf, goede begeleiding tijdens, goede evaluatie).',
                'weergave_succesfactor' 	=> '',
                'norm' 						=> 'School hanteert een professionele aanpak in de relatie met werkgevers en heeft dus kennis van context, belangen en taal van bedrijven ',
                'range' 					=> '100',
                'locked' 					=> false,
            ],
            [
                'title' 					=> 'Proactieve samenwerking bij arbeidstoeleiding',
                'blurbtitle' 				=> '',
                'blurb' 					=> '',
                'succesfactor' 				=> 'Proactief samenwerken met andere organisaties/intermediairs (werkgeversservicepunt, SBB, scholen onderling etc) voor het maximaal zien en pakken van kansen.',
                'weergave_succesfactor' 	=> '',
                'norm' 						=> 'School werkt naar werkgevers toe proactief samen met organisaties/intermediairs op het vlak van arbeidstoeleiding.',
                'range' 					=> '100',
                'locked' 					=> false,
            ],
            [
                'title' 					=> 'Professioneel ontzorgen van werkgevers',
                'blurbtitle' 				=> '',
                'blurb' 					=> '',
                'succesfactor' 				=> 'Kennis van en vaardigheden voor professioneel ontzorgen en op maat inzet van instrumenten bij werkgevers: administratief, begeleiding, compensatie lagere productiviteit, proefperiode etc. Waar nodig inclusief een rol van arbeidstoeleidingsbedrijven.',
                'weergave_succesfactor' 	=> '',
                'norm' 						=> 'School heeft de kennis en mogelijkheden om werkgevers direct en/of via samenwerking met partners te ontzorgen bij stages en arbeidstoeleiding',
                'range' 					=> '100',
                'locked' 					=> false,
            ],
            [
                'title' 					=> 'Voldoende geschikte bedrijven',
                'blurbtitle' 				=> '',
                'blurb' 					=> '',
                'succesfactor' 				=> 'Beschikbaarheid van voldoende werkgevers om jongeren met LVB passende werkervaring te laten opdoen en kansen te geven.',
                'weergave_succesfactor' 	=> '',
                'norm' 						=> 'School en gemeente hebben een voldoende groot en divers netwerk van geschikte bedrijven voor stages en plaatsingskansen voor jongeren met LVB',
                'range' 					=> '100',
                'locked' 					=> false,
            ],
            [
                'title' 					=> 'Jongeren worden gestimuleerd en empowered',
                'blurbtitle' 				=> '',
                'blurb' 					=> '',
                'succesfactor' 				=> 'Benadering (bejegening) van jongeren niet ‘schools’ of ‘beschermend’, maar stimuleren en empoweren. Jongeren zoveel mogelijk zelf laten ontdekken en ervaren wat werk inhoudt en wat daarbij komt kijken, met coaching die gericht is op het leren van eigen ervaringen.',
                'weergave_succesfactor' 	=> '',
                'norm' 						=> 'Jongeren worden gestimuleerd en empowered, niet gepamperd of ‘schools’ benaderd.',
                'range' 					=> '100',
                'locked' 					=> false,
            ],
            [
                'title' 					=> 'Begeleiding van de jongere',
                'blurbtitle' 				=> '',
                'blurb' 					=> '',
                'succesfactor' 				=> 'De impact van begeleiding staat of valt met daadwerkelijke aandacht. Er echt zijn voor de jongere, die dat ook zo voelt. Vertrouwen. In selectie, caseload, toerusting en organisatie zijn de waarborgen voor deze echte ‘presentie’ gewaarborgd.',
                'weergave_succesfactor' 	=> '',
                'norm' 						=> 'Docenten en begeleiders zijn qua caseload, competenties en persoonlijkheid in staat om jongeren goed te begeleiden, vertrouwen te geven en zo te laten groeien.',
                'range' 					=> '100',
                'locked' 					=> false,
            ],
            [
                'title' 					=> 'Signalering en diagnose',
                'blurbtitle' 				=> '',
                'blurb' 					=> '',
                'succesfactor' 				=> 'Vroegtijdige signalering en diagnose: – eventueel m.b.v. diagnostisch onderzoek - ervoor zorgen dat wensen en mogelijkheden goed in beeld zijn en dat zo vroeg mogelijk onderkend wordt welke factoren de school- en werkloopbaan kunnen belemmeren, zodat de begeleiding daarop kan worden afgestemd.',
                'weergave_succesfactor' 	=> '',
                'norm' 						=> 'Docenten hebben vroegtijdig zicht op belemmeringen, mogelijkheden en loopbaan wensen, zodat gerichte begeleiding in de juiste richting mogelijk is. ',
                'range' 					=> '100',
                'locked' 					=> false,
            ],
            [
                'title' 					=> 'Betrokkenheid ouders',
                'blurbtitle' 				=> '',
                'blurb' 					=> '',
                'succesfactor' 				=> 'De rol van ouders is zowel groot, als vaak onderbenut. Ouders steeds actief betrekken, informeren en vooral committeren en stimuleren (rol in de begeleiding).',
                'weergave_succesfactor' 	=> '',
                'norm' 						=> 'De impact van ouders wordt actief in de juiste richting benut door hen actief te betrekken, stimuleren en committeren (in plaats van alleen ‘tienminutengesprekken’). ',
                'range' 					=> '100',
                'locked' 					=> false,
            ],
            [
                'title' 					=> 'Continuïteit in begeleiding',
                'blurbtitle' 				=> '',
                'blurb' 					=> '',
                'succesfactor' 				=> 'Continuïteit in begeleiding bij het verlaten van de school (tijdige, warme overdracht school – gemeente, nazorg school). ',
                'weergave_succesfactor' 	=> '',
                'norm' 						=> 'Er is sprake van een tijdige warme overdracht, en nazorg zodra het moment dat de jongere school verlaat dichterbij komt en daarna',
                'range' 					=> '100',
                'locked' 					=> false,
            ],
            [
                'title' 					=> 'Gedeelde visie ',
                'blurbtitle' 				=> '',
                'blurb' 					=> '',
                'succesfactor' 				=> 'Gedeelde visie van netwerkpartners ten aanzien van het realiseren van zo groot mogelijke werkkansen voor jongeren met LVB en ieders verantwoordelijkheid en rol daarbij.',
                'weergave_succesfactor' 	=> '',
                'norm' 						=> 'Netwerkpartners hebben een gedeelde  visie  op de arbeidstoeleiding van de jongeren en op verantwoordelijkheden en inzet van betrokken partijen ',
                'range' 					=> '100',
                'locked' 					=> false,
            ],
            [
                'title' 					=> 'Periodiek (netwerk)overleg',
                'blurbtitle' 				=> '',
                'blurb' 					=> '',
                'succesfactor' 				=> 'Netwerkpartners op ieder leefgebied zijn periodiek op verschillende niveaus met elkaar in gesprek over optimale samenwerking, onderlinge afhankelijkheden en inzet. Op beleidsniveau (ook in het kader van ieders beleids-/begrotingscyclus) en ook met heldere operationele samenwerkingsafspraken (contactpersonen, ‘leveringsafspraken’).',
                'weergave_succesfactor' 	=> '',
                'norm' 						=> 'Er vindt structureel op verschillende niveaus overleg plaats tussen netwerkpartners over de samenwerking.',
                'range' 					=> '100',
                'locked' 					=> false,
            ],
            [
                'title' 					=> 'Effectief casemanagement',
                'blurbtitle' 				=> '',
                'blurb' 					=> '',
                'succesfactor' 				=> 'Effectief casemanagement: helderheid over de regie door een docent/(traject)begeleider ten aanzien van de activiteiten van alle bij de begeleiding betrokken professionals. Met oog voor de noodzaak van gerichte begeleiding in veranderingen op verschillende levensgebieden (bijv. wonen, jeugdhulpverlening en inkomen).',
                'weergave_succesfactor' 	=> '',
                'norm' 						=> 'Helder is welke docent/(traject)begeleider  de regie heeft. Deze heeft het overzicht en coördineert de verschillende interventies naar de jongere toe. ',
                'range' 					=> '100',
                'locked' 					=> false,
            ],
            [
                'title' 					=> 'Samenwerking scholen',
                'blurbtitle' 				=> '',
                'blurb' 					=> '',
                'succesfactor' 				=> 'VSO en PRO scholen in de regio zorgen ervoor dat er een voldoende eenduidige aanpak en samenwerking is ten behoeve van het vruchtbaar en efficiënt kunnen samenwerken met gemeenten.',
                'weergave_succesfactor' 	=> '',
                'norm' 						=> 'De VSO en PRO scholen werken zodanig samen dat er een goede samenwerking met gemeenten mogelijk is',
                'range' 					=> '100',
                'locked' 					=> false,
            ],
            [
                'title' 					=> 'Samenwerking gemeenten',
                'blurbtitle' 				=> '',
                'blurb' 					=> '',
                'succesfactor' 				=> 'Gemeenten in de regio zorgen er voor dat er een voldoende eenduidige aanpak is ten behoeve van het vruchtbaar en efficiënt kunnen samenwerken met VSO-  en PRO-scholen',
                'weergave_succesfactor' 	=> '',
                'norm' 						=> 'De gemeenten werken zodanig samen dat er een eenduidige en goede samenwerking met scholen mogelijk is.',
                'range' 					=> '100',
                'locked' 					=> false,
            ],
        ];

        DB::table('questions')->insert($questions);
    }
}

