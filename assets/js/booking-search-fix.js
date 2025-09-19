(function ($) {
  "use strict";

  // --- copie la valeur du champ brut vers le champ affiché ---
  function syncOne($wrap) {
    var v = $wrap.find('input.yith-wcbk-date-picker').val() || '';
    $wrap
      .find('input.yith-wcbk-date-picker--formatted, input.yith-wcbk-date-picker-formatted, input[readonly]')
      .val(v);
  }
  function syncAll() {
    $('.yith-wcbk-booking-search-form .yith-wcbk-date-picker-wrapper').each(function () {
      syncOne($(this));
    });
  }

  // (optionnel) empêcher fin < début SANS auto-remplir :
  // décommente la ligne "validateRange(...)" plus bas si tu veux vider la fin quand elle est < début.
  function validateRange($form){
    var $wraps = $form.find('.yith-wcbk-date-picker-wrapper');
    if ($wraps.length < 2) return;
    var $startRaw = $wraps.eq(0).find('input.yith-wcbk-date-picker');
    var $endRaw   = $wraps.eq(1).find('input.yith-wcbk-date-picker');

    var ds = $startRaw.val(), de = $endRaw.val();
    var re = /^(\d{4})-(\d{2})-(\d{2})$/;
    var ms = re.exec(ds||''), me = re.exec(de||'');
    if (!ms || !me) return;

    var dS = new Date(+ms[1], +ms[2]-1, +ms[3]);
    var dE = new Date(+me[1], +me[2]-1, +me[3]);

    if (dE < dS) {
      // vider la date de fin (aucun auto +1 jour)
      $endRaw.val('').trigger('change');
    }
  }

  // --- évènements ---
  $(document)
    .on('change input', '.yith-wcbk-booking-search-form .yith-wcbk-date-picker', function () {
      var $wrap = $(this).closest('.yith-wcbk-date-picker-wrapper');
      syncOne($wrap);
      // validateRange($(this).closest('.yith-wcbk-booking-search-form')); // <= active si tu veux la garde "fin >= début" (sans auto)
    })
    .on('yith-wcbk-datepicker-init yith-wcbk-ajax-refreshed', function () {
      syncAll();
    });

  // ouvrir le calendrier en cliquant n'importe où dans la zone du champ
  $(document).on('click', '.yith-wcbk-booking-search-form .yith-wcbk-date-picker-wrapper', function (e) {
    if ($(e.target).is('label')) return; // le label ouvre déjà nativement
    $(this).find('input.yith-wcbk-date-picker').trigger('focus').trigger('click');
  });
  // clic direct sur l'input formaté
  $(document).on('click', '.yith-wcbk-booking-search-form .yith-wcbk-date-picker-wrapper input[readonly]', function () {
    $(this).siblings('input.yith-wcbk-date-picker').trigger('focus').trigger('click');
  });
  // accessibilité (Entrée/Espace) sur l'input visible
  $(document).on('keydown', '.yith-wcbk-booking-search-form .yith-wcbk-date-picker-wrapper input[readonly]', function (e) {
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();
      $(this).siblings('input.yith-wcbk-date-picker').trigger('focus').trigger('click');
    }
  });

  // init
  $(function () { syncAll(); });
})(jQuery);
