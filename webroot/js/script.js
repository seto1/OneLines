$(function(){
    $('.one-lines__tag-suggest-tag').click(function() {
        let tags = $('.one-lines__tag-input').val();
        let clickTag = $(this).text().replace(/^#/, '');
        if (tags) {
            tags += ',';
        }
        tags += clickTag;
        $('.one-lines__tag-input').val(tags);
    });
});
