window.fbAsyncInit=function(){FB.init({appId:"1865711140423123",cookie:!0,xfbml:!0,version:"v2.8"})};
!function(e,t,n){var c,o=e.getElementsByTagName(t)[0];e.getElementById(n)||(c=e.createElement(t),c.id=n,c.src="//connect.facebook.net/es_LA/sdk.js",o.parentNode.insertBefore(c,o))}(document,"script","facebook-jssdk");
function fbLogin(){FB.login(function(i){"connected"===i.status&&FB.api("/me?fields=name,email",function(i){FB.api("/"+i.id+"/picture?height=150",function(a){if(a&&!a.error){var e={email:i.email,username:i.name,user_id:i.id,avatar:a.data.url};$.ajax({url:$("base").attr("href")+"/login/login_with_social",type:"POST",dataType:"json",data:e}).done(function(i){"success"==i.type&&(window.location=i.url)})}})})},{scope:"public_profile,email"});}
function ggLogin(){gapi.load("auth2",function(){auth2=gapi.auth2.init({client_id:"588094497446-g8q10dnov43h8pe6j3sq40hu5phkvpf7.apps.googleusercontent.com",fetch_basic_profile:!0,scope:"profile email openid"}),auth2.signIn().then(function(){if(auth2.isSignedIn.get()){var e=auth2.currentUser.get().getBasicProfile(),a={email:e.getEmail(),username:e.getFamilyName()+" "+e.getGivenName(),password:e.getId(),avatar:e.getImageUrl()};$.ajax({url:$("base").attr("href")+"login/login_with_social",type:"POST",dataType:"json",data:a}).done(function(e){window.location=e.url})}})})}

jQuery(document).ready(function($) {
    $("#basic .modal-content .modal-body").click("#book-this",function() {
        $.post(
            $('base').attr('href')+'/login/set_room', 
            {room_no: $(this).attr('data-room')}, 
            function(data) {;}
        );
    });
    $('.question-content').click(function(){
        $("#basic #room-modal-content").html(`<div class="col-xs-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div><div class="clearfix"></div>`);
        $('#basic').modal('show');
    });
});
toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!1,onclick:null,showDuration:"300",hideDuration:"1000",timeOut:"5000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut"};
var colours_floor_1 = ['#ffe3a3'], //#ffe3a4
colours_floor_2 = ['#d6e683','#02d5c2','#faac86','#dce6e7','#f5dd7d','#fff62d','#868ddd','#ff8748'],
colours_floor_3 = ['#d0d0d0','#8bc6e6','#faac86','#dce6e7','#f5dd7d','#fff62d','#a2ff8d'],
colours_floor_4 = ['#a2ff8d','#fff62d','#f5dd7d','#dce6e7'];
if ($.browser.chrome) {
    colours_floor_1 = ['#ffe3a4'];
    colours_floor_2 = ['#d7e684','#03d5c3','#fbab87','#dde5e7','#f6dc7e','#fff62e','#878cde','#ff8749'];
    colours_floor_3 = ['#d1cfd1','#8cc5e7','#fbab87','#dde5e7','#f6dc7e','#fff62e','#a3fe8e'];
    colours_floor_4 = ['#a3fe8e','#fff62e','#f6dc7e','#dde5e7'];
}
$(window).load(function() {
    if($(window).width()>992){var typed=new Typed("#intro_text",{strings:intro_text,typeSpeed:20,backSpeed:0,backDelay:3e3,fadeOut:!0,loop:!0});$.get($("base").attr("href")+"home/get_nav_desktop",function(t){$("#menu-content").html(t);$("#preloader").remove();})}else $.get($("base").attr("href")+"home/get_nav_mobile",function(t){$("#menu-content").html(t)});$('[data-toggle="tooltip"]').tooltip(),$('[data-toggle="popover"]').popover(),$(".slider-for").slick({slidesToShow:1,slidesToScroll:1,arrows:!1,fade:!0,asNavFor:".slider-nav"}),$(".slider-nav").slick({slidesToShow:3,slidesToScroll:1,asNavFor:".slider-for",centerMode:!0,focusOnSelect:!0,arrows:!0,variableWidth:!0,infinite:!0}),$(".slider-nav").on("afterChange",function(t,e){$(".benifits-name").text(e.$slides[e.getCurrent()].attributes["data-alt"].value),$(".benifits-sub").text(e.$slides[e.getCurrent()].attributes["data-discribe"].value)}),$("#view-map-btn").click(function(){var t=$(this),e=t.attr("data-is-map-hide"),a=t.text();parseInt(e)?($("#section6 #office_location").css("zIndex",100),$("#section6 .content").css("zIndex",0),t.attr("data-is-map-hide",0),t.text(t.attr("data-toggle-text")),t.attr("data-toggle-text",a),a=t.text()):($("#section6 #office_location").css("zIndex",0),$("#section6 .content").css("zIndex",100),t.attr("data-is-map-hide",1),t.text(t.attr("data-toggle-text")),t.attr("data-toggle-text",a),a=t.text())}),$("#fullpage").fullpage({verticalCentered:!1,css3:!1,navigation:window.innerWidth>768,navigationTooltips:menu_anchor,scrollOverflow:!0,afterLoad: function(anchorLink, index){if(index != 1){$(".brand-img").addClass('top');$(".brand-img").attr('src','assets/img/logo.png')}else{$(".brand-img").removeClass('top');$(".brand-img").attr('src','assets/img/logo-white.png')}}}),$("#menu-content").on("click","#ios-nav-menu .menu-item",function(t){$.fn.fullpage.moveTo(parseInt($(this).attr("data-menuanchor")));var e=$("#menu-toggler");e.prop("checked",!e.prop("checked"))}),$("#fullpage").click(function(t){$("#menu-toggler").prop("checked")&&(t.preventDefault(),$("#menu-toggler").prop("checked",0))});
    $.get($("base").attr("href")+"home/get_base64_img/1",function(e){drawImageFromWebUrl(e,1)}),$.get($("base").attr("href")+"home/get_base64_img/2",function(e){drawImageFromWebUrl(e,2)}),$.get($("base").attr("href")+"home/get_base64_img/3",function(e){drawImageFromWebUrl(e,3)}),$.get($("base").attr("href")+"home/get_base64_img/4",function(e){drawImageFromWebUrl(e,4)});
    initMap();

});
function login(e){
    e.preventDefault();
    var formData = e.target;
    $.post( $('base').attr('href')+'/login/check_login', {
        accessToken : formData.accessToken.value,
        username    : formData.username.value,
        password    : formData.password.value,
        remember    : formData.remember.value
    }, function(data) {
        data = JSON.parse(data);
        if (data.type == 'success') {
            window.location = data.url;
        }else{
            toastr[data.type](data.msg, data.title);
        }
    });
    return false;
}
function register(e){
    e.preventDefault();
    var formData = e.target;
    $.post( $('base').attr('href')+'/register/index', {
        accessToken : formData.accessToken.value,
        username    : formData.username.value,
        password    : formData.password.value,
        email       : formData.email.value
    }, function(data) {
        data = JSON.parse(data);
        if (data.type == 'success') {
            window.location = data.url;
        }else{
            alert(data.msg);
            toastr[data.type](data.msg, data.title);
        }
    });
    return false;
}
function get_login_form(){$.get($("base").attr("href")+"home/get_login_template/",function(e){$("#menu-toggler").prop("checked")&&$("#menu-toggler").prop("checked",0),$("#basic .modal-content .modal-body #room-modal-content").html(e),$("#basic").modal("show")});}
function initMap(){var map=new google.maps.Map(document.getElementById("office_location"),{center:{lat:21.067027,lng:105.819917},zoom:18,scrollwheel:!0,navigationControl:!0,mapTypeControl:!1,scaleControl:!0,disableDefaultUI:!0,draggable:!0,styles:[{elementType:"geometry",stylers:[{color:"#242f3e"}]},{elementType:"labels.text.stroke",stylers:[{color:"#242f3e"}]},{elementType:"labels.text.fill",stylers:[{color:"#746855"}]},{featureType:"administrative.locality",elementType:"labels.text.fill",stylers:[{color:"#d59563"}]},{featureType:"poi",elementType:"labels.text.fill",stylers:[{visibility:"off"}]},{featureType:"poi.park",elementType:"labels.text.fill",stylers:[{color:"#6b9a76"}]},{featureType:"road",elementType:"geometry",stylers:[{color:"#38414e"}]},{featureType:"road",elementType:"geometry.stroke",stylers:[{color:"#212a37"}]},{featureType:"road",elementType:"labels.text.fill",stylers:[{color:"#9ca5b3"}]},{featureType:"road.highway",elementType:"geometry",stylers:[{color:"#746855"}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{color:"#1f2835"}]},{featureType:"road.highway",elementType:"labels.text.fill",stylers:[{color:"#f3d19c"}]},{featureType:"transit",elementType:"geometry",stylers:[{color:"#2f3948"}]},{featureType:"transit.station",elementType:"labels.text.fill",stylers:[{color:"#d59563"}]},{featureType:"water",elementType:"geometry",stylers:[{color:"#17263c"}]},{featureType:"water",elementType:"labels.text.fill",stylers:[{color:"#515c6d"}]},{featureType:"water",elementType:"labels.text.stroke",stylers:[{color:"#17263c"}]}]}),icon={url:document.getElementsByTagName("base")[0].getAttribute("href")+"assets/img/marker.png",size:new google.maps.Size(70,70),origin:new google.maps.Point(0,0),anchor:new google.maps.Point(17,34),scaledSize:new google.maps.Size(50,50)},marker=new google.maps.Marker({map:map,title:"Glocal Home",icon:icon,position:{lat:21.067026,lng:105.819918}})}
function getElementPosition(t){var e=0,n=0;if(t.offsetParent){do e+=t.offsetLeft,n+=t.offsetTop;while(t=t.offsetParent);return{x:e,y:n}}return void 0}function getEventLocation(t,e,n){var o=getElementPosition(t);return{x:window.innerWidth*(n-1)+e.pageX-o.x,y:e.pageY-o.y}}function rgbToHex(t,e,n){if(t>255||e>255||n>255)throw"Invalid color component";return(t<<16|e<<8|n).toString(16)}

function drawImageFromWebUrl(sourceurl, canvas_number){
    var canvas = document.getElementById("mycanvas" + canvas_number),
    colours_floor;
    switch (canvas_number){
        case 1:
            colours_floor = colours_floor_1;
            break;
        case 2:
            colours_floor = colours_floor_2;
            break;
        case 3:
            colours_floor = colours_floor_3;
            break;
        case 4:
            colours_floor = colours_floor_4;
            break;
    }
    if (window.innerWidth > 992) {
        canvas.width = window.innerWidth * 0.76;
        canvas.height = window.innerHeight * 0.85;
    }else{
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight * 0.4;
    }
    var img = new Image();
    img.addEventListener("load", function () {
        // The image can be drawn from any source
        canvas.getContext("2d").drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight, 0, 0, canvas.width, canvas.height);
    });

    img.setAttribute("src", sourceurl);
    var hex;
    canvas.addEventListener("mousemove",function(e){
        var eventLocation = getEventLocation(canvas,e,canvas_number);
        // Get the data of the pixel according to the location generate by the getEventLocation function
        var context = canvas.getContext('2d');
        var pixelData = context.getImageData(eventLocation.x, eventLocation.y, 1, 1).data; 
        hex = "#" + ("000000" + rgbToHex(pixelData[0], pixelData[1], pixelData[2])).slice(-6);
        
        // Draw the color and coordinates.
        var room_index = colours_floor.indexOf(hex) + 1;
        var tooltip = $("#mycanvas"+canvas_number).siblings('.room-tooltip');
        if(room_index > 0){
            tooltip.find('span').eq(0).html(canvas_number+ '0' + room_index );
            tooltip.css({
                display: 'block',
                top: e.pageY + 'px',
                left:  window.innerWidth*(canvas_number - 1)+e.pageX + 'px'
            });
        }else{
            tooltip.css('display', 'none');
        }
    },false);
    canvas.addEventListener("click",function(e){
        var room_index = colours_floor.indexOf(hex) + 1;
        if(room_index > 0){
            var room_no = canvas_number + '0' + room_index;
            $.get($('base').attr('href')+'home/get_room_template/'+room_no, function(data) {
                $("#basic #room-modal-content").html(data);
                $('#basic').modal('show');
            });
        }
    },false);
}
