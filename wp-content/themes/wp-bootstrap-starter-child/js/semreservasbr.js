/* Common to all pages**/
var win = jQuery(window);   
var didScroll = false;   
var scrollPos = win.scrollTop();  

/** QUem é AYA - START */
if(jQuery('body').hasClass('page-template-quemeaya')) {
    /** Snap SVG */

    var smasks = [ Snap(".snapme-mask1"), Snap(".snapme-mask2"), Snap(".snapme-mask3")];

    // Mask 1
    var originalpathm1 = "m87.045399,18.812277c35.202932,-35.543958 113.606829,-10.111754 118.477716,-8.470967c12.711276,4.282133 22.507742,9.452222 30.57012,15.175674c43.535558,30.898278 69.199402,57.018969 83.770237,70.930272c61.494136,58.711232 144.675621,-5.774928 213.147929,45.169911c52.138431,38.790143 63.923145,120.832728 50.81615,180.68286c-18.624545,85.060347 -92.945778,150.489155 -163.184345,155.273177c-59.715008,4.066579 -71.01392,-37.34239 -127.60178,-32.465069c-90.018098,7.753525 -109.141314,116.656764 -179.061376,114.337141c-56.330482,-1.865993 -115.202576,-74.91642 -113.960725,-138.33446c1.261154,-64.37034 63.485602,-69.389219 91.166649,-149.626938c39.24699,-113.770908 -50.668157,-205.693607 -4.140575,-252.671601z";
    var transformpathm1 = "m91.1223,19.81228c35.202932,-35.543958 113.606829,-10.111754 118.477716,-8.470966c12.711276,4.282133 22.507742,9.452222 30.57012,15.175674c43.535558,30.898278 81.507062,52.403596 96.077898,66.314899c61.494136,58.711232 156.983281,-51.928655 225.45559,-0.983816c52.138431,38.790143 39.307824,171.601828 26.200828,231.45196c-18.624545,85.060346 16.28471,239.719694 -53.953858,244.503715c-59.715008,4.066579 -95.629242,-106.57298 -152.217102,-101.695659c-90.018099,7.753524 -193.75648,96.656815 -263.676542,94.337192c-56.330482,-1.865993 -115.202575,-74.91642 -113.960724,-138.33446c1.261154,-64.37034 163.485342,-32.466238 191.16639,-112.703957c39.24699,-113.770908 -150.667898,-242.616588 -104.140316,-289.594582z";
    var pathm1 = smasks[0].path(originalpathm1).attr({ fill: "#f16879" });

    // Mask 2
    var originalpathm2 = "m268.327091,19.169201c32.031065,19.016428 20.676421,46.393774 51.91155,62.922004c53.571543,28.348962 104.339382,-43.009251 187.353404,-20.733786c10.65551,2.857484 48.2653,13.545261 72.204344,49.050481c3.291305,4.879592 24.146991,36.734977 18.876601,73.936044c-8.439795,59.573334 -79.328334,100.682377 -136.858048,111.689246c-93.164004,17.822523 -126.424827,-48.057353 -190.343544,-26.742748c-92.059732,30.700919 -79.812349,186.306497 -140.002355,193.487851c-53.507008,6.381833 -131.702387,-108.408697 -128.991901,-220.234185c0.311921,-12.817445 3.804003,-100.144582 72.899892,-166.121261c50.463089,-48.182838 139.87687,-88.764842 192.950056,-57.253646z";
    var transformpathm2 = "m249.591333,42.06744c32.031065,19.016428 45.676421,42.393774 76.91155,58.922004c53.571543,28.348962 55.339382,-74.009251 138.353404,-51.733786c10.65551,2.857484 41.2653,18.545261 62.204344,83.050481c24.291305,79.879592 51.146991,110.734977 45.876601,147.936044c-8.439795,59.573334 -81.328334,-29.317623 -138.858048,-18.310754c-32.164004,7.822523 -47.424827,65.942647 -106.343544,132.257252c-58.059732,84.700919 -154.812349,84.306497 -215.002355,91.487851c-53.507008,6.381833 -107.702387,-31.408697 -93.991901,-201.234185c3.311921,-61.817445 8.804003,-107.144582 37.899892,-185.121261c31.463089,-79.182838 103.87687,-121.764842 192.950056,-57.253646l0.000001,0z";
    var pathm2 = smasks[1].path(originalpathm2).attr({ fill: "#f16879" });

    // Mask 2
    var originalpathm3 = "m226.243238,18.776128c34.614997,32.730584 -1.121421,103.358806 29.788629,121.287344c30.171899,17.499134 70.724039,-46.003097 145.756322,-56.386886c83.183877,-11.515857 190.421521,44.785858 196.827105,111.712681c6.568829,68.662186 -93.443458,143.939336 -179.803511,147.885602c-66.217063,3.023578 -79.010488,-37.965064 -176.60959,-48.941503c-90.277928,-10.153117 -112.617625,21.175691 -158.524905,-2.12928c-58.232262,-29.561506 -107.57478,-123.264026 -71.281201,-202.146757c41.847452,-90.955749 173.344694,-109.579852 213.847151,-71.281201z";
    var transformpathm3 = "m225.052762,17.585652c34.614997,32.730584 28.640482,78.358806 113.121957,47.477825l101.708705,-24.244031c98.660067,-29.372999 146.373904,-7.595091 152.779488,59.331732c6.56883,68.662186 -32.729175,239.177426 -119.089227,243.123692c-87.645634,3.023576 -92.105726,-123.679346 -189.704828,-134.655785c-90.277929,-10.153118 -132.85572,147.366159 -178.762999,124.061188c-58.232263,-29.561506 -130.193827,-164.93069 -93.900247,-243.813421c41.847452,-90.955749 173.344694,-109.579852 213.847151,-71.2812z";
    var pathm3 = smasks[2].path(originalpathm2).attr({ fill: "#f16879" });
} /*QUem é AYA - END */
/** Scroll actionos*/
    win.scroll(function() {
        didScroll = true;
    });

    setInterval(function() {        
            scrollActions();                  
               
    }, 250);

    
    function scrollActions() {
        if ( didScroll ) {       
            didScroll = false;           
       
            if(win.scrollTop() >= 100)  {
                jQuery("a#back-to-top").show('slow');
               
            } else {
                jQuery("a#back-to-top").hide('slow');
               
            }
        
        }
    }

jQuery(document).ready(function($){
    backtop =  $("a#back-to-top");
    backtop.hide();
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

    /** Quem é aya */
    if(jQuery('body').hasClass('page-template-quemeaya')) {
        // SVG ANIMATIONS 
        var animatemask1 = jQuery('.snapme-mask1').parent().waypoint({
            handler: function(direction) {
                if(direction == 'down') {     
                    pathm1.animate({d:transformpathm1}, 5000, mina.elastic);
                } else if(direction == 'up') {
                    pathm1.animate({d:originalpathm1}, 5000, mina.elastic);
                }
            },  offset: 125
        })
        var animatemask2 = jQuery('.snapme-mask2').parent().waypoint({
            handler: function(direction) {
                if(direction == 'down') {     
                    pathm2.animate({d:transformpathm1}, 5000, mina.elastic);
                } else if(direction == 'up') {
                    pathm2.animate({d:originalpathm1}, 5000, mina.elastic);
                }
            },  offset: 125
        })
        var animatemask3 = jQuery('.snapme-mask3').parent().waypoint({
            handler: function(direction) {
                if(direction == 'down') {     
                    pathm3.animate({d:transformpathm3}, 5000, mina.elastic);
                } else if(direction == 'up') {
                    pathm3.animate({d:originalpathm3}, 5000, mina.elastic);
                }
            },  offset: 125
        })
      } /*end quem e aya **/

      /** Momentos AYA */
      if(jQuery('body').hasClass('page-template-momentoaya')) {

        jQuery('.ativacoes-aya .do-owl ').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive: {
                0: { items: 1 },
                992: { items: 1 },
                1200: { items: 2 },
                1600: { items: 2}
              }
        })    
        jQuery('.eventos-aya .do-owl ').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive: {
                0: { items: 1 },
                992: { items: 1 },
                1200: { items: 2 },
                1600: { items: 2}
              }
        })    
     
        jQuery('a.image').magnificPopup({
            image: {
                markup: '<div class="mfp-figure">'+
                          '<div class="mfp-close"></div>'+
                          '<div class="mfp-img"></div>'+
                          '<div class="mfp-bottom-bar">'+
                            '<div class="mfp-title"></div>'+
                            '<div class="mfp-counter"></div>'+
                          '</div>'+
                        '</div>', // Popup HTML markup. `.mfp-img` div will be replaced with img tag, `.mfp-close` by close button
              
                cursor: 'mfp-zoom-out-cur', // Class that adds zoom cursor, will be added to body. Set to null to disable zoom out cursor.
              
                titleSrc: function(item) {
                       var cliente = item.el.find('p.cliente-momento').html();
                       var ano = item.el.find('p.ano-momento').html();                      
                       return item.el.attr('title') + '<span style="float:right">' + cliente + ano + '</span>' ;
                     },
              
                verticalFit: true, // Fits image in area vertically
              
                tError: '<a href="%url%">A imagem</a> não pôde ser carregada.' // Error message
              },
            type:'image',
         

           
        });

      } /** FIM MOMENTOS AYA */
     
});
