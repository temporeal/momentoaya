jQuery(document).ready(function($){
    $('#cat-list a').hover(
        function() {
          $( this ).css('z-index', '90');
        }, function() {
          $( this ).css('z-index', '9');
        }
      );
    loadedcats = new Array();
    $('a.load-brasilzao').on('click', function(e) {
        e.preventDefault();
        srAjaxLoad(5, this);
    });
    $('a.load-fatness').on('click', function(e) {
        e.preventDefault();
        srAjaxLoad(4, this);
    });
    $('a.load-gringolandia').on('click', function(e) {
        e.preventDefault();
        srAjaxLoad(6, this);
    });
    $('a.load-noi').on('click', function(e) {
        e.preventDefault();
        srAjaxLoad(9, this);
    });
    $('a.load-vem').on('click', function(e) {
        e.preventDefault();
        srAjaxLoad(7, this);
    });
    $('a.load-challenge').on('click', function(e) {
        e.preventDefault();
        srAjaxLoad(11, this);
    });
    $('a.load-aqui').on('click', function(e) {
        e.preventDefault();
        srAjaxLoad(10, this);
    });

    function srAjaxLoad(cat, that) {
            // First, remove the id so we can load a new element with the same id
            $("div#row-latest").removeAttr('id');
            // Wich element is clicked - Utils for resize window
            clicked = $(that);
            // Hide all rows
            $(that).parent().siblings(".row").hide();
            if(loadedcats.includes(cat)) {
                // we already got a row with the posts
                $(".row-"+cat).fadeIn("slow");
                $(".row-"+cat).next(".row-sr-archive").fadeIn("slow");              
                $(".row-sr-noposts-"+cat).fadeIn("slow");
                scrollToAnchor(cat);
            } else {
                loadedcats.push(cat);                
                var dados_envio = {
                    'sr_loadposts_nonce': js_global.sr_loadposts_nonce,
                    'cat': cat,
                    'action': 'load_posts'
                }
                
                jQuery.ajax({
                    url: js_global.xhr_url,
                    type: 'POST',
                    data: dados_envio,
                    dataType: 'html',
                    success: function(response) {
                        if (response == '401'  ){
                            console.log('Requisição inválida')
                        }
                        else if (response == 402) {
                            var htmlops = '<div class="row row-sr-noposts-'+cat+'"> <div class="w-100 text-center py-5"><h2>Ops.</h2><p>Ainda não há posts publicados neste categoria.</p>     </div>'
                            $('#cat-list').after(htmlops);
                        } else {
                            $('#cat-list').after( response);                           
                            $("div#row-latest").addClass("row-" + cat);
                            scrollToAnchor(cat);
                        }
                    }
                });
                // Since we loaded new content, there´s a new div with latest ID, refer to it
                $("div#row-latest").fadeIn("slow");
                
            }
        // The marker moves independent of loaded / not loaded content    
        $(".sr-marker").fadeIn('slow');
        var btpos_x = $(that).css('left');
        var btpos_y = $(that).css('bottom');
        $(".sr-marker").css('left', btpos_x);
        $(".sr-marker").css('bottom', btpos_y);
        
    }
    function scrollToAnchor(aid){
        var aTag = $("a[name='"+ aid +"']");
        $('html,body').animate({scrollTop: aTag.offset().top},'slow');
    }
   
});
jQuery( window ).resize(function() {
    if (typeof clicked !== 'undefined') {
        console.log(clicked);
        var btpos_x = clicked.css('left');
        var btpos_y = clicked.css('bottom');
        jQuery(".sr-marker").css('left', btpos_x);
        jQuery(".sr-marker").css('bottom', btpos_y);
   }
});

