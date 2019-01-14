tinymce.init({
    selector: '#content'
});
$('#articleCaption').on('click',function(){
	$('.articleTable').toggle('slow');
});
$('#commentSignaledCaption').on('click',function(){
	$('.commentSignaledTable').toggle('slow');
})
$('#commentNonSignaledCaption').on('click',function(){
	$('.commentNonSignaledTable').toggle('slow');
})

