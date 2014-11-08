RewriteEngine on

#MAINTENANCE redirige tout sauf ip ci dessous
#RewriteCond %{REMOTE_ADDR} !0.0.0.0
#RewriteCond %{REMOTE_ADDR} !::1
#RewriteRule .* maintenance.html [L]

DirectoryIndex index.php error-403

#refu lecture des fichier commencent par ".ht"
<Files ".ht*">
Deny from all
</Files>

#désactive le mode de compatibilité i.e.
header set X-UA-Compatible "IE=Edge"
<FilesMatch ".(js|css|gif|png|jpe?g|pdf|xml|oga|ogg|m4a|ogv|mp4|m4v|webm|svg|svgz|eot|ttf|otf|woff|ico)$">
 Header unset X-UA-Compatible
</FilesMatch>

Options All -Indexes
AddDefaultCharset UTF-8