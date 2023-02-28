$("#shift").on('click', function() {  
    $("#bottomandcolor").attr("hidden",true);   
});

$("#sheath").on('click', function() {  
    $("#bottomandcolor").attr("hidden",false);   
});

$("#high_waisted_sheath").on('click', function() {  
    $("#bottomandcolor").attr("hidden",false);   
});


// NECK
$("#neck-crew").on('click', function() { 
    sleeveshow(); 
    $('#neck').css('-webkit-mask-image', 'url(pngsrc/neck/necklines_crew.png)');   
});

$("#neck-round").on('click', function() { 
    sleeveshow(); 
    $('#neck').css('-webkit-mask-image', 'url(pngsrc/neck/necklines_round.png)');   
});

$("#neck-boat").on('click', function() {
    sleeveshow();  
    $('#neck').css('-webkit-mask-image', 'url(pngsrc/neck/necklines_boat.png)');   
});

$("#neck-v_neck").on('click', function() {  
    sleeveshow();
    $('#neck').css('-webkit-mask-image', 'url(pngsrc/neck/necklines_v_neck.png)');   
});

$("#neck-v_neck_middle").on('click', function() { 
    sleeveshow();
    $('#neck').css('-webkit-mask-image', 'url(pngsrc/neck/necklines_v_neck_middle.png)');   
});

$("#neck-v_neck_deep").on('click', function() {
    sleeveshow();
    $('#neck').css('-webkit-mask-image', 'url(pngsrc/neck/necklines_v_neck_deep.png)');   
});

$("#neck-u_neck").on('click', function() {
    sleeveshow();
    $('#neck').css('-webkit-mask-image', 'url(pngsrc/neck/necklines_u_neck.png)');   
});

$("#neck-halter").on('click', function() {  
    $('#neck').css('-webkit-mask-image', 'url(pngsrc/neck/necklines_halter.png)');  
    $('#sleeves').hide() 
});


function sleeveshow(){
    $('#sleeves').show()  
}



// Sleeves

$("#sleev-without").on('click', function() {  
    $('#sleeves').css('-webkit-mask-image', 'url(pngsrc/sleeves/sleeves_without.png)');
});

$("#sleev-cap").on('click', function() {  
    $('#sleeves').css('-webkit-mask-image', 'url(pngsrc/sleeves/sleeves_cap.png)');
});

$("#sleev-short").on('click', function() {  
    $('#sleeves').css('-webkit-mask-image', 'url(pngsrc/sleeves/sleeves_short.png)');
});

$("#sleev-elbow").on('click', function() {  
    $('#sleeves').css('-webkit-mask-image', 'url(pngsrc/sleeves/sleeves_elbow.png)');
});

$("#sleev-3_4").on('click', function() {  
    $('#sleeves').css('-webkit-mask-image', 'url(pngsrc/sleeves/sleeves_3_4.png)');
});

$("#sleev-long").on('click', function() {  
    $('#sleeves').css('-webkit-mask-image', 'url(pngsrc/sleeves/sleeves_long.png)');
});

$("#sleev-bell").on('click', function() {  
    $('#sleeves').css('-webkit-mask-image', 'url(pngsrc/sleeves/sleeves_bell.png)');
});


// Bottom

$("#bott-a_line").on('click', function() {  
    $('#bottom').css('-webkit-mask-image', 'url(pngsrc/bottom/bottom_a_line+top_sheath+length_knee.png)');
});

$("#bott-flared").on('click', function() {  
    $('#bottom').css('-webkit-mask-image', 'url(pngsrc/bottom/bottom_flared+top_sheath+length_knee.png)');
});

$("#bott-pencil").on('click', function() { 
    $('#bottom').css('-webkit-mask-image', 'url(pngsrc/bottom/bottom_pencil+top_sheath+length_midi.png)');
    $('#bottom').css('mask-image', 'url(pngsrc/bottom/bottom_pencil+top_sheath+length_midi.png)');

    //mask-image: url(pngsrc/bottom/bottom_pencil_wrapped_3+length_midi.png);
});