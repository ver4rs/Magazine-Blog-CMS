<?php

//require 'db.php';

if (isset($_GET['pomoc']) AND $_GET['pomoc'] != '0' AND $_GET['pomoc'] != FALSE) {
	# AK JE TAM NIECO

	if ($_GET['pomoc'] == 'podmienky') {
		# PODMIENKY
		require 'db.php';
		require 'stranka/hlava.php';
		require 'stranka/vrch.php';
		require 'stranka/telo1.php';
		?>
		<div class="form">
			<div id="podmienkyCele">
				<h3>PODMIENKY POUŽÍVANIA</h3>

				<h4>Na tieto účely pre používanie tejto webovej lokality  je:</h4>
				<p>Súkromná osoba, autor, admin a prevadzkovateľ Martin Sekerák, Stará Ľubovňa, 064 01, SLOVENSKO</p>
				<p>Prevádzkovateľoli patrí  <a href="http://www.vybertvar.6f.sk">http://www.vybertvar.6f.sk</a> a ako spomíname aj <a href="http://www.mobilai.cz">http://www.mobilai.cz</a>.</p>
				<p>Webová stránka je  informačné a propagačné miesto, ktoré  pozostáva z poskytovaných služieb a obsahu dodávaného a zverejneného  prevádzkovateľom a tretími stranami, verejne prístupné celej verejnosti prostredníctvom celosvetovej počítačovej siete internet. Súčasťou stránky môže byť aj grafická podoba, podoba zdrojového textu aj preloženého kódu.</p>
				<p>Používateľ je každá osoba, ktorá inicializuje priame alebo sprostredkované sieťové spojenie so stránkami Prevádzkovateľa, na ktorom je Lokalita zaznamenaná.</p>
				<p>Podmienky používania webovej lokality sú podmienky, za ktorých dodržania Prevádzkovateľ umožňuje používateľovi používať služby a obsah stránok. Podmienky sú pre používateľa a prevádzkovateľa záväzné od okamihu prvého prístupu používateľa na stránky bez ohľadu na ich prípadnú budúcu zmenu zo strany prevádzkovateľa.</p>
				<p>Zmeny a doplnky Podmienok sú pre Používateľa dôležité prečítať, chápať a dodržiavať.  Podmienky sa týkajú všetkých služieb a obsahu poskytovaného na stránke, aj tých, ktoré môžu byť sprístupnené až v budúcnosti. Tým nie je vylúčené, že sprístupnenie osobitných služieb a obsahu stránky bude podrobené okrem týchto Podmienok aj osobitným podmienkam, prípadne budú spoplatnené.</p>
				<p>Prevádzkovateľ si vyhradzuje právo kedykoľvek rozširovať a zužovať rozsah a okruh služieb a obsahu poskytovaných prostredníctvom stránok. Akékoľvek práva v Podmienkach výslovne neuvedené sú vyhradené. Porušenie týchto Podmienok môže mať za následok vážne občianskoprávne a trestnoprávne postihy, pričom Prevádzkovateľ  bude v prípade zistenia takéhoto porušenia alebo z iných overených zdrojov postihovať príslušné osoby v maximálnom zákonnom rozsahu.</p>
				<p>Používateľ je uzrozumený s tým, že mu Prevádzkovateľ poskytuje prostredníctvom Lokality služby a obsah podľa momentálneho stavu poskytovania služieb a obsahu na Lokalite. Pre­vádzkovateľ Lokality preto nezodpovedá Používateľovi za akékoľvek chyby softvérového ale­bo hardvérového charakteru na Lokalite alebo technickom zariadení sprostredkujúcom prístup Používateľa k Lokalite.</p>

				<h4>Práva a povinnosti Používateľa</h4>

				<p>Vzhľadom na globálnu povahu počítačovej siete internet je Používateľ oprávnený používať Lokalitu v súlade s týmito Podmienkami a právnym poriadkom platným v mieste, v ktorom sa používateľ nachádza. Používateľ je osobitne povinný dodržiavať najmä akékoľvek teritoriálne a personálne platné právne a ostatné záväzné pravidlá týkajúce sa správania používateľa v počítačovej sieti a obmedzenia vyplývajúce z kritérií prípustnosti obsahu ním používaných služieb.</p>
				<p>Používateľ sa zaväzuje používať Lokalitu iba v súlade s právom.</p>
				<p>Používateľ nesmie na Lokalitu zasielať a umiestňovať akýkoľvek obsah, ktorý zasahuje neprípustným spôsobom do práv tretích osôb najmä ten, ktorý je protiprávny, výhražný, ohováračský, nekalosúťažný, nactiutŕhačský, urážlivý, týravý, hanlivý, škodlivý, zasahujúci do práva na ochranu osobnosti a súkromia, odporný alebo rasovo, etnicky alebo inak nevhodný, vulgárny a obscénny, narušujúci práva inej osoby, podporujúci konanie kvalifikovateľné ako trestný čin, priestupok alebo iný správny delikt.</p>
				<p>Používateľ zodpovedá v plnom rozsahu za obsah, ktorý zasiela na Lokalitu na účel zverejnenia.</p>
				<p>Iniciovaním prenosu materiálov na účel zverejnenia smerom k serveru Prevádzkovateľa Použí­vateľ výslovne dáva Prevádzkovateľovi na vedomie, že ako osoba oprávnená disponovať s ta­kýmto obsahom udeľuje Prevádzkovateľovi Lokality nevýhradný, časovo neobmedzený súhlas s umiestnením predmetného obsahu na Lokalitu, s ich sprístupnením širokej verejnosti, ako aj s kopírovaním, archivovaním, adaptáciou, prekladom, spracovaním v najširšom možnom rozsahu poskytnutia súhlasu oprávnenou osobou.</p>
				<p>Používateľ je v súlade s platnými právnymi predpismi (napr. autorský zákon, Trestný zákon, Občiansky zákonník) zodpovedný za poškodenie práv oprávnenej osoby, ktoré vznikne z dôvodu neoprávneného použitia obsahu, ku ktorému sa viažu jej práva v zmysle tohto bodu.</p>
				<p>Bez výslovného predošlého písomného súhlasu Používateľ nie je oprávnený na Lokalitu umiestňovať akýkoľvek obsah kvalifikovateľný ako reklamný a propagačný.</p>
				<p>Používateľ  berie na vedomie, že Prevádzkovateľ nezodpovedá za dostupnosť, včasnosť, bezporuchovosť Lokality, ako ani za pravdivosť, aktuálnosť a úplnosť na Lokalite zverejneného obsahu.</p>
				<p>Používateľ  berie na vedomie, že Lokalita ako celok aj jej jednotlivé súčasti sú predmetom ochrany autorských a príbuzných práv duševného vlastníctva, najmä práv rozhlasových a televíznych vysielateľov, ochranných známok, práv majiteľov úžitkových vzorov, priemyselných vzo­rov a iných práv (i majetkových) ich oprávnených nositeľov.</p>

				<h4>Prevádzkovateľ</h4>

				<p>Prevádzkovateľ neposkytuje žiadne vyhlásenia o vhodnosti použitia Lokality na akýkoľvek účel.</p>
				<p>Lokalita je poskytovaná, „tak ako je“, bez akýchkoľvek záruk.</p>
				<p>Prevádzkovateľ vyhlasuje, že neposkytuje žiadne záruky na obsah Lokality vrátane, ale nie vý­hradne implicitných záruk obchodovateľnosti, vhodnosti na konkrétny účel, právneho titulu a neporušenia cudzích práv.</p>
				<p>Prevádzkovateľ nezodpovedá za žiadne škody, a to vrátane, ale nie výhradne škôd mimoriadnych, priamych, nepriamych alebo následných a za žiadne ujmy spôsobené škodou z používania, straty dát alebo zisku, či už v dôsledku konania podľa zmluvy, z nedbanlivosti, alebo následkom iného protiprávneho konania, vyplývajúceho z použitia Lokality alebo súvislosti s tým.</p>

				<h4>Používanie Lokality</h4>

				<p><h5>V prípade, ak nie je dohodnuté inak, Prevádzkovateľ udeľuje svoj súhlas s používaním informácií publikovaných na Lokalite za dodržania nasledujúcich podmienok:</h5></p>
				<p><li>Používateľ je oprávnený zhotoviť kópie obsahu publikovaných na Lokalite výhradne na in­formatívne osobné alebo nekomerčné účely, pričom tieto informácie ako celok ani ako jed­notlivé časti nesmú byť reprodukované žiadnym spôsobom, a to vrátane, ale nie výhradne ich prenesenia na iný počítač alebo publikovania na inej webovej lokalite</li>
				<li>všetky kópie obsahu musia obsahovať informácie o autorských právach</li>
				<li>obsah nesmie byť modifikovaný akýmkoľvek spôsobom</li>
				<li>Vyššie uvedený termín „obsah“ nezahŕňa akýkoľvek na Lokalite umiestnené grafické prvky a ich rozloženie, resp. usporiadanie (ďalej len Vizuál), ktoré je chránené. Vizuál nesmie byť kopírovaný alebo imitovaný ako celok ani ako jednotlivé časti.</li>
				<h5>Používateľ je výslovne poučený a súhlasí s tým, že:</h5>
				<li>používanie Lokality je na Používateľovo vlastné riziko</li></p>

				<h5>Prevádzkovateľ sa nezaručuje, že:</h5>

				<p><li>Lokalita vyhovie požiadavkám Používateľa,</li>
				<li>prevádzka bude neprerušená, neprestajná, bezpečná a bez chýb,</li>
				<li>výsledky, ktoré získa z užívania Lokality, budú presné alebo spoľahlivé,
				kvalita produktov, služieb, informácií alebo ďalších materiálov získaných z Lokality bude napĺňať očakávania Používateľa,</li>
				<li>akékoľvek chyby v softvéri budú odstránené</li>
				<li>Všetok obsah získaný z Lokality je používaný na vlastné riziko a Používateľ samostatne zodpovedá za akúkoľvek škodu na svojom počítačovom systéme alebo strate dát ako vý­sledku zo stiahnutia takýchto materiálov</li>
				<li>Žiadna rada alebo informácia, ústna alebo písaná, získaná Používateľom z Lokality alebo cez či z používania Lokality nevytvára žiadnu záruku výslovne uvedenú v podmienkach.</li></p>

				<h4>Vyhlásenie používateľa</h4>

				<p><h5>Používateľ Lokality súhlasí, že:</h5>
				<li>nebude používať Lokalitu na účel spôsobovania škody ľubovoľným spôsobom</li>
				<li>nebude sa vydávať za inú osobu alebo spoločnosť vrátane, ale nie výhradne za spolupra­covníka Prevádzkovateľa</li>
				<li>nebude falšovať záhlavie alebo inak manipulovať s identifikátormi, aby sa zamaskoval pô­vod materiálu prenášaného prostredníctvom Lokality</li></p>

				<h4>Hypertextové prepojenia na Lokalitu</h4>

				<p><h5>V prípade, ak nie je dohodnuté inak, Prevádzkovateľ udeľuje svoj súhlas na vytvorenie hyper­textového prepojenia na Lokalitu z akejkoľvek inej webovej lokality dostupnej prostredníctvom siete internet (ďalej len „Tretia lokalita“) za dodržania nasledujúcich podmienok:</h5>
				<li>obsah Tretej lokality je v súlade so všeobecne záväznými právnymi a etickými normami platnými v Slovenskej republike a neobsahuje obscénny, hanlivý, urážlivý, pornografický alebo iným spôsobom nevhodný materiál bez rozdielu vekovej skupiny</li>
				<li>informácie uvedené na Tretej lokalite nesmú prezentovať nepravdivé, prípadne zavádzajú­ce informácie o Lokalite a/alebo Prevádzkovateľovi</li>
				<li>forma umiestnenia hypertextového odkazu na Tretej lokalite nesmie vzbudzovať dojem akéhokoľvek vzťahu medzi Treťou lokalitou a/alebo jej prevádzkovateľom a Lokalitou a/ale­bo Prevádzkovateľom, a to vrátane, ale nie výhradne obchodného partnerstva, sponzorin­gu alebo inej podpory</li>
				<li>súčasťou hypertextového prepojenia umiestneného na Tretej lokalite nesmú byť žiadne in­formácie umiestnené na Lokalite s výnimkou názvu a príslušnej adresy (URI) cieľového ob­jektu Lokality</li>
				<li>žiadny objekt Lokality nesmie byť hypertextovým prepojením umiestnený do rámu akejkoľ­vek inej lokality, a to vrátane, ale nie výhradne Tretej lokality</li>
				<li>prevádzkovateľ Tretej lokality umiestnením hypertextového prepojenia na Lokalitu súhlasí, že na žiadosť Prevádzkovateľa bezodkladne odstráni akékoľvek hypertextové prepojenie smerujúce na Lokalitu, a to aj v prípade, že spĺňa podmienky definované týmito Podmienkami</li>

				<h3>Hypertextové prepojenia umiestnené na Lokalite</h3>

				<p>Súčasťou Lokality sú hypertextové prepojenia na iné webové lokality, dostupné prostredníc­tvom siete internet (ďalej len „Prepojené lokality“). Prevádzkovateľ neriadi Prepojené lokality, a preto nezodpovedá za obsah na nich publikovaný. Poskytnutie hypertextového prepojenia na Prepojenú lokalitu neznamená, že Prevádzkovateľ schvaľuje obsah na nej publikovaný a súhlasí s ním.</p>
				<p>Prevádzkovateľ poskytuje hypertextové prepojenia ako pomôcku, pričom verí, že ich poskyt­nutie je v súlade so všeobecne záväznými právnymi normami a zodpovedá očakávaniam pou­žívateľov siete internet.</p>

				<h3>Počítačové vírusy</h3>

				<p>Prevádzkovateľ vyhlasuje, že vykonáva všetky zvyčajné opatrenia na zabránenie umiestnenia počítačových vírusov a iného deštruktívneho kódu vrátane, ale nie výhradne trójskych koňov, červov alebo iným spôsobom nebezpečného programového kódu na Lokalitu.</p>

				<h3>Osobitné ustanovenia</h3>

				<p>Prevádzkovateľ je oprávnený aj v rámci voľnej úvahy bez predchádzajúceho upozornenia od­strániť akýkoľvek obsah a prestať poskytovať akékoľvek služby, ktoré sú prostredníctvom Lo­kality poskytované.</p>
				<p>Prevádzkovateľ si vyhradzuje právo kedykoľvek modifikovať alebo prerušiť, či už na určitý na čas, alebo permanentne, prevádzku Lokality, a to aj bez predošlého upozornenia.</p>
				<p>Prevádzkovateľ žiadnym spôsobom nezodpovedá Používateľovi alebo tretej strane za modifi­káciu, pozastavenie alebo prerušenie prevádzky Lokality.</p>
				<p>Používateľ súhlasí s tým, že Prevádzkovateľ mu môže ukončiť či prerušiť možnosť používania Lokality a odstrániť a znehodnotiť každý materiál, z akéhokoľvek dôvodu vrátane prípadu, ak sa Prevádzkovateľ domnieva, že Používateľ porušil alebo nepostupoval v súlade so zákonom alebo týmito podmienkami.</p>
				<p>Používateľ výslovne berie na vedomie, že akékoľvek ukončenie prístupu k Lokalite podľa jed­notlivých ustanovení týchto podmienok môže byť uskutočnené bez predchádzajúceho súhlasu z jeho strany.</p>
				<p>Používateľ s týmito oprávneniami prevádzkovateľa vopred súhlasí.</p>

				<h3>Platnosť a účinnosť</h3>

				<p>Tieto Podmienky boli dohodnuté na neurčitý čas.</p>
				<p>Prevádzkovateľ a Používateľ môžu vzájomný zmluvný vzťah podľa týchto Podmienok kedykoľ­vek a bez obmedzenia ukončiť.</p>
				<p>Tieto Podmienky v platnom znení nahrádzajú všetky predchádzajúce ústne aj písomné doho­vory a zmluvy medzi Prevádzkovateľom a Používateľom týkajúce sa rovnakého predmetu plne­nia.</p>
				<p>Podmienky sú pre Používateľa a Prevádzkovateľa záväzné od momentu prvého prístupu Pou­žívateľa na Lokalitu bez ohľadu na ich prípadnú budúcu zmenu zo strany Prevádzkovateľa. Zmeny a doplnky Podmienok sú pre Používateľa účinné od opätovného iniciovania spojenia so serverom Prevádzkovateľa.</p>
				<p>Oznamy určené Používateľovi budú zasielané prostredníctvom elektronickej pošty alebo budú umiestnené na Lokalite.</p>

				<h3>Záverečné ustanovenia</h3>

				<p>Tieto Všeobecné podmienky sa spravujú právom Slovenskej republiky. Otázky, ktoré všeo­becné podmienky neriešia, sa spravujú ustanoveniami autorského zákona, Občianskeho zá­konníka, Trestného zákona, zákona o ochranných známkach, zákona o reklame a ostatnými všeobecne záväznými právnymi predpismi.</p>
				<p>Ak sa niektoré z ustanovení týchto Podmienok stane celkom alebo sčasti neúčinným, nemá táto skutočnosť vplyv na účinnosť zvyšných ustanovení.</p>

				<h3>Ďalšie doplňujúce podmienky</h3>
				<p>Pracuje sa...</p>
				<p>V Starej Ľubovni, dňa 20. 02. 2013</p>
			</div>
		</div>

		<?php
		require 'stranka/telo2.php';

		# spod stranky
		require 'stranka/spod.php';

	}
	elseif ($_GET['pomoc'] == 'hladame-redaktorov') {
		# HLADAME REDAKTOROV
		require 'db.php';
		require 'stranka/hlava.php';
		require 'stranka/vrch.php';
		require 'stranka/telo1.php';
		?>
		<h3>HĽADÁME REDAKTOROV</h3>
		<p>Redakcia nášho portálu "projektu" mobilai.cz, hľadá ľudí !!!</p>
		<h4>Popis</h4>
		<p>Zaoberáme sa mobilnými systémami iOS, android, píšeme tutoriály a rôzne tipy a triky, nahrávame videa, píšeme recenzie pre hry a aplikácie samozrejme nezabudáme ani na iPhony, i zariadenia od Applu a najmodernejšie smartfóny. Recenzujeme najmodernejšie výdobytky modernej techniky, IT a nesmieme zabúdať na to čo nás ešte čaká umelá inteligencia a tiež robotika. Všetko spolu premiešame, zmixujeme a čakáme na vás mobilai.cz/</p>
		<h4>Hľadáme Práve Vás</h4>
		<p>Hľadáme ľudí, ktorých baví sledovať najnovšie, najmodernejšie zaujímavosti z IT sveta alebo aspoň takých, ktorých to zaujíma. Nehľadáme biflošov!! :D
		Máte záujem občas napísať niečo, nikdy neviete kto vás pozoruje a možno si práve vás všimne niekto práve tým, čo ste napísali na http://www.mobilai.cz/</p>
		<p>Tešíme sa na Vaše príspevky.</p>
		<p>Ďakujeme.</p>
		<?php
		require 'stranka/telo2.php';

		# spod stranky
		require 'stranka/spod.php';

	}
	else {
		header('Location: /');
		exit();
	}

}
else {
	header('Location: /');
	exit();
}




?>

