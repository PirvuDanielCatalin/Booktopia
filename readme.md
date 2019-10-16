# Booktopia

## Mediu Windows
Pentru rularea proiectului sunt necesare instalate pe masina locala urmatoarele: 
1. **[XAMPP](https://www.apachefriends.org/ro/download.html)** - Utilizat pt acces usor la utilitare precum Apache, PHP, MariaDB si phpMyAdmin
2. **[Composer](https://getcomposer.org/download/)** - Manager de dependinte pt PHP
3. **[Laravel](https://laravel.com/docs/5.8/installation)** - Framework pt PHP

## Configurare XAMPP
1. In fisierul **httpd-xampp.conf**, ce poate fi accesat din dropdown-ul Config corespunzator serverului de Apache aflat in panoul principal, vom insera codul 
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

    # Redirect /folder_name folder to https
    RewriteCond %{HTTPS} !=on
    RewriteCond %{REQUEST_URI} folder_name
    RewriteRule ^(.*) https://%{SERVER_NAME}$1 [R,L]
</IfModule>
```
Acest cod asigura redirectarea cererilor de tip HTTP catre HTTPS.
Certificatul se gaseste in folderul **"\xampp\apache\conf\ssl.crt\server.crt"**.
Cheia se gaseste in folderul **"\xampp\apache\conf\ssl.key\server.key"**.

2. In fisierul **my.ini** , ce poate fi accesat din dropdown-ul Config corespunzator serverului de MySQL aflat in panoul principal, setam urmatoarele configurari:
``` max_allowed_packet  = 64M ```
``` bind-address = "127.0.0.4" ```

3.  In fisierul **config.inc.php**, ce poate fi accesat din dropdown-ul Config corespunzator serverului de Apache aflat in panoul principal, setam urmatoarele configurari:
- ``` $cfg['Servers'][$i]['auth_type']  =  'cookie'; ```

- ``` $cfg['Servers'][$i]['user']  =  'root'; ```
- ``` $cfg['Servers'][$i]['password']  =  ''; ```
- ``` $cfg['Servers'][$i]['AllowNoPassword']  =  true; ```

- ``` $cfg['ForceSSL']  =  true; ```
- ``` $cfg['Servers'][$i]['host']  =  '127.0.0.4'; ```

4. Pornim serverele de Apache si MySQL 

5. Ne conectam la **phpMyAdmin** accesand URL-ul [phpMyAdmin](https://127.0.0.4/phpMyAdmin).
Mergem pe tabul **User accounts** si modificam parola userului **root** pt toate hosturile.
Pentru a schimba parola accesam butonul **Edit privileges**, dupa care **Change password**, inseram o parola sau putem genera una (Atentie! Daca se genereaza pt un host atunci vom folosi aceeasi parola generata si pt celelalte hosturi), dupa care salvam prin actiunea butonului **Go**.

6. Oprim serverele de Apache si MySQL 

7. Dupa ce am setat parola administratorului de baza de date, putem reveni la configurarea phpMyAdmin adica fisierul de la pasul 3 si setam optiunea ``` $cfg['Servers'][$i]['AllowNoPassword']  =  false; ```

8. Accesam cu drepturi de administrator fisierul **"C:\Windows\System32\drivers\etc\hosts"** si inseram un nou rand, ```127.0.0.3   shop.booktopia      # Booktopia```, ce mapeaza un ip intr-un domeniu

9. In interiorul folderului **"\xampp\apache\conf\extra"** cream un fisier **httpd-vhosts.conf** in care vom crea hosturi virtuale:
```
# Booktopia
<VirtualHost 127.0.0.3:80>
	DocumentRoot "{Directorul in care este descarcat proiectul}/Booktopia/public/"
	ServerName shop.booktopia
	# http://shop.booktopia/

	<Directory "{Directorul in care este descarcat proiectul}/Booktopia/public/">
		Options All
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>

# Booktopia
<VirtualHost 127.0.0.3:443>
	DocumentRoot "{Directorul in care este descarcat proiectul}/Booktopia/public/"
	ServerName shop.booktopia
	# https://shop.booktopia/

	SSLEngine on
	SSLCertificateFile "conf/ssl.crt/server.crt"
	SSLCertificateKeyFile "conf/ssl.key/server.key"

	<Directory "{Directorul in care este descarcat proiectul}/Booktopia/public/">
		Options All
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>
```

10. Pornim serverele de Apache si MySQL 

11. Accesam phpMyAdmin si cream o baza de date numita **booktopia**. 

