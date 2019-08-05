/* Common to all pages**/
var win = jQuery(window);   
var didScroll = false;   
var scrollPos = win.scrollTop();  
/** Scroll actionos*/
    win.scroll(function() {
        didScroll = true;
    });
if(!jQuery('body').hasClass('home') || !jQuery('body').hasClass('page-id-110')) {
    var descselector = jQuery(".category-banner .archive-description, .page-banner .archive-description");
    var divexists = descselector.length;
    if( divexists > 0) {   
        var descdistance = descselector.offset().top;
    }
    var headerh = jQuery('header#masthead').height();   
    var titleselector = jQuery(".category-banner .page-title, .page-banner .page-title");
    var titleexists = titleselector.length;
    var titleh = titleselector.height();
    if(titleexists > 0) {
    var titledistance = titleselector.offset().top;
    }
    var title = 'title';
    var archive = 'archive'
}

    setInterval(function() {
        
            scrollActions(titledistance, titleselector, title);
            if( divexists > 0) {        
                scrollActions(descdistance, descselector, archive);
            }             
               
    }, 250);

    
    function scrollActions(distance, target, kindofelem) {
        if ( didScroll ) {       
            didScroll = false;
            console.log(scrollPos);
            if(!jQuery('body').hasClass('home') || !jQuery('body').hasClass('page-id-110')) {
                if ( win.scrollTop() + headerh  >= distance ) {
                    target.fadeOut('fast');
                }      
                else {
                    if(kindofelem === 'title') {
                        target.slideDown('fast');
                    } else {
                        target.fadeIn('slow');
                    }
                }
            } 
            if(win.scrollTop() >= 100)  {
                jQuery("a#back-to-top").show('slow');
                jQuery("#searchbar").show('slow');
            } else {
                jQuery("a#back-to-top").hide('slow');
                jQuery("#searchbar").hide('slow');
            }
        
        }
    }

jQuery(document).ready(function($){
    backtop =  $("a#back-to-top");
    searchbar = $('#searchbar');
    searchform = $('#searchbar form');
    searchbutton = $('#searchbar a#open-search');
    searchbuttonhtml = searchbutton.html();
    backtop.hide();
    searchbar.hide();
       // Add bootstrap classes to text widget
    $('#footer-widget h3.widget-title, #footer-widget p, ul#menu-links-rodape' ).addClass('text-sm-center text-md-left');
    $("#custom_html-2, #nav_menu-2").addClass("pt-5 pt-md-0 pt-lg-0");
    // Add bootstrap classes to mailpoet
    $('form.mailpoet_form  :input').each(function() {
        let thetitle = $(this).attr('title');  
        let thetype =  $(this).attr('type');             
        if ( thetitle== 'E-mail')  {           
            $(this).attr('aria-describedby', "emailHelp");    
            $(this).addClass('form-control transp-input mx-auto mx-md-0');
            $(this).after("<small id='emailHelp' class='form-text'>Não compartilharemos seu email com ninguém</small>");
        }
        if ( thetype== 'text')  {           
            $(this).addClass('form-control transp-input');
        }
        if( thetype == 'submit') {
            $(this).addClass('btn btn-warning');
        }
      
     });

     backtop.on('click', function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
      });
     /*if ( $.browser.msie || $.browser.mozilla ) {
    
      }*/     
      searchbutton.on('click', function(){
          if(searchform.css('display')==='none') {
            searchform.fadeIn('slow');
            $(this).parent().addClass('opened');
            $(this).html('<i class="fa fa-chevron-right"></i>')
          } else  {
             searchform.fadeOut('fast', function(){
                searchbar.removeClass('opened');
                searchbutton.html(searchbuttonhtml);
            });
          }
          return false;
      });
 
});
