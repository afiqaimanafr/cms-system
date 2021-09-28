"use strict"

var KTAPLCSN = function() {

    var _handle_form = function(form) {
    
        var validation;
		var form = document.getById('create_post_form');

        validation = FormValidation.formValidation(
			form,
			{
				fields: {
					title: {
						validators: {
							notEmpty: {
								message: 'Please fill in the title'
							}
						}
					},
                    post_image: {
						validators: {
							notEmpty: {
								message: 'Please select an image'
							}
						}
					},
                    body: {
						validators: {
							notEmpty: {
								message: 'Please fill in the body'
							}
						}
					}
				},
				plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
        );
        
        $('#btn_create_post').on('click', function (e) {
            e.preventDefault();
            validation.validate().then(function(status) {
                if(status === 'Valid'){
                    form.submit();
                }else{
                    Swal.fire("Please try again", "Sorry, there are some error(s)", "error");
                }
            });
        });

    }

    return {
        // public functions
        init: function() {
            _handle_form();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTAPLCSN.init();
});
