<?php
Head::insert('error-'.$code, $meta_desc,$site_name.' - Erreur '.$code.'!');
echo '
<h2 class="h2Error">(erreur '.$code.')</h2>
<h3 class="h3Error center">'.$message_error.'</h3>';
if(isset($complement))
    echo '<h3 class="h3Error" id="complement">'.$complement.'</h3>';
echo '
<h4 class="h4Error center">Vous allez être redirigé dans un instant...</h4>
<h5 class="h5Error center">
    Si vous ne souhaitez pas attendre,
    cliquez <a href="'.$src_redirect.'">ici</a>
</h5>';
Foot::insert(); die;
?>