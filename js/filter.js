$(document).ready(function () {
    // isotope filter init
    var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        getSortData: {
            price: '.product-price span'
        }
    });

    $('.sorting-price').on('change', function(){
        var sortValue = $('.sorting-price option:selected').attr('data-sort-value');
        // Price down is not working TODO!!!
        $grid.isotope({ sortBy: sortValue });
    })

    // Filter items by category and brand on btn click
    var filters = {};

    $('.products-sidebar-filter').on('click', 'button', function(e){
        var $button = $( e.currentTarget );
        // get group key
        var $buttonGroup = $button.parents('.button-group');
       
        var filterGroup = $buttonGroup.attr('data-filter-group');
        // set filter for group
        filters[ filterGroup ] = $button.attr('data-filter');
        // combine filters
        var filterValue = concatValues( filters );
        // set filter for Isotope
        $grid.isotope({ filter: filterValue });

    });

    // change is-checked class on buttons
    $('.button-group').each( function( i, buttonGroup ) {
        var $buttonGroup = $( buttonGroup );
        $buttonGroup.on( 'click', 'button', function( event ) {
        $buttonGroup.find('.is-checked').removeClass('is-checked');
        var $button = $( event.currentTarget );
        $button.addClass('is-checked');
        });
    });

    // flatten object by concatting values
    function concatValues( obj ) {
        var value = '';
        for ( var prop in obj ) {
        value += obj[ prop ];
        }
        return value;
    }

    // TODO - price ranging
    // $('.filter-btn').on('click', function(){
    //     $grid.isotope({ filter: function(){
    //         var number = $(this).find('.product-price span').text();
    //         return parseInt( number, 10) > 30;
    //     }});
    // });
  

});