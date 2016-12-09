if(window.jQuery) {
    $('body').on('click', '.social-share-button a', function() {
        $('.social-share-panel').fadeToggle(300);
        return false;
    });
    $('body').on('click', '.social-share-close a', function() {
        $('.social-share-panel').fadeOut(300);
        return false;
    });
}