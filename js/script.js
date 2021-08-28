var toastTrigger = document.getElementById('liveToastBtn')
var toastLiveExample = document.getElementById('liveToast')

if (toastTrigger) {
    toastTrigger.addEventListener('click', function () {
    var toast = new bootstrap.Toast(toastLiveExample)

    toast.show()
    })
}

jQuery(document).ready(function() {
    /* Form */
    $('.contact-form form input[type="text"], .contact-form form textarea').on('focus', function() {
        $('.contact-form form input[type="text"], .contact-form form textarea').removeClass('input-error');
    });
    $('.contact-form form').submit(function(e) {
        e.preventDefault();
        $('.contact-form form input[type="text"], .contact-form form textarea').removeClass('input-error');
        var postdata = $('.contact-form form').serialize();

        $.ajax({
            type: 'POST',
            url: 'contact.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                if(json.nameMessage != '') {
                    $('.contact-form form .name').addClass('input-error');
                }
                if(json.emailMessage != '') {
                    $('.contact-form form .email').addClass('input-error');
                }
                if(json.subjectMessage != '') {
                    $('.contact-form form .subject').addClass('input-error');
                }
                if(json.messageMessage != '') {
                    $('.contact-form form textarea').addClass('input-error');
                }
                if(json.nameMessage == '' && json.emailMessage == '' && json.subjectMessage == '' && json.messageMessage == '') {
                    $('.contact-form form').fadeOut('fast', function() {
                        $('.contact-form').append('<p>Thanks for contacting me! I will get back to you very soon.</p>');
                    });
                }
            }
        });
    });
     
});