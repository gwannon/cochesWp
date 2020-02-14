var grid;

jQuery(function($){
  jQuery('.coche-main-form .coche_filter').not('.coche-main-form.coche-main-mini-form .coche_filter').change(function() {
    filterCoches();
  });

  jQuery('.coche-main-form.coche-main-mini-form button').click(function() {

    var url_with_hash = $(this).data("url")+"#filters";
    jQuery('.coche_filter').each(function() {
      var selectedLabel = jQuery(this).data("filter");
      var selectedValue = jQuery(this).children("option:selected").val();
      if(selectedValue != '') {
        url_with_hash += "|"+selectedLabel+"."+selectedValue; 
      }
    });
    window.location.href = url_with_hash;
  });

  jQuery('.coche_order').change(function() {
    var selectedValue = jQuery(this).children("option:selected").val().split(',');
    grid.isotope({
      sortBy: selectedValue[0],
      sortAscending: (selectedValue[1] == 'asc') ? true : false
    });
  });
});

jQuery(window).load(function(){
  grid = jQuery('.grid').isotope({
    itemSelector: '.grid-item',
    getSortData: {
      date: '[data-date] parseInt',
      km: '[data-km] parseInt',
      year: '[data-year] parseInt',
      price: '[data-price] parseInt'
    },
  });

  if(window.location.hash) { //Fitlrado por hash
    //#filters|type.coupe|brand.chevrolet
    var hash = window.location.hash.split('|');
    console.log(hash);
    if(hash[0] == '#filters') {
      hash.slice(1).map(function(filter) {
        var data = filter.split('.');
        jQuery("#coche_"+data[0]+"_filter option[value="+data[1]+"]").attr('selected','selected');
      });
      filterCoches();
    }
  }
});



function filterCoches() {
  grid.isotope({
    filter: function() {
      var filters = new Array();
      jQuery('.coche_filter').each(function() {
        var selectedLabel = jQuery(this).data("filter");
        var selectedValue = jQuery(this).children("option:selected").val();
        if(selectedValue !== '') filters.push({
          'field': selectedLabel,
          'data': selectedValue
        });
      });
      if(filters.length == 0) return true; //Si no hay filtros activados
      var counter = 0;
      var current = jQuery(this);
      filters.map(function(filter) {
        if (filter.field == 'price' && filter.data == '+20000' && parseInt(current.data(filter.field)) > 20000) counter ++;
        else if (filter.field == 'price' && filter.data != '+20000' && parseInt(current.data(filter.field)) <= parseInt(filter.data)) counter ++;
        else if (filter.field == 'km' && filter.data == '+50000' && parseInt(current.data(filter.field)) > 50000) counter ++;
        else if (filter.field == 'km' && filter.data != '+50000' && parseInt(current.data(filter.field)) <= parseInt(filter.data)) counter ++;
        else if (filter.field == 'year' && parseInt(current.data(filter.field)) >= filter.data) counter ++;
        else if (filter.data == current.data(filter.field)) counter ++;
      });
      if(filters.length == counter) {
        return true;
      }
      return false;
    }
  });
}