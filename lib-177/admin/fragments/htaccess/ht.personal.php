RewriteRule ^admin/error-([0-9]+)$							admin/ctr.ctr.php?action177=error&error=$1 [L]
RewriteRule ^admin/maj-([a-z]+)$							admin/ctr.ctr.php?action177=maj&archive=$1 [L]
RewriteRule ^admin/cfg-([a-zA-Z0-9_]+)-([a-zA-Z]+)$			admin/ctr.ctr.php?action177=cfg&src=$1&outil=$2 [L]
RewriteRule ^admin/cfg-([a-zA-Z0-9_]+)$						admin/ctr.ctr.php?action177=cfg&src=$1 [L]

RewriteRule ^admin/explore-([a-zA-Z0-9]+)-([a-zA-Z0-9_-]+)-([a-zA-Z0-9_,-.]+)-([-a-zA-Z0-9_,/.]+)-([-a-zA-Z0-9_,/.]+)$		admin/ctr.ctr.php?action177=explore&exploAction=$1&exploProject=$2&destination=$3&cible=$4&distant=$5 [L]
RewriteRule ^admin/explore-([a-zA-Z0-9]+)-([a-zA-Z0-9_-]+)-([a-zA-Z0-9_,-.]+)-([-a-zA-Z0-9_,/.]+)$		admin/ctr.ctr.php?action177=explore&exploAction=$1&exploProject=$2&destination=$3&cible=$4 [L]
RewriteRule ^admin/explore-see-([a-zA-Z0-9]+)-0$							admin/ctr.ctr.php?action177=explore&exploAction=see&exploProject=$1 [L]
RewriteRule ^admin/explore-([a-zA-Z0-9]+)$									admin/ctr.ctr.php?action177=explore&exploProject=$1 [L]
RewriteRule ^admin/explore$													admin/ctr.ctr.php?action177=explore&exploAction=see [L]

RewriteRule ^admin/userAjax-([a-zA-Z0-9]+)-([a-zA-Z0-9]+)$					admin/ctr.ctr.php?action177=userAjax&action=$1&cible=$2 [L]
RewriteRule ^admin/userAjax-([a-zA-Z0-9]+)$									admin/ctr.ctr.php?action177=userAjax&action=$1 [L]
RewriteRule ^admin/ftpFavor-([a-zA-Z0-9_,-]+)-([-a-zA-Z0-9_/.]+)$			admin/ctr.ctr.php?action177=ftpFavor&actionFtpFav=$1&cible=$2 [L]
RewriteRule ^admin/ftp-see-([a-zA-Z0-9_,-]+)-([-a-zA-Z0-9_/.]+)$			admin/ctr.ctr.php?action177=ftp&actionFtp=see&destination=$1&cible=$2 [L]
RewriteRule ^admin/ftp-([a-zA-Z]+)-([a-zA-Z0-9_,-]+)-([-a-zA-Z0-9_/.]+)$	admin/ctr.ctr.php?action177=ftp&actionFtp=$1&destination=$2&cible=$3 [L]
RewriteRule ^admin/fragment-([a-zA-Z0-9]+)$									admin/ctr.ctr.php?action177=fragments&action=$1
RewriteRule ^admin/fragment$								    			admin/ctr.ctr.php?action177=fragments [L]
RewriteRule ^admin/([a-zA-Z0-9_-]+)$										admin/ctr.ctr.php?action177=$1 [L]