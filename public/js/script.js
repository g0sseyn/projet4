tinymce.init({
    selector: '#content'
});
$('#articlesForm').on('click',function(){
	$('#newArticleForm').toggle('slow');
});
$('#articleCaption').on('click',function(){
	$('.articleTable').toggle('slow');
});
$('#commentCaption').on('click',function(){
	$('.commentTable').toggle('slow');
})

