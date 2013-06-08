jQuery(function(){
    var db = jQuery('form#Form_SearchForm_Countries');
    db.submit();
    jQuery('a#tab-ModelAdmin_Countries').click(function(){
    	db.submit();
    })
    //Scrolling of ModelAdmin
    //or use Requirements::customCSS("#ModelAdminPanel {overflow:auto;}"); 
    jQuery('#ModelAdminPanel').css('overflow', 'auto');
})