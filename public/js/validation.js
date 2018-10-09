$(function() {

  $.validator.setDefaults({
    errorClass: 'help-block',
    highlight: function(element) {
      $(element)
        .closest('.form-group')
        .addClass('has-error');
    },
    unhighlight: function(element) {
      $(element)
        .closest('.form-group')
        .removeClass('has-error');
    },
    errorPlacement: function (error, element) {
      if (element.prop('type') === 'checkbox') {
        error.insertAfter(element.parent());
      } else {
        error.insertAfter(element);
      }
    }
  });

  $.validator.addMethod('strongPassword', function(value, element) {
    return this.optional(element) 
      || value.length >= 6
      && /\d/.test(value)
      && /[a-z]/i.test(value);
  }, 'Your password must be at least 6 characters long and contain at least one number and one char\'.')
  $.validator.addMethod( "extension", function( value, element, param ) {
  param = typeof param === "string" ? param.replace( /,/g, "|" ) : "png|jpe?g|gif";
  return this.optional( element ) || value.match( new RegExp( "\\.(" + param + ")$", "i" ) );
}, $.validator.format( "Please enter a value with a valid extension." ) );
  $.validator.addMethod( "extension2", function( value, element, param ) {
  param = typeof param === "string" ? param.replace( /,/g, "|" ) : "pdf|docx|doc";
  return this.optional( element ) || value.match( new RegExp( "\\.(" + param + ")$", "i" ) );
}, $.validator.format( "Please enter a value with a valid extension." ) );


  $("#register-form").validate({
    rules: {
      email: {
        required: true,
        email: true,

        // remote: "http://localhost:3000/inputValidator"
      },
      photo: {
        required: true,
        extension: true,
        
        
        // remote: "http://localhost:3000/inputValidator"
      },
    cv: {
        required: true,
        extension2: true,
        // remote: "http://localhost:3000/inputValidator"
      },
      // password: {
      //   required: true,
      //   strongPassword: true
      // },
      // password2: {
      //   required: true,
      //   equalTo: '#password'
      // },
      applicant_name: {
        required: true,
        nowhitespace: true,
        lettersonly: true
      },
      mail_address: {
        required: true
      },
      division: {
        required: true,
        // digits: true,
        // phonesUK: true
      },      
      district: {
        required: true,
        // digits: true,
        // phonesUK: true
      },      
      thana: {
        required: true,
        // digits: true,
        // phonesUK: true
      },
      address: {
        required: true
      },
      town: {
        required: true,
        lettersonly: true
      },
      language: {
        required: true,
      },
      education: {
        required: true
      }
    },
    messages: {
      email: {
        required: 'Please enter an email address.',
        email: 'Please enter a <em>valid</em> email address.',
        remote: $.validator.format("{0} is already associated with an account.")
      }

    }
  });

});