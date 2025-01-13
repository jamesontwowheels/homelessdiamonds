window.onload = function() {
console.log('magic listening');
//set the session variables to the class click
$('#portfolio').on('click','.maglinkmagic', function (e) {
    e.preventDefault();
    $('#magholder').removeClass('hidden');
    $('#behindmag').removeClass('hidden');
    $('#magholder').addClass('shown');
    $('#behindmag').addClass('showbehindmag');
    
    var identifier = $(this).attr('identifier');
    console.log(identifier);
    $.ajax({ 
        url: "omnimag.php",
        type: 'post',
        data: {'identifier': identifier},
        success: function(data, status){
        console.log('success');
        $('#magholder').html(data);},
    })
    console.log('this now');
})

$('#container').on('click','#closemag', function (e) {
    $('#magholder').removeClass('shown');
    $('#behindmag').removeClass('showbehindmag');
    $('#magholder').addClass('hidden');
    $('#behindmag').addClass('hidden');
    
}),
    
    //  $(function() {
    console.log('this');
    var contributors = 'contribute';
    $.ajax({ 
        url: "contributorslist.php",
        type: 'post',
        data: {'contributors': contributors},
        success: function(data){
            console.log(data);
            var tags = JSON.parse(data);
            var availableTags = tags;
            console.log('here');
            $( "#tags" ).autocomplete({
            source: availableTags
            });
            console.log('dione');
            },
        });
$('#authors').on('click','#goto_contribute', function (e) {
    var name = $('#tags').val();
    var contributor = encodeURIComponent(name);
    console.log(contributor);
    window.location.replace("authormag.php?author="+contributor);
})
    
}