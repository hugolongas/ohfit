$(document).ready(function() {
    $('#main').on('click', '#submit_contact', function(e) {
        e.preventDefault();
        if ($('#contact-form').valid()) {
            $('#submit_contact').attr('disabled', 'disabled');
            var form_data = new FormData();
            var name = $('#contact_name').val();
            var email = $('#contact_email').val();
            var subject = $('#contact_subject').val();
            var message = $('#contact_message').val();

            form_data.append('name', name);
            form_data.append('subject', subject);
            form_data.append('email', email);
            form_data.append('message', message);
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            });
            $.ajax({
                url: '/contacto',
                dataType: 'text', // what to expect back from the PHP script
                type: 'post',
                data: form_data,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#contact-form')[0].reset();
                    $('#response').html("se ha enviado el e-mail correctamente, en breve nos pondremos en contacto contigo").fadeIn('slow');
                    $('#submit_contact').removeAttr('disabled');
                    setTimeout(function() {
                        $('#response').empty();
                    }, 5000);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#submit_contact').removeAttr('disabled');
                    $('#response').text("Ha habido un error enviando el mensaje, ponte en contacto con nosotros por telefono, disculpa las molestias").show();
                }
            });
        } else {
            $('label.error').hide().fadeIn('slow');
        }
    });

    $('#main').on('click', '#submit_contact_modal', function(e) {
        e.preventDefault();
        if ($('#contact-form_modal').valid()) {
            $('#submit_contact_modal').attr('disabled', 'disabled');
            var form_data = new FormData();
            var name = $('#contact_name_modal').val();
            var email = $('#contact_email_modal').val();
            var subject = $('#contact_subject_modal').val();
            var message = $('#contact_message_modal').val();

            form_data.append('name', name);
            form_data.append('subject', subject);
            form_data.append('email', email);
            form_data.append('message', message);
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            });
            $.ajax({
                url: '/contacto',
                dataType: 'text', // what to expect back from the PHP script
                type: 'post',
                data: form_data,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#contact-form_modal')[0].reset();
                    $('#response').html("se ha enviado el e-mail correctamente, en breve nos pondremos en contacto contigo").fadeIn('slow');
                    $('#submit_contact_modal').removeAttr('disabled');
                    setTimeout(function() {
                        $('#response_modal').empty();
                        $('#modalReservar').modal(hide);
                    }, 5000);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#submit_contact_modal').removeAttr('disabled');
                    $('#response_modal').text("Ha habido un error enviando el mensaje, ponte en contacto con nosotros por telefono, disculpa las molestias").show();
                }
            });
        } else {
            $('label.error').hide().fadeIn('slow');
        }
    });
});