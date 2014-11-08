<?php Head::insert('mail', 'Zone admin', 'Mailator'); ?>
<h1 class="ongletTitre">Mailator</h1>
<div class="container corp center">
    <div class="page-header">
    </div>
    <form method="post" action="">
        <?php
        if (isset($_POST['action']) && $_POST['action'] == 'envoyer' && empty($send_error)) {
            echo '<h2><a class="blue">&times;Email envoyé avec succès !</a></h2>';
        }else if (isset($send_error)) {
            echo '<div class="red"><a href="#">&times;</a>'.$send_error.'</div>';
        }
        ?>
		<label for="to">Email cible</label><br>
		<input type="text" name="to" id="to" value="<?php if (isset($_POST['to'])) echo $_POST['to']; ?>"><br><br>
		<label for="to">Cci<br>(séparés par des virgules)</label><br>
		<input type="text" name="cci" value="<?php if (isset($_POST['cci'])) echo $_POST['cci']; ?>"><br><br>
		<label for="subject">Sujet</label><br>
		<input type="text" name="subject" value="<?php if (isset($_POST['subject'])) echo $_POST['subject']; ?>"><br><br>
		<label for="message">Message (format HTML)</label><br>
		<textarea name="message" rows="20" cols="50"><?php if (isset($_POST['message'])) echo $_POST['message']; ?></textarea><br><br>
		<input type="hidden" name="action" value="envoyer">
		<button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
<?php Foot::insert(); ?>