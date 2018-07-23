
function submitForm(url) {
    console.log(url);
    $('form#main-from').attr('action',"tjoss os a");
    $('form#main-form').submit();
};

// CKECBOX FOR ELEMENT
$(document).ready(function(){
    $('form#product input[name=checked-toggle]').change(function () {
        var check = this.checked;
        console.log(check);

        $('form#product').find(':checkbox').each(function () {
            this.checked = check;
        })
    })

    $('div.notification').click(function () {
        this.hidden('slow');
    })

    $('[data-toggle="tooltip"]').tooltip();


});
