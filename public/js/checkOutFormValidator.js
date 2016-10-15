jQuery.validator.setDefaults({
    debug: true,
    success: "valid"
});

$("#checkOut").validate({
    rules: {
        name: "required",
        address: "required",
        suburb: "required",
        post_code: {
            required: true,
            maxlength: 4,
            digits: true
        },
        mobile_number: {
            maxlength: 10,
            digits: true
        },
        card_holder_name: "required",
        credit_card_number: {
            required: true,
            digits: true,
            maxlength: 16
        },
        expiry_month: "required",
        expiry_year: "required",
        card_cvc: {
            required: true,
            maxlength: 3,
            digits: true
        }
    },
    messages: {
        name: "Please enter a valid name.",
        address: "Please enter a valid postal address.",
        suburb: "Please enter a valid suburb.",
        post_code: "Please enter a valid postcode.",
        mobile_number: "Please enter a valid mobile number",
        credit_card_number: "Please enter a valid credit card number.",
        card_cvc: "Please enter a valid CVC."
    },
    submitHandler: function(form) {
        if ($(form).valid()) {
            form.submit();
        }
        return false;
    }
});