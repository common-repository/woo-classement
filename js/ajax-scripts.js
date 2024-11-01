jQuery(document).ready(function($) {
    var $WooclTableSearchOrders = $('#WooclTableSearchOrders');
	var page = 1; // Numéro de page initial

    $('#woocl-client-search-form').submit(function(e) {
        e.preventDefault();
        page = 1; // Réinitialiser le numéro de page lors de la soumission du formulaire

        // Cacher les anciens résultats
        $('#woocl-result-container').empty();

        // Afficher le spinner de chargement
        $('#woocl-loading-spinner').show();

        // Récupérer les valeurs du formulaire
        var nomclient        = $('#nomclient').val();
        var datecommande     = $('#datecommande').val();
        var datepaiement     = $('#datepaiement').val();
        var methodepaiement  = $('#methodepaiement').val();
        var statusorder      = $('#statusorder').val();

        // Effectuer une requête AJAX avec le numéro de page
        $.ajax({
            type: 'POST',
            url: woocl_client_ajax_object.ajaxurl,
            data: {
                action: 'woocl_client_search',
                nomclient: nomclient,
                datecommande: datecommande,
                datepaiement: datepaiement,
                methodepaiement: methodepaiement,
                statusorder: statusorder,
                page: page,
            },
            success: function(response) {
                // Masquer le spinner de chargement  
                $('#woocl-loading-spinner').hide();

                $('#WooclTableSearchOrders').show();
				$('#WooclTableSearchOrders').append();
				// Recharger les résultats dans la section "result-container"
                $('#woocl-result-container').html(response);

                // Afficher les nouveaux résultats avec une animation de fondu
                $('#woocl-result-container').fadeIn();

                // Afficher le bouton "Load More" si le nombre de résultats est supérieur à la limite par page
                if ($('.woocl-result-item').length >= 10) {
                    $('#woocl-load-more-button').show();
                } else {
                    $('#woocl-load-more-button').hide();
                }
            }
        });
    });

    // Gérer le clic sur le bouton "Load More"
    $('#woocl-load-more-button').click(function(e) {
        e.preventDefault();
        page++; // Incrémenter le numéro de page pour charger les résultats suivants

        // Afficher le spinner de chargement
        $('#woocl-loading-spinner').show();

        // Effectuer une requête AJAX avec le numéro de page
        $.ajax({
            type: 'POST',
            url: woocl_client_ajax_object.ajaxurl,
            data: {
                action: 'woocl_client_search',
                nomclient: $('#nomclient').val(),
                datecommande: $('#datecommande').val(),
                datepaiement: $('#datepaiement').val(),
                methodepaiement: $('#methodepaiement').val(),
                statusorder: $('#statusorder').val(),
                page: page,
            },
            success: function(response) {
                // Masquer le spinner de chargement
                $('#woocl-loading-spinner').hide();

                $('#WooclTableSearchOrders').show();
				$('#WooclTableSearchOrders').append();
				// Ajouter les nouveaux résultats à la section "result-container"
                $('#woocl-result-container').append(response);
                
				$('#WooclTableSearchOrders').show();
				$('#WooclTableSearchOrders').append();
                // Afficher les nouveaux résultats avec une animation de fondu
                $('#woocl-result-container').fadeIn();

                // Afficher ou masquer le bouton "Load More" en fonction du nombre de résultats
                if ($('.woocl-result-item').length >= 10) {
                    $('#woocl-load-more-button').show();
                } else {
                    $('#woocl-load-more-button').hide();
                }
            }
        });
    });
});



/************************************ Le basic et le bon ************************/
/*
jQuery(document).ready(function($) {
$('#woocl-client-search-form').submit(function(e) {
e.preventDefault();

// Cacher les anciens résultats
$('#woocl-result-container').hide();

// Afficher le spinner de chargement
$('#woocl-loading-spinner').show();

// Récupérer les valeurs du formulaire
var nomclient            = $('#nomclient').val();
var datecommande         = $('#datecommande').val();
var datepaiement         = $('#datepaiement').val();
var methodepaiement      = $('#methodepaiement').val();
var statusorder          = $('#statusorder').val();

// Effectuer une requête AJAX
$.ajax({
type: 'POST',
url: woocl_client_ajax_object.ajaxurl,
data: {
action: 'woocl_client_search',
nomclient: nomclient,
datecommande: datecommande,
datepaiement: datepaiement,
methodepaiement: methodepaiement,
statusorder: statusorder,
},
success: function(response) {
// Masquer le spinner de chargement
$('#woocl-loading-spinner').hide();

// Recharger les résultats dans la section "result-container"
$('#woocl-result-container').html(response);

// Afficher les nouveaux résultats avec une animation de fondu
$('#woocl-result-container').fadeIn();
}
});
});
});*/



/*(function($) {
  $(document).ready(function() {

    // Soumission du formulaire de recherche
    $('#woocl-client-search-form').submit(function(e) {
      e.preventDefault();

      // Cacher les anciens résultats
      $('.woocl-client-search-results').hide();

      // Afficher le spinner de chargement
      $('.woocl-loading-spinner').show();

      // Récupérer les valeurs du formulaire
      var nomclient = $('#woocl-client-search-nom').val();
      var datecommande = $('#woocl-client-search-date-commande').val();
      var datepaiement = $('#woocl-client-search-date-paiement').val();
      var methodepaiement = $('#woocl-client-search-methode-paiement').val();
      var statusorder = $('#woocl-client-search-status-order').val();

      // Effectuer une requête AJAX
      $.ajax({
        type: 'POST',
        url: woocl_client_ajax_object.ajaxurl,
        data: {
          action: 'woocl_client_search',
          nomclient: nomclient,
          datecommande: datecommande,
          datepaiement: datepaiement,
          methodepaiement: methodepaiement,
          statusorder: statusorder,
        },
        success: function(response) {
          // Masquer le spinner de chargement
          $('.woocl-loading-spinner').hide();

          // Recharger les résultats dans la section "woocl-client-search-results"
          $('.woocl-client-search-results').html(response);

          // Afficher les nouveaux résultats avec une animation de fondu
          $('.woocl-client-search-results').fadeIn();
        }
      });
    });
  });
})(jQuery);*/


/*jQuery(document).on('click', '.pagination a', function(e) {
  e.preventDefault();
  var page = jQuery(this).attr('data-page'); // Récupérer le numéro de page à partir de l'attribut data-page du lien

  // Effectuer une requête AJAX pour récupérer les résultats de la page spécifiée
  jQuery.ajax({
    url: woocl_client_ajax_object.ajaxurl, // L'URL de l'objet AJAX localisé
    type: 'post',
    data: {
      action: 'woocl_client_search', // L'action WordPress pour le traitement de la recherche
      page: page // Numéro de page à envoyer au serveur
      // Autres paramètres de recherche si nécessaires
    },
    success: function(response) {
      // Mettre à jour la div avec les nouveaux résultats
      jQuery('.cutomers-by-sales').html(response);
    },
    error: function(xhr, ajaxOptions, thrownError) {
      // Gérer les erreurs éventuelles
    }
  });
});
*/