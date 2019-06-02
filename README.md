# Primerjalnik_Cen
Projektna pri praktikum 2

Je spletna aplikacija namenjena temu, da primerjamo ceno enega izdelka iz večih trgovin. S tem si olajšamo nakupovanje saj vemo v kateri trgovini je cenejši izdelek.

# Features
Naša spletna aplikacija deluje na računalniku pravtako pa tudi na mobilni aplikaciji. Imamo seznam vseh izdelkov, ki so jih dodali uporabniki spletne aplikacije.

# How to use?
Začetna stran je index.php kjer je opcija za prijavo in registracijo. Po registraciji/prijavi pa je na voljo dodajanje izdelkov in pregled vseh izdelkov. Pri vnašanju izdelkov je potrebno vnesti barcode ali pa ga skeniraš z scannerjem z pritiskom na gumb "scan". Za primerjavo pa gremo na podrobnost izdelka in če je isti izdelek dodan v drugi trgovini se prikažejo opcije za primerjavo cen iz drugih trgovin.

# Installation
Pritisk na gumb clone or download. Downloadate v obliki .zip dokumenta. Zatem unzipate pa dodate v htdocs folder v XAMPP mapi(ali na podoben način na drugih aplikacijah). Start apache na XAMPP -> pritisk na gumb admin -> izbereš index.php zatem pa slediš navodilam iz <b>how to use?</b>.

# API Reference
Pri razvijanju projekta smo uporabili že narejen Barcode reader od podjetja <b>dynamsoft</b>.<br>
Link: https://www.dynamsoft.com/<br>
<br>
Uporabili smo tudi api, ki ti najde public ipv4 od podjetja <b>ipify</b>.<br>
Link: https://www.ipify.org/
