<?php
if(!Exists::tab(array('client', 'entreprise', 'siret', 'adresse', 'cp', 'tel', 'mail', 'date'), $_POST))
	return;
$print = '<link rel="stylesheet" media="print" type="text/css" title="skinPrint" href="library/css/print.css">';
Head::insert('facture', 'Zone admin', 'Facture: '.$client, $print);
echo '
<h1 class="ongletTitre">Facture pour '.$client.'</h1>
<div class="corp" id="facture" contenteditable="true">
	<nav class="slide">
		<button id="add">Ajout article</button>
		<button id="save">Sauvegarder</button>
		<button id="mail">E-mail</button>
		<button id="print">Imprimer</a>
	</nav>
	<p>
		<h3>'.ucfirst($entreprise).'</h3>
		<h3>'.$adresse.'</h3>
		<h3>'.$cp.'</h3>
		<h3>'.$tel.'</h3>
		<h3>'.$mail.'</h3>
		<h3>N° SIRET : '.$siret.'</h3>
		<br><br>
		<h3 class="right">Facturé à: '.ucfirst($client).'</h3>
		<h3 class="right">Date : '.$date.'</h3>
	</p>
	<table>
		<thead>
			<tr>
				<th>Désignation</th>
				<th>Quantité</th>
				<th>Prix unitaire HT</th>
				<th>Prix total HT</th>
			</tr>
		</thead>
		<tbody>
		
		</tbody>
		<tfoot>
			<tr>
				<td></td><td></td><td></td><td></td>
			</tr>
			<tr>
				<td></td><td>Total Hors Taxe<td></td><td id="totalFactureHT">00,00€</td>
			</tr>
			<tr>
				<td></td><td>TVA à Taux applicable<td></td><td id="totalFactureTVA">00,00 €</td>
			</tr>
			<tr>
				<td></td><td>Total TTC en euros<td></td><td id="totalFactureTTC">00,00 €</td>
			</tr>
		</tfoot>
	</table>
</div>';
Foot::insert(array('facture.js'));die;