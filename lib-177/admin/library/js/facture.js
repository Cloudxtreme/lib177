$(function(){
	var nb, prix, total, tva, lastInsert = 0;
	$('#add').on('click', function(){
		lastInsert++;
		newProd(lastInsert);
	});
	$('#save').on('click', function(){
		majProd('#prod0');
	});
	$('#mail').on('click', function(){
		majProd('#prod0');
	});
	$('#print').on('click', function(){
		window.print();
	});
	function calcFacture(){
		total = 0;
		$('#facture table tbody .prixTotal').each(function(i){
			prix = parseInt($('#prod'+i+' .prixTotal').val(), 10);
			if(!isNaN(prix)){
				total += prix;
			}
		});
		$('#totalFactureHT').text(total+' €');
		$('#totalFactureTTC').text(total+' €');
	}
	function virtualPlaceholder(id, cible, texte){
		$('#prod'+id+' .'+cible).on('blur', function(){
			majProd('#prod'+id);
		});
		$('#prod'+id+' .'+cible).on('click', function(){
			if($(this).val() == texte){
				$(this).val('');
			}
		});
	}
	function majProd(prod){
		nb = parseInt($(prod+' .nbProd').val(), 10);
		prix = nb * parseInt($(prod+' .prixBrut').val(), 10);
		if(isNaN(prix)){
			prix = 0;
		}
		$(prod+' .prixTotal').val(prix);
		calcFacture();
	}
	function newProd(id){
		$('#facture table tbody').append('<tr class="produit" id="prod'+id+'"><td><input class="description" value="Désignation produit/service"></td><td><input class="nbProd" value="Quantité ou Durée de travail"></td><td><input class="prixBrut" value="Prix unitaire hors taxe"></td><td><input class="prixTotal" value="Prix total"></td></tr>');
		virtualPlaceholder(id, 'description', 'Désignation produit/service');
		virtualPlaceholder(id, 'nbProd', 'Quantité ou Durée de travail');
		virtualPlaceholder(id, 'prixBrut', 'Prix unitaire hors taxe');
		virtualPlaceholder(id, 'prixTotal', 'Prix total');
	}
	newProd(0);
});