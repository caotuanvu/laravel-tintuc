function submitForm(url) {
    $('form#main-form').submit();
}
$('a#submit').click(function () {
    console.log('thsi is a te');
    $("form#main-form").submit();

})