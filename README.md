# Primerjalnik Cen
Projektna pri praktikum 2

Je spletna aplikacija namenjena temu, da primerjamo ceno enega izdelka iz večih trgovin. S tem si olajšamo nakupovanje saj vemo v kateri trgovini je cenejši izdelek.

# Ideja aplikacije
Naša spletna aplikacija deluje na računalniku pravtako pa tudi na mobilni aplikaciji. Imamo seznam vseh izdelkov, ki so jih dodali uporabniki spletne aplikacije. Te izdelke lahko izberete in se vam pokažejo dodatne informacije kot so: cena, lokacija izdelka, slika izdelka, cenovni diferencial(procentualna razlika med največjo ceno in najmanjšo),... z teh informacij se lahko odločimo kje bomo kupili izdelek. Pri tem pa si lahko pomagamo z google maps z klikom na trgovino, ki nam prikaže najbližje lokacije izbrane trgovine. Imamo tudi "wishlist", ki je lahko uporabljen kot ene vrste "shoppinglist" kjer si zapišemo vse izdelke, ki jih imamo namen kupit preden gremo v trgovino.
# Inštalacija
Pritisk na gumb clone or download. Downloadate v obliki .zip dokumenta. Zatem unzipate pa dodate v htdocs folder v XAMPP mapi(ali na podoben način na drugih aplikacijah). Start apache na XAMPP -> pritisk na gumb admin -> izbereš index.php zatem pa slediš navodilam iz <b>Uporaba aplikacije</b>.
# Uporaba aplikacije
Začetna stran je index.php kjer je opcija za prijavo in registracijo. Po registraciji/prijavi pa je na voljo dodajanje izdelkov in pregled vseh izdelkov. Pri vnašanju izdelkov je potrebno vnesti barcode ali pa ga skeniraš z scannerjem z pritiskom na gumb "scan". Za primerjavo pa gremo na podrobnost izdelka in če je isti izdelek dodan v drugi trgovini se prikažejo opcije za primerjavo cen iz drugih trgovin.<br>
![alt text](https://github.com/FaricJure/Primerjalnik_Cen/blob/master/praktikum2.2/img/chocolate.jpg)<br>
slika 1: Homepage.<br>
Lahko pa se samo povežete na našo domeno preko naslednje povezave (če je host online):<br>
https://www.cena3.tk

# API-i, ki smo jih uporabili
Pri razvijanju projekta smo uporabili že narejen Barcode reader od podjetja <b>dynamsoft</b>.<br>
Link: https://www.dynamsoft.com/
<br>
![alt text](https://github.com/FaricJure/Primerjalnik_Cen/blob/master/praktikum2.2/img/chocolate.jpg)<br>
slika 2: Uporaba dynamsoftovega javascripta.<br>
Uporabili smo tudi api, ki ti najde public ipv4 od podjetja <b>ipify</b>.
<br>
Link: https://www.ipify.org/
<br>
![alt text](https://github.com/FaricJure/Primerjalnik_Cen/blob/master/praktikum2.2/img/chocolate.jpg)<br>
Uporabili smo tudi google maps API, ki se uporablja, ko klikneš na sliko od trgovine, da ti prikaže vse najbližje trgovine od izbrane trgovine.
<br>
Link: https://cloud.google.com/maps-platform/<br>
![alt text](https://github.com/FaricJure/Primerjalnik_Cen/blob/master/praktikum2.2/img/chocolate.jpg)<br>
slika 3: uporaba google maps api za prikaz najbližjih trgovin.<br>
Uporabili smo tudi freenom, na katerem smo naredili zastonj domeno na katero se lahko uporabniki povežejo brez, da bi si morali inštalirat naš projekt, kar naredi našo spletno aplikacijo še dodatno enostavno za uporabljat.<br>
![alt text](https://github.com/FaricJure/Primerjalnik_Cen/blob/master/praktikum2.2/img/chocolate.jpg)<br>
Link: https://www.freenom.com/en/index.html?lang=en

# Delo na projektu
Pri izdelovanju spletne aplikacije smo uporabili agilno metodo kanban. Ko je posameznik z določenim "taskom" končal je naredil drugega in začel delat na njem. S tem smo lahko naredili čim več stvari brez, da bi zapravljali čas.<br>
Večinoma smo pa delali po parih, še posebej, ko smo odpravljali težave v kodi (extremno programiranje).<br>
Enostavne funkcionalnosti pa je ponavadi vsak naredil sam (prijava, bannanje/disablanje uporabnikov, podatkovna baza za določen problem,...).<br>
Eftimije : Bojana<br>
Jure : Nikolaj<br>
Za komuniciranje smo pa uporabljali Facebook ter Discord.

# Avtorji
Jure Farič, <jure.faric@student.um.si><br>
Nikolaj Gradišnik, <nikolja.gradisnik@student.um.si> <br>
Eftimije Tomovski, <eftimije.tomovski@student.um.si> <br>
Bojana Markova, <bojana.markova@student.um.si>
