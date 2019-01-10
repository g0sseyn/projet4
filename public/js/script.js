tinymce.init({
    selector: '#content'
});
$('#articlesForm').on('click',function(){
	$('#newArticleForm').toggle('slow');
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

