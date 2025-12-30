// CHECK FIELD IS EMPTY OR NOT
$(document.body).on('keyup', '.cls_required', function () {

    field_refersh($(this));
    field_isempty($(this), "This field is required.");
});

$(document.body).on('keyup', '.was_required', function () {

    field_refersh($(this));
    field_isempty($(this), "This field is required.");
});

$(document.body).on('input', '.cls_number_format', function () {

    if ($(this).val().length == 0) {
        return false;
    }

    var value = $(this).val();
    // Check for more than one decimal point and remove the excess
    const parts = value.split('.');
    if (parts.length > 2) {
        value = parts[0] + '.' + parts.slice(1).join('');
    }

    $(this).val(value);
});

$(document.body).on('focus', '.cls_number_format', function () {
    removeNumberFormatFromAll()
    var value = $(this).val();

    if (value.length == 0) {
        return false;
    }
    value = value.replace(/,/g, ''); // Remove existing commas
    if (!isNaN(value) && value !== '') {
        value = parseFloat(value);
    }

    $(this).val(value);
});

$(document.body).on('keyup', '.cls_cnic', function () {
    field_refersh($(this));

    if(field_isempty($(this),"The field is required"))
    {

    }
    else
    {

       return false;
    }
    let value = $(this).val().replace(/[^0-9]/g, ''); // only digits

    if (value.length > 5) {
        value = value.slice(0, 5) + '-' + value.slice(5);
    }
    if (value.length > 13) {
        value = value.slice(0, 13) + '-' + value.slice(13, 14);
    }

    $(this).val(value);
});

$(document.body).on('keyup','.cls_email',function(){

    validate_email_address($(this));

});

function validate_email_address(email)
{
    field_refersh(email);

    if(field_isempty(email,"The field is required"))
    {

    }
    else
    {

       return false;
    }

    if(regex_email(email,"The email is not valid format"))
    {

    }
    else
    {

      return false;
    }

    return true;
}

// # REGEX EMAIL ADDRESS
function regex_email(element,message)
{
    var regex_email= /^[A-Za-z0-9]{1}[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,3}$/;

    if(element.val().trim().match(regex_email))
    {
      return true;
    }
    else
    {
      field_unsuccess(element,message);
      return false;
    }
}

// REJEX BASE VALIDATION CHECK CONTACT NO
$(document.body).on('keyup','.cls_contact',function(){

        let value = $(this).val().replace(/\D/g, ''); // remove non-digits

    // Force starting 03
    if (value.startsWith('3')) {
        value = '0' + value;
    }

    if (value.length > 4) {
        value = value.slice(0, 4) + '-' + value.slice(4, 11);
    }

    $(this).val(value);
    validate_contact($(this));

  })
// REGEX FOR ONLY JAPAN CONTACT NO
// This regex should handle both Japanese landline numbers (e.g., 03-1234-5678) and mobile numbers (e.g., 090-1234-5678).
function validate_contact(contact)
{
    field_refersh(contact);

    if(pakistani_regex_PhoneNo(contact,"Plrease follow these formats 0312-3456789 or +92312-3456789 or 0092312-3456789"))
    {

    }
    else
    {

       return false;
    }

    return true;
}

function pakistani_regex_PhoneNo(element, errorValue) {
    var regex_phone = /^(?:\+92|0092|0)?3\d{2}-?\d{7}$/;

    if (regex_phone.test(element.val().trim())) {
        return true;
    } else {
        field_unsuccess(element, errorValue);
        return false;
    }
}


function regex_PhoneNo(element, errorValue) {
    // REGEX FOR JAPANESE LANDLINE AND MOBILE NUMBERS
    var regex_phone = /^(\+81|0)\d{1,4}-\d{1,4}-\d{4}$/;

    if (element.val().trim().match(regex_phone)) {
      return true;
    } else {
      field_unsuccess(element, errorValue);
      return false;
    }
  }

function containsCommaOrDot(value) {
    return typeof value === 'string' && (value.includes(',') || value.includes('.'));
}

$(document.body).on('blur', '.cls_number_format', function () {
    numberFormatOnAll();
    var value = $(this).val();

    if (value.length == 0) {
        return false;
    }

    // value = removeNumberFormat($(this).val());

    if (!isNaN(value) && value !== '') {

        if ($(this).hasClass('no_need_decimal')) {
           value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ',')
        } else {
            let parts = parseFloat(value).toFixed(2).split('.');

            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');

            value = parts.join('.');
        }
    }

    $(this).val(value);
});

function field_isempty(element, message) {

    if (element.val().trim().length == 0) {
        field_unsuccess(element, message);

        return false;
    }
    else {
        return true;
    }
}

$(document.body).on('change', '.cls_selection', function () {

    validate_combobox($(this), "The field is required.")

});

function validate_combobox(element,message)
{
    field_refersh(element);

    if(combobox_is_selected(element,message))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function combobox_is_selected(element,message)
{
    if('selected' == element.val())
    {
      	field_unsuccess(element,message);
        return false;
    }
    else
    {
        return true;
    }
}

$(document.body).on('change', '.cls_date', function () {

    field_refersh($(this));

    field_isempty($(this), "This  field is required");
});
$(document.body).on('keyup', '.cls_description', function () {
    // Use vanilla JS method on the raw DOM element
    const maxLength = parseInt($(this).attr('data-max'), 10);
    const currentLength = $(this).val().length; // Correct way to get value in jQuery

    // Check if length exceeds the limit
    if (currentLength > maxLength) {
        $(this).css('border-color', 'red'); // Set border color with jQuery
        if (!$('.note-error').length) {
            // Display error message only if it doesn't already exist
            $(this).after(`<small class="note-error text-danger">Maximum ${maxLength} characters allowed!</small>`);
        }
    } else {
        $(this).css('border-color', ''); // Reset border
        $('.note-error').remove(); // Remove error message when valid
    }
});


function field_unsuccess(element, message) {
    var error_container = element.parentsUntil().children('small.req');

    if (element.hasClass('select2-hidden-accessible')) {
        element = element.closest('div').find('select'); // Target actual select element
    }

    // Skip validation if the element is disabled or readonly
    if (element.prop('disabled') || element.prop('readonly')) {
        return;
    }

    if (element.val() == null || error_container.attr('value') == "*") {
        error_container.html(' (' + message + ')');
        element.css('border-color', 'red');
        element.next('.select2-container').find('.select2-selection').css('border-color', 'red'); // Highlight Select2 border
    } else if (element.val() != null && element.val().length > 0) {
        error_container.html(' (' + message + ')');
        element.css('border-color', 'red');
        element.next('.select2-container').find('.select2-selection').css('border-color', 'red');
    }
}

function ajax_base_field_unsuccess(element, message) {
    // message = message[0].replace('id','');
    element.parentsUntil().children('small.req').html(' (' + message + ')');
    //element.after('<small class="error_message">'+message+'</small><br>').next().css('color','red');
    element.css('border-color', 'red');
    $('select2-container').css('border-color', 'red');
}

function ajax_show_error(error_list, form_element, model_element) {
    var separate_data = "";
    $.each(error_list.responseJSON.errors, function (index, value) {

        separate_data = index.split('.');


        // ITS MEAN DATA AN ARRAY FORM
        if (typeof (separate_data[1]) !== 'undefined') {
            // FOR ALL INPUT FROM ERROR LIST
            element = form_element.find("input[name^=" + separate_data[0] + "]:eq(" + separate_data[1] + ")");

            value = value.toString();

            ajax_base_field_unsuccess(element, value.replace('.' + separate_data[1], " "));

            // FOR ALL TEXTAREA FROM ERROR LIST
            element = form_element.find("textarea[name^=" + separate_data[0] + "]:eq(" + separate_data[1] + ")");

            value = value.toString();

            ajax_base_field_unsuccess(element, value.replace('.' + separate_data[1], " "));

            // FOR ALL DROPDOWN FROM ERROR LIST
            element = form_element.find("select[name^=" + separate_data[0] + "]:eq(" + separate_data[1] + ")");

            value = value.toString();

            ajax_base_field_unsuccess(element, value.replace('.' + separate_data[1], " "));

            model_element.scrollTop(0);
        }
        else {

        //    console.log(value);
            // var value = value.replace("Id");
            ajax_base_field_unsuccess($('input[name=' + index + ']'), value);
            ajax_base_field_unsuccess($('textarea[name=' + index + ']'), value);
            ajax_base_field_unsuccess($('select[name=' + index + ']'), value);


        }
        // value = value[0].replace('id','');
        messageToaster("error", value, "Failed");

    });

    // swal("Your request has been cancelled!");
}

function field_refersh(element) {
    var error_container = element.parentsUntil().children('small.req');

    if (element.hasClass('select2-hidden-accessible')) {
        element = element.closest('div').find('select'); // Target actual select element
    }

     // Skip validation if the element is disabled or readonly
     if (element.prop('disabled') || element.prop('readonly')) {
        return;
    }

    if (error_container.attr('value') == "*") {
        error_container.html('');
    } else {
        error_container.html(" ");
    }

    element.css('border-color', '#ced4da');
    element.next('.select2-container').find('.select2-selection').css('border-color', '#ced4da'); // Reset Select2 border
    element.attr('style', 'border-color: #ced4da !important;');
}

function messageToaster(messageType, message, title,location = "toast-top-right") {
    let animationClass = getAnimation(messageType); // Get animation dynamically

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": location,
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "toastClass": "animate__animated "+animationClass,  // Apply animation to the toast
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "hideClass": "animate__animated animate__fadeOutUp" // Hide animation
    };
    Command: toastr[messageType](message, title);
}

function getAnimation(index) {
    const animationList = {
        'warning': 'animate__shakeX',
        'success': 'animate__flipInX',
        'error': 'animate__tada',
        'info': 'animate__bounceInLeft',
    };

    return animationList[index] || 'animate__flipInX'; // Default animation if index is not found
}


// PURPOSE OF THIS CLASS VALIDATION PASSWORD 1
$('.cls_pass').keyup(function(event){
    validate_password($(this),$('.cls_conf_pass'),8,16);
});

// PURPOSE OF THIS CLASS VALIDATION PASSWORD 2
$('.cls_conf_pass').keyup(function(event){
    validate_password($(this),$('.cls_pass'),8,16);
});

function validate_password(pass,conf_pass,pass_length,pass_length2)
{


    if(field_isempty(pass,"The field is required."))
    {
        field_refersh(pass);
    }
    else
    {
       return false;
    }

    if(length_range(pass,"The field must contain 8 - 16 letters.",pass_length,pass_length2))
    {
         field_refersh(pass);
    }
    else
    {

        return false;
    }

    if(password_match(pass,conf_pass,"Password and conform password is not matched",pass_length,pass_length2))
    {
        field_refersh(pass);
        field_refersh(conf_pass);
    }
    else
    {

        return false;
    }

    return true;
}

// REJEX BASE VALIDATION CHECK DIGIT IS DEIMAL FORMAT
$(document.body).on('keyup','.cls_numeric',function(){

    validate_is_numeric($(this));
  });

  function validate_is_numeric(element)
{
    field_refersh(element);




    if(regex_digits(element,"The field contain only digits"))
    {

    }
    else
    {
        return false;
    }

    return true;
}

function regex_digits(element,message)
{
  var regexdecimal_digit= /^[\d,]*$/;

    if(element.val().trim().match(regexdecimal_digit))
    {

      return true;
    }
    else
    {
      field_unsuccess(element,message);

      return false;
    }
}

function length_range(element,message,length_max,length_min)
{
    if(element.val().trim().length >= length_max && element.val().trim().length <= length_min)
    {


      return true;
    }
    else
    {
      field_unsuccess(element,message);
      return false;
    }
}

function password_length(element,message,pass_length)
{
	if(element.val().trim().length == pass_length)
	{
		return true;
	}
	else
	{
      field_unsuccess(element,message);

		return false;
	}
}

function password_match(password,conf_password,message,pass_length,pass_length2)
{
	if((password.val().trim().length >= pass_length && password.val().trim().length <= pass_length2) && (conf_password.val().trim().length >= pass_length && conf_password.val().trim().length <= pass_length2))
	{
		if(password.val().trim() == conf_password.val().trim())
		{
			return true;
		}
		else
		{
      		field_unsuccess(conf_password,message);
      		field_unsuccess(password,message);


			return false;
		}
	}
	else
	{
		return true;
	}

}

function isPasswordMatch(password,conf_password)
{
    validate_password($(password),$(conf_password),8,16);
}
