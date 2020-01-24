# Booktopia

## Mediu Windows
Pentru rularea proiectului sunt necesare instalate pe masina locala urmatoarele: 
1. **[XAMPP](https://www.apachefriends.org/ro/download.html)** - Aplicatie pentru acces usor la utilitare precum Apache, PHP, MariaDB si phpMyAdmin
2. **[Composer](https://getcomposer.org/download/)** - Manager de dependinte pentru PHP
3. **[Laravel](https://laravel.com/docs/5.8/installation)** - Framework pentru PHP

## Configurare
1. In fisierul **httpd-xampp.conf**, ce poate fi accesat din dropdown-ul **Config** corespunzator serverului de **Apache**, aflat in panoul principal **XAMPP**, vom insera codul:
```
<IfModule mod_rewrite.c>
    RewriteEngine On

    # Redirect /xampp folder to https
    RewriteCond %{HTTPS} !=on
    RewriteCond %{REQUEST_URI} xampp
    RewriteRule ^(.*) https://%{SERVER_NAME}$1 [R,L]

    # Redirect /phpMyAdmin folder to https
    RewriteCond %{HTTPS} !=on
    RewriteCond %{REQUEST_URI} phpmyadmin
    RewriteRule ^(.*) https://%{SERVER_NAME}$1 [R,L]

    # Redirect /security folder to https
    RewriteCond %{HTTPS} !=on
    RewriteCond %{REQUEST_URI} security
    RewriteRule ^(.*) https://%{SERVER_NAME}$1 [R,L]

    # Redirect /webalizer folder to https
    RewriteCond %{HTTPS} !=on
    RewriteCond %{REQUEST_URI} webalizer
    RewriteRule ^(.*) https://%{SERVER_NAME}$1 [R,L]
</IfModule>
```
Acest cod asigura redirectarea cererilor de tip **HTTP** catre **HTTPS**.
Certificatul se gaseste in folderul **"\xampp\apache\conf\ssl.crt\server.crt"**.
Cheia se gaseste in folderul **"\xampp\apache\conf\ssl.key\server.key"**.

2. Accesam cu drepturi de administrator fisierul **"C:\Windows\System32\drivers\etc\hosts"** si inseram un nou rand, ce mapeaza un ip intr-un domeniu, cu formatul urmator:
```
{ IP valid din reteaua de loopback = 127.0.0.0/8 Exemplu. 127.0.0.3 } shop.booktopia
```

3. In fisierul **my.ini** , ce poate fi accesat din dropdown-ul **Config** corespunzator serverului de **MySQL**, aflat in panoul principal **XAMPP**, setam urmatoarele configurari:
- ``` max_allowed_packet = 64M ```
- ```bind-address = "{ IP valid din reteaua de loopback = 127.0.0.0/8 diferit de cel pt aplicatie Exemplu 127.0.0.4 }"```

4.  In fisierul **config.inc.php**, ce poate fi accesat din dropdown-ul **Config** corespunzator serverului de **Apache**, aflat in panoul principal **XAMPP**, setam urmatoarele configurari:
- ``` $cfg['Servers'][$i]['auth_type']  =  'cookie'; ``` # Afiseaza o forma pt introducerea credentialelor

- ``` $cfg['Servers'][$i]['user']  =  'root'; ``` # MySQL Admin Username
- ``` $cfg['Servers'][$i]['password']  =  ''; ``` # MySQL Admin Password
- ``` $cfg['Servers'][$i]['AllowNoPassword']  =  true; ``` # Permite adminului sa se conecteze fara parola

- ``` $cfg['ForceSSL']  =  true; ``` # Forteaza phpMyAdmin sa primeasca request-uri doar de tip HTTPS

- ``` $cfg['Servers'][$i]['host']  =  '{ IP-ul serverului de MySQL (Pas 3) }'; ```

5. Pornim serverele de Apache si MySQL, accesand butoanele **Start**, aflate in panoul principal **XAMPP**, corespunzatoare fiecarui server.

6. Ne conectam la **phpMyAdmin** accesand URL-ul
```
https//{ IP-ul serverului de MySQL (Pas 3) }/phpMyAdmin
```
Mergem pe tabul **User accounts** si modificam parola userului **root** ( Administratorul ) pt toate hosturile.

Pentru a schimba parola accesam butonul **Edit privileges**, dupa care **Change password**, inseram o parola sau putem genera una (Atentie! Daca se genereaza pt un host atunci vom folosi aceeasi parola generata si pt celelalte hosturi), dupa care salvam prin actiunea butonului **Go**.

7. Oprim serverele de Apache si MySQL, accesand butoanele **Stop**, aflate in panoul principal **XAMPP**, corespunzatoare fiecarui server. 

8. Dupa ce am setat parola administratorului bazei de date, putem reveni la configurarea **phpMyAdmin**          (Fisierul de la pasul 4) si setam optiunea ``` $cfg['Servers'][$i]['AllowNoPassword']  =  false; ```, pt a forta administratorul sa isi introduca parola atunci cand vrea sa se conecteze la platforma.

9. In interiorul folderului **"\xampp\apache\conf\extra"** cream un fisier **httpd-vhosts.conf** in care vom crea hosturi virtuale:
```
# Booktopia
<VirtualHost shop.booktopia:80>
	DocumentRoot "{ Directorul in care este descarcat proiectul }/Booktopia/public/"
	ServerName shop.booktopia
	# http://shop.booktopia/
	# Portul default pt HTTP este 80 si poate fi omis

	<Directory "{ Directorul in care este descarcat proiectul }/Booktopia/public/">
		Options All
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>

# Booktopia
<VirtualHost shop.booktopia:443>
	DocumentRoot "{ Directorul in care este descarcat proiectul }/Booktopia/public/"
	ServerName shop.booktopia
	# https://shop.booktopia/
	# Portul default pt HTTPS este 443 si poate fi omis

	SSLEngine on
	SSLCertificateFile "conf/ssl.crt/server.crt"
	SSLCertificateKeyFile "conf/ssl.key/server.key"

	<Directory "{ Directorul in care este descarcat proiectul }/Booktopia/public/">
		Options All
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>
```

10. Pornim serverele de Apache si MySQL, accesand butoanele **Start**, aflate in panoul principal **XAMPP**, corespunzatoare fiecarui server.

11. Accesam **phpMyAdmin** si cream o baza de date numita **booktopia**. Pentru asta accesam butonul **New** din panoul stang, dam nume bazei de date in campul **Database name** si accesam butonul **Create**.

12. Importam datele necesare aplicatiei. Accesam baza de date din panoul stang, apoi tabul **Import**, accesam butonul **Browse** si selectam fisierul **booktopia.sql**, dupa care actionam butonul **Go**.

13.  In interiorul folderului **Booktopia** cream un fisier numit **.env** ce initial va avea acelasi continut cu fisierul **.env.example**.
Setam apoi urmatoarele proprietati:
- ``` APP_NAME=Booktopia ```
- ``` APP_KEY=base64:qGvi+mJjsEN+yPBWP7JBSNBmo3K145p1L0HgJEGc8JQ= ```
- ``` APP_URL=https://shop.booktopia ```
- ``` DB_CONNECTION=mysql ```
- ``` DB_HOST={ IP-ul serverului de MySQL (Pas 3) } ```
- ``` DB_PORT=3306 ```
- ``` DB_DATABASE=booktopia ```
- ``` DB_USERNAME=root ```
- ``` DB_PASSWORD={ Parola administratorului serverului de MySQL (Pas 6) } ```
Pentru email trebuie setate si cele 6 proprietati: MAIL_DRIVER, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD, MAIL_ENCRYPTION.

14. In terminal rulam ``` composer install ``` pentru a descarca dependintele necesare.
 
 #### In momentul acesta aplicatia este functionala si se poate accesa la adresa https://shop.booktopia

## Componente
Nume                           | Cale                      | Descriere
------------------------------ | ------------------------- | ---------------------- 
Controller                     | app/Http/Controllers      | Prelucrari de date
Middleware                     | app/Http/Middleware       | Porti pt request-uri
Model	                       | app/Models	               | Wrapper peste tabel din baza de date
Fisiere de configurare         | config/                   | Configurari interne aplicatiei
Migrari                        | database/migrations       | Fisiere de actualizare BD
View                           | resources/views 	       | Pagini WEB returnate in browser
Fisiere CSS                    | public/css 		       | Stilizarea paginilor WEB
Fisiere JS                     | public/js		           | Functionalitatea paginilor WEB
Imagini                        | public/images		       | Imagini utilizate in aplicatie
Rute                           | routes/web.php		       | Sistemul de rutare
Log                            | storage/logs		       | Logul aplicatiei
Teste                          | tests/			           | Teste ce pot fi rulate
Dependinte                     | vendor/		           | Librarii
Fisier de configurare globala  | .env                      | Variabile de mediu
Fisier de declarare dependinte | composer.json             | Declarare librarii noi ce trebuie incluse

## Virtual Box Ova
Exista si optiunea de a descarca o imagine de Windows in care este totul configurat.
Pentru asta este necesara instalarea **[VirtualBox](https://www.virtualbox.org/wiki/Downloads)**  si importarea imaginiii **[Windows&Booktopia](http://www.mediafire.com/file/tkq2eth6zl16ned/Windows%2526Booktopia.ova/file)**.
