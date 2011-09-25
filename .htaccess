Options -Indexes
RewriteEngine On
RewriteRule ^(css|js|img|lib)/(.*)$ public/$1/$2 [L]
RewriteCond %{REQUEST_FILENAME} -s [OR]
RewriteCond %{REQUEST_FILENAME} -l
RewriteRule ^.*$ - [NC,L]
RewriteRule ^.*$ index.php [NC,L]