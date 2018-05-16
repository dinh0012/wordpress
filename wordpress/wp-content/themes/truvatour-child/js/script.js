jQuery(document).ready(function ($) {
    $('#search-cruises').on('change', function () {

        if ($(this).is(':checked')) {
            var elOptionSearch = $('.option-search');
            var htmlOptionSearch = $('.option-search-cruises').html();
            elOptionSearch.html(htmlOptionSearch);
        }
    })
    $('#search-content').on('change', function () {
        if ($(this).is(':checked')) {
            var elOptionSearch = $('.option-search');
            elOptionSearch.html('')
        }
    })
})