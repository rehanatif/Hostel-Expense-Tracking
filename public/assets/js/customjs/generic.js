function formSubmitWithDrwar(event, obj, modal_id, form_id, table_id) {

    event.preventDefault();
    var form_obj = $(form_id).find('small.req');
    if (validate_form_fields(form_obj) == 0 && validate_form(form_obj) == 0) {

        showAjaxLoader();

        var form_obj = $(form_id);

        var form = document.querySelector(form_id); // Find the <form> element

        var formData = new FormData(form); // Wrap form contents

        var route = form_obj.attr("action");

        $.ajax({
            url: route,

            type: form_obj.attr("method"),

            data: formData,

            dataType: "json",

            contentType: false,

            cache: false,

            processData: false,

            success: function (result) {
                removeAjaxLoader();

                if (result.status) {
                    messageToaster("success", result.message, "Success");

                    if ($(modal_id).length > 0) {

                        hideModal(modal_id);

                    }

                    if ($(table_id).length > 0) {

                        // Check if it's a DataTable
                        if ($.fn.DataTable.isDataTable(table_id)) {
                            $(table_id).DataTable().ajax.reload();
                        }
                        // Check if it's a Tabulator
                        else if ($(table_id).hasClass('tabulator')) {
                            let tabulatorTable = Tabulator.findTable(table_id)[0];
                            if (tabulatorTable) {
                                tabulatorTable.setData(); // reload Tabulator data
                            }
                        }
                    } else {

                        location.reload(true);
                    }
                    $(form_id)[0].reset();

                } else {
                    messageToaster("error", result.message, "Failed");
                    if (!result.data['status']) {
                        messageToaster("error", result.data['error'], "Failed");

                    }
                }

            },
            error: function (result) {
                removeAjaxLoader();

                ajax_show_error(result);

            },
        });
    }
    else {
        messageToaster("error", 'Please Fill All Required Input Fields.', "Failed");
    }

}
function formSubmit(event, obj, form_id, location_reload = false) {

    event.preventDefault();

    var form_obj = $(form_id).find('small.req');
    if (validate_form_fields(form_obj) == 0 && validate_form(form_obj) == 0) {

        showAjaxLoader();

        var form_obj = $(form_id);

        var form = document.querySelector(form_id); // Find the <form> element

        var formData = new FormData(form); // Wrap form contents

        var route = form_obj.attr("action");

        $.ajax({
            url: route,

            type: form_obj.attr("method"),

            data: formData,

            dataType: "json",

            contentType: false,

            cache: false,

            processData: false,

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (result) {
                removeAjaxLoader();
                // alert(result.message);
                if (result.status) {
                    messageToaster("success", result.message, "Success");

                    $(form_id)[0].reset();
                    console.log(result.data);

                    if (result.data.redirect_url) {
                        // alert(result.data.url);
                        console.log(result.data.redirect_url);
                        window.location.href = result.data.redirect_url;
                    }

                    if (location_reload) {
                        location.reload(true);
                    }

                } else {
                    messageToaster("error", result.message, "Failed");

                }

            },
            error: function (result) {

                console.log(result.data);
                removeAjaxLoader();

                ajax_show_error(result);

            },
        });
    }
    else {
        messageToaster("error", 'Please Fill All Required Input Fields.', "Failed");
    }
}

function showAjaxLoader() {
    $("body").addClass("loading");
}

function removeAjaxLoader() {
    $("body").removeClass("loading");
}

function onFetchFormModal(event, route, target_model, bind_model) {

    event.preventDefault();
    showAjaxLoader();
    $.get(route, function (data) {
        removeAjaxLoader();
        if (data.length > 0) {

            $(bind_model).html(data);

            $(target_model).modal({
                backdrop: 'static',
                keyboard: false
            });

            $(target_model).modal("show");
        }
        else {
            messageToaster("error", data.message, "Failed");
        }
    });
}

function formSubmitWithModal(event, obj, modal_id, form_id, table_id, option) {

    event.preventDefault();
    var form_obj = $(form_id).find('small.req');
    if (validate_form_fields(form_obj) == 0 && validate_form(form_obj) == 0) {
        // Swal.fire({
        //     title: 'Are you sure?',
        //     text: "You want to " + $(obj).attr("content"),
        //     icon: 'warning',
        //     showCancelButton: true,
        //     confirmButtonText: 'Yes',
        //     customClass: {
        //         cancelButton: 'btn btn-secondary',
        //         confirmButton: 'btn btn-primary me-3',
        //     },
        //     buttonsStyling: false
        // }).then(function (result) {
        //     if (result.value) {

        removeNumberFormatFromAll();

        showAjaxLoader();
        // hideSubmitButton();

        var form_obj = $(form_id);

        var form = document.querySelector(form_id); // Find the <form> element

        var formData = new FormData(form); // Wrap form contents

        var route = form_obj.attr("action");

        $.ajax({
            url: route,

            type: form_obj.attr("method"),

            data: formData,

            dataType: "json",

            contentType: false,

            cache: false,

            processData: false,

            success: function (result) {
                removeAjaxLoader();
                // showSubmitButton();
                if (result.status) {
                    messageToaster("success", result.message, "Success");

                    // messageAlert(result.message);

                    if ($(modal_id).length > 0) {

                        hideModal(modal_id);

                    }

                    if ($(table_id).length > 0) {

                        // Check if it's a DataTable
                        if ($.fn.DataTable.isDataTable(table_id)) {
                            $(table_id).DataTable().ajax.reload();
                        }
                        // Check if it's a Tabulator
                        else if ($(table_id).hasClass('tabulator')) {
                            let tabulatorTable = Tabulator.findTable(table_id)[0];
                            if (tabulatorTable) {
                                tabulatorTable.setData(); // reload Tabulator data
                            }
                        }
                    } else {

                        location.reload(true);
                    }
                    // $(form_id)[0].reset();

                } else {
                    messageToaster("error", result.message, "Failed");
                }

            },
            error: function (result) {
                removeAjaxLoader();
                ajax_show_error(result);

            },
        });
        //     }
        // });
    }
    else {
        messageToaster("error", 'Please Fill All Required Input Fields.', "Failed");
    }
}

function messageAlert(message, title = "Success!", icon = "success", position = "bottom-start", $timer = 10000) {
    Swal.fire({
        title: title,
        text: message,
        icon: icon,
        position: position, // Display at the top-right corner
        toast: true,
        showConfirmButton: false,
        timer: $timer// Time in milliseconds (e.g., 10000 = 10 seconds)
    });
}

function hideModal(modal_id) {
    // $(".modal-backdrop").remove();
    // $("body").removeClass("modal-open");
    // $("body").css("padding-right", "");
    // $(modal_id).hide();

    $(modal_id).modal('hide');
}

function validate_form_fields(element) {
    var error = 0;
    element.each(function () {
        if ($(this).attr('value') == "*") {
            var current_value = $(this).closest('div').find('input, textarea, select');

            if (current_value.hasClass('select2-hidden-accessible')) {
                current_value = current_value.closest('div').find('select'); // Target actual select element
            }

            // Skip validation if the element is disabled or readonly
            if (element.prop('disabled') || element.prop('readonly')) {
                return;
            }

            if (current_value.val() == "selected" || current_value.val() == null || current_value.val().trim().length == 0) {
                field_refersh(current_value);
                field_unsuccess(current_value, "The field is required.");
                error++;
            }
        }
    });

    return error;
}

function validate_form(form_element) {


    var error_counter = 0;

    form_element.each(function () {


        if ($(this).html().length > 1) {
            error_counter++;

        }
        else {

        }
    });

    return error_counter;


}

function deleteRecord(event, obj, route, table_id) {
    event.preventDefault();

    Swal.fire({
        title: $(obj).attr("title"),
        text: $(obj).attr("content"),
        imageUrl: '../../vuexy/assets/images/auth/trash-x.png', // Add your custom icon URL
        imageWidth: 50, // Adjust size as needed
        imageHeight: 50,
        showCancelButton: true,
        confirmButtonText: 'Yes',
        customClass: {
            cancelButton: 'btn btn-secondary',
            confirmButton: 'btn btn-primary me-3',
        },
        buttonsStyling: false
    }).then(function (result) {
        if (result.value) {

            showAjaxLoader();

            $.get(route, function (result) {

                removeAjaxLoader();

                if (result.status) {
                    messageToaster("success", result.message, "Success");

                    if ($(table_id).length > 0) {

                        // Check if it's a DataTable
                        if ($.fn.DataTable.isDataTable(table_id)) {
                            $(table_id).DataTable().ajax.reload();
                        }
                        // Check if it's a Tabulator
                        else if ($(table_id).hasClass('tabulator')) {
                            let tabulatorTable = Tabulator.findTable(table_id)[0];
                            if (tabulatorTable) {
                                tabulatorTable.setData(); // reload Tabulator data
                            }
                        }
                    } else {

                        location.reload(true);
                    }
                }
                else {
                    messageToaster("error", result.message, "Failed");
                }
            });
        }
    });
}

function changeStatus(event, obj, route, table_id) {
    event.preventDefault();

    Swal.fire({
        title: $(obj).attr("title"),
        text: $(obj).attr("content"),
        imageUrl: '../../vuexy/assets/images/auth/replace.png', // Add your custom icon URL
        imageWidth: 50, // Adjust size as needed
        imageHeight: 50,
        showCancelButton: true,
        confirmButtonText: 'Yes',
        customClass: {
            image: 'change-status',
            cancelButton: 'btn btn-secondary',
            confirmButton: 'btn btn-primary me-3',
        },
        buttonsStyling: false
    }).then(function (result) {
        if (result.value) {

            showAjaxLoader();

            $.get(route, function (result) {

                removeAjaxLoader();

                if (result.status) {
                    messageToaster("success", result.message, "Success");

                    if ($(table_id).length > 0) {

                        // Check if it's a DataTable
                        if ($.fn.DataTable.isDataTable(table_id)) {
                            $(table_id).DataTable().ajax.reload();
                        }
                        // Check if it's a Tabulator
                        else if ($(table_id).hasClass('tabulator')) {
                            let tabulatorTable = Tabulator.findTable(table_id)[0];
                            if (tabulatorTable) {
                                tabulatorTable.setData(); // reload Tabulator data
                            }
                        }
                    } else {

                        location.reload(true);
                    }
                }
                else {
                    messageToaster("error", result.message, "Failed");
                }
            });
        }
    });
}

function numberFormat(value) {
    let result = 0;
    if (!isNaN(value) && value !== '') {
        let parts = parseFloat(value).toFixed(2).split('.');
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        result = parts.join('.');
    }

    return result;
}
function numberFormatOnAll() {
    removeNumberFormatFromAll();

    $('.cls_number_format').each(function () {
        value = $(this).val();

        let result = 0;

        if (!isNaN(value) && value !== '') {

            if ($(this).hasClass('no_need_decimal')) {
                result = value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            } else {
                let parts = parseFloat(value).toFixed(2).split('.');

                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');

                result = parts.join('.');
            }
        }
        $(this).val(result)
    });
}

function removeNumberFormat(value) {
    if (typeof value !== 'string') {
        return 0;
    }
    var result = 0;
    value = value.replace(/,/g, ''); // Remove existing commas
    if (!isNaN(value) && value !== '') {
        result = parseFloat(value); // Convert to a number and remove extra decimal places
    }

    return result;
}

function removeNumberFormatFromAll() {
    $('.cls_number_format').each(function () {
        let value = $(this).val().replace(/,/g, '');
        if (!isNaN(value) && value !== '') {
            $(this).val(parseFloat(value).toString());
        }
    });
}
function removeNumberFormatIfBaseCurrency() {
    $('.no_need_number_format').each(function () {
        // let value = $(this).val().replace(/,/g, '');
        if (!isNaN(value) && value !== '') {
            $(this).val(parseInt(value).toString());
        }
    });
}

function serachValue(event, obj, route, input_from, target_result) {
    event.preventDefault();

    showAjaxLoader();

    var serach_value = $(input_from).val();

    $.get(route, { serach_value: serach_value }, function (result) {

        if (result.status) {
            if (result.status) {
                removeAjaxLoader();

                $(target_result).html(result.data);

                messageToaster("success", result.message, "Success");
            }
            else {
                removeAjaxLoader();

                $(target_result).html(result.data);

            }
        }
        else {
            removeAjaxLoader();

            messageToaster("error", result.message, "Error");

        }
    });
}
var row_id = 0;

function addMore(event, route, target_result) {
    event.preventDefault();

    showAjaxLoader();

    row_id = row_id + 1;

    $.get(route, { row_id: row_id }, function (result) {

        if (result.status) {
            if (result.status) {
                removeAjaxLoader();

                $(target_result).append(result.data);

                messageToaster("success", result.message, "Success");
            }
            else {
                removeAjaxLoader();

                $(target_result).append(result.data);

                messageToaster("error", result.message, "Error");
            }
        }
    });
}
function removeRow(event, target_result, route = false) {
    event.preventDefault();

    if (route) {
        $.get(route, function (result) {
            if (result.status) {
                messageToaster("success", result.message, "Success");
            }
            else {
                messageToaster("error", result.message, "Error");
            }
        });
    }

    $(target_result).remove();


}

function displayCSV(event, obj, route, target) {
    event.preventDefault();


    // Get the file from the input element
    var import_csv = $(obj)[0].files[0];

    if (import_csv) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var csvContent = e.target.result;
            parseCSV(csvContent, target);
        };

        reader.readAsText(import_csv);
    }
}

function parseCSV(csvContent, target) {
    // Split the CSV content by line breaks to get rows
    var rows = csvContent.split("\n");

    // Find the target tbody element
    var tbody = document.getElementById(target);

    if (tbody) {
        // Clear existing content in the tbody
        tbody.innerHTML = "";

        // Loop through the rows
        for (var i = 0; i < rows.length; i++) {
            var row = document.createElement("tr");

            // Split each row by comma to get columns
            var cols = rows[i].split(",");

            for (var j = 0; j < cols.length; j++) {
                var cell = document.createElement("td");
                cell.textContent = cols[j];
                row.appendChild(cell);
            }

            tbody.appendChild(row);
        }
    } else {
        console.error("Element with ID '" + target + "' not found.");
    }
}

function isOther(event, obj, target) {
    event.preventDefault();

    if ($(obj).val() == 'Other') {
        $(target).removeClass('d-none');
        $('.change_class').removeClass('col-md-12');
        $('.change_class').addClass('col-md-6');
    }
    else {
        $(target).addClass('d-none');

        $('.change_class').removeClass('col-md-6');
        $('.change_class').addClass('col-md-12');
    }
}

function loadSelect2Options(event, obj, route, target) {
    event.preventDefault();

    showAjaxLoader();

    var value = $(obj).val(); // DONT CHANGE ITS USING MULTIPLE PLACES

    $.get(route, { value: value }, function (result) {

        if (result.status) {
            // messageToaster("success", result.message, "Success","toast-bottom-right");

            var options = '';

            // Iterate through the result data and create options
            $.each(result.data, function (index, item) {
                if (item.id && item.name) {
                    options += '<option value="' + item.id + '">' + item.name + '</option>';
                }
                else {
                    options += '<option value="' + item + '">' + item + '</option>';
                }
            });

            // Set options in the target select2 dropdown
            $(target).html(options).val('').trigger('change'); // Ensure no option is pre-selected
        } else {
            // If no data found, clear select and show placeholder
            $(target).html('<option value="">No teams available</option>').trigger('change');
        }
        const select2_element = $(target);

        if (select2_element.length) {
            select2_element.each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>').select2({
                    placeholder: 'Select Value',
                    dropdownParent: $this.parent()
                });
            });
        }
        removeAjaxLoader();
    }).fail(function () {
        messageToaster("error", result.message, "Error", "toast-bottom-right");

    });
}

function initSelect2(target, placeholder_val = 'Select Value', unselect_default = false, input_width = '100%', ajaxUrl = null, minimumInputLength = 2, is_data_attribute = false) {
    const select_element = $(target);

    if (select_element.length) {
        select_element.each(function () {
            var $this = $(this);
            var selectedValue = $this.find(":selected").val();

            if ($this.find('option[value=""]').length === 0) {
                $this.prepend('<option value="" disabled>' + placeholder_val + '</option>');
            }

            let options = {
                placeholder: placeholder_val,
                allowClear: true,
                dropdownParent: $this.parent(),
                width: input_width
            };

            if (ajaxUrl) {
                options.minimumInputLength = minimumInputLength;
                options.ajax = {
                    url: ajaxUrl,
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        console.log(params);
                        return {
                            q: params.term,
                            size: 10
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.results
                        };
                    },
                    cache: true
                };

                if (is_data_attribute) {
                    // Attach data-* attributes to the rendered <option>
                    options.templateResult = function (data) {
                        if (data.id) {
                            let option = $(`<span>${data.text}</span>`);
                            option.attr('data-currencyid', data.currency_id || '');
                            return option;
                        }
                        return data.text;
                    };

                    // Also make sure selection keeps the data attribute
                    options.templateSelection = function (data) {
                        if (data.id) {
                            let option = $(`<span>${data.text}</span>`);
                            option.attr('data-currencyid', data.currency_id || '');
                            return option;
                        }
                        return data.text;
                    };
                }
            }

            $this.wrap('<div class="position-relative" style="width:' + input_width + '"></div>').select2(options);

            if (selectedValue == 'other') {
                $this.val(null).trigger('change');
            }
            if (unselect_default) {
                $this.val($this.val()).trigger('change');
            }
        });
    }
}

function initDate(target) {
    var targetEl = document.querySelector(target);

    if (targetEl) {
        flatpickr(targetEl, {
            monthSelectorType: 'static',
            allowInput: true,
            altInput: true,
            altFormat: "F j, Y",  // Display format: April 1, 2025
            dateFormat: "Y-m-d",  // Submission format: 2025-04-01
            clickOpens: true,
            onReady: function (selectedDates, dateStr, instance) {
                instance._input.setAttribute('placeholder', 'MM DD, YYYY');
            },
            onChange: function (selectedDates, dateStr, instance) {
                if (instance.altInput) {
                    instance.altInput.style.borderColor = "#ced4da";
                    var error_container = $(targetEl).parentsUntil().children('small.req');
                    error_container.html('');
                }
            }
        });
    }
}

function initDateRange(target = '.date-range-style') {
    const flatpickrRange = document.querySelector(target);

    if (flatpickrRange !== undefined && flatpickrRange !== null) {
        const currentYear = new Date().getFullYear();
        const startOfYear = `${currentYear}-01-01`;
        const endOfYear = `${currentYear}-12-31`;

        flatpickrRange.flatpickr({
            mode: 'range',
            dateFormat: "Y-m-d", // format used in the actual input (form submission)
            altInput: true, // enables the alternate input (user-facing)
            altFormat: "M j, Y", // display format (e.g. Apr 1, 2025)
            defaultDate: [startOfYear, endOfYear]
        });
    }
}


function dateFormat(inputDate) {
    var dateObj = new Date(inputDate);

    var formattedDate = dateObj.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });

    return formattedDate
}

function otherOption(event, obj, route, option_set_to, label, target_modal = '#md_other_option', bind_modal = '#bind_other_modal') {
    event.preventDefault();
    if ($(obj).val() == 'Other') {
        showAjaxLoader()

        $.get(route, { label: label, option_set_to: option_set_to }, function (data) {
            if (data.length > 0) {

                $(bind_modal).html(data);

                $(target_modal).modal({
                    backdrop: 'static',
                    keyboard: false
                });

                $(target_modal).modal("show");
            }
            else {
                messageToaster("error", data.message, "Failed");
            }
            removeAjaxLoader();
        });

    }
}

function setOtherOption(event, option_set_to, target_modal) {
    event.preventDefault();

    var other_option = $('.other_option').val();
    other_option = other_option.charAt(0).toUpperCase() + other_option.slice(1);
    console.log(other_option);
    var select_element = $(option_set_to);

    if (select_element.length) {
        select_element.each(function () {
            var $this = $(this);

            if (!$this.find('option[value="' + other_option + '"]').length) {
                // Append new option
                $this.append(new Option(other_option, other_option, false, false));

                // Refresh Select2 to reflect the new option
                $this.val(other_option).trigger('change');

                if ($(target_modal).length > 0) {

                    hideModal(target_modal);

                }
            }
            else {
                messageToaster("warning", 'Option Already Exist', "Warning");
            }
        });
    }
}

// Adjust z-index for multiple modals
$(document).on('show.bs.modal', '.modal', function () {
    var openModals = $('.modal:visible').length;
    var zIndex = 1090 + (openModals * 10); // Starting from 1090
    $(this).css('z-index', zIndex);

    setTimeout(() => {
        $('.modal-backdrop').not('.modal-stack')
            .css('z-index', zIndex - 1)
            .addClass('modal-stack');
    }, 0);
});

$(document).on('hidden.bs.modal', '.modal', function () {
    if ($('.modal:visible').length) {
        var topModal = $('.modal:visible').last();
        var zIndex = 1090 + (($('.modal:visible').length - 1) * 10);
        topModal.css('z-index', zIndex);
    }
});





$(document).on('change', '.select2-hidden-accessible', function () {
    field_refersh($(this));
});

function hideShow(target) {
    if ($(target).hasClass('d-none')) {
        $(target).removeClass('d-none');
    } else {
        addDNone(target); // Show message if unchecked
    }
}

function addDNone(target) {
    $(target).addClass('d-none');
}


function applyMask(element, target, btn_text, mask = "999-9999-9999", text = 'JP (+88)') {
    console.log(target, mask, text);
    var phoneInput = $(target);

    phoneInput.inputmask(mask); // USA format: (123)-456-7890

    $(btn_text).text(text);

    if ($(element).data("maskid") && $(element).data("masktarget")) {
        mask_id = $(element).data("maskid");

        mask_target = $(element).data("masktarget");

        $(mask_target).val(mask_id);
    }

    // Remove active class from all items within the same dropdown
    $(element).closest('.dropdown-menu').find('.country-item').removeClass('active');

    // Add active class to clicked item
    $(element).addClass('active');
}

function calculatePurchasingTotal() //This Function is for Purchase and Draft Purchase
{
    // REMOVE COMA SEPERATILON BEFORE CALCULATION START
    removeNumberFormatFromAll();//<-- This Function Will remove Coma Seperation from all those inputs where cls_number_format class exist

    // --------Purchasing Quantity Calculation Start--------------------
    let total_quantity = 1,
        sub_total = 1,
        calculated_tax = 0,
        discount = 0,
        payable_amount = 0;
    total_purchased_mount = 0;

    // Calculate total quantity from inputs where class "calculate_Purchasing_quantity" This class just lies on BUNDLES,PACKETS,PRODUCTS,Avg QUANTITY
    $(".calculate_Purchasing_quantity").each(function () {
        const value = parseFloat($(this).val());// Make Sure Number Format Would Removed
        if (!isNaN(value) && !$(this).prop("disabled")) {
            total_quantity *= value === 0 ? 1 : value; // Treat 0 as 1
        }
    });

    $(".total_quantity").val(total_quantity);
    // --------Purchasing Quantity Calculation END--------------------

    //---------  subtotal Calculation START--------------------------
    var price = parseFloat($('#price').val());// Make Sure Number Format Would Removed
    if (!isNaN(price)) {
        sub_total = (price * total_quantity).toFixed(2);

        var tax_percentage = parseFloat($('#tax_percentage').val()) || 0;// Make Sure Number Format Would Removed
        calculated_tax = (sub_total * (tax_percentage / 100)).toFixed(2);

        var total_purchased_mount = (parseFloat(sub_total) + parseFloat(calculated_tax)).toFixed(2);

        $('#tax_calculation').val(calculated_tax);
        $('#total_amount').val(total_purchased_mount);
    }
    $('#sub_total').val(sub_total);
    //---------  subtotal Calculation END--------------------------

    // Handle discount
    if ($("[name=discount]").length) {
        discount = parseFloat($("[name=discount]").val()) || 0;
    }

    // Calculate payable amount
    payable_amount = (total_purchased_mount - discount).toFixed(2);

    $(".payable_amount").val(payable_amount);
}
