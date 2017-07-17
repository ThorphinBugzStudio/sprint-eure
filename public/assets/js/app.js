// ============================================================
//              ANNULATION FERMERUTRE DU PANIER
// ------------------------------------------------------------
// ■ Permet l'annulation de la fermeture du panier Bootstrap,
//   lorsqu'on clique dans la fenêtre du panier.
// ============================================================

$('#basket-li .dropdown-menu').on({
	"click":function(e){
      e.stopPropagation();
    }
});
