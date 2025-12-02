/**
 * Sola Donation Form JavaScript
 * Handles language switching, form interactions, validation, and submission
 */

(function ($) {
    'use strict';

    // State
    let currentLang = 'he';
    let currentCurrency = 'ILS';
    let currentAmount = '100';
    let donationType = 'monthly';

    // Currency symbols
    const currencySymbols = {
        'ILS': '₪',
        'USD': '$',
        'EUR': '€'
    };

    // Card type patterns
    const cardPatterns = {
        visa: /^4/,
        mastercard: /^(5[1-5]|2[2-7])/,
        amex: /^3[47]/,
        discover: /^(6011|622(12[6-9]|1[3-9][0-9]|[2-8][0-9]{2}|9[0-1][0-9]|92[0-5])|64[4-9]|65)/
    };

    // Initialize when DOM is ready
    $(document).ready(function () {
        initLanguageToggle();
        initCurrencySelection();
        initDonationType();
        initAmountSelection();
        initCardValidation();
        initFormSubmission();
    });

    /**
     * Language Toggle
     */
    function initLanguageToggle() {
        $('#langToggle').on('click', function () {
            currentLang = currentLang === 'he' ? 'en' : 'he';
            switchLanguage(currentLang);
        });
    }

    function switchLanguage(lang) {
        const $wrapper = $('#solaDonationForm');
        const dir = lang === 'he' ? 'rtl' : 'ltr';

        // Update direction
        $wrapper.attr('data-lang', lang).attr('dir', dir);

        // Update all text elements with data attributes
        $('[data-he][data-en]').each(function () {
            const $el = $(this);
            $el.text($el.data(lang));
        });

        // Smooth transition
        $wrapper.css('opacity', '0.9');
        setTimeout(function () {
            $wrapper.css('opacity', '1');
        }, 150);
    }

    /**
     * Currency Selection
     */
    function initCurrencySelection() {
        $('#currencyGroup .sola-option-btn').on('click', function () {
            const $btn = $(this);
            const currency = $btn.data('value');

            // Update UI
            $('#currencyGroup .sola-option-btn').removeClass('active');
            $btn.addClass('active');

            // Update state
            currentCurrency = currency;
            $('#currency').val(currency);

            // Update all currency symbols
            updateCurrencySymbols();
        });
    }

    function updateCurrencySymbols() {
        const symbol = currencySymbols[currentCurrency];

        // Update amount buttons
        $('.amount-symbol').text(symbol);

        // Update custom amount icon
        $('.currency-symbol').text(symbol);

        // Update submit button
        updateSubmitButton();
    }

    /**
     * Donation Type
     */
    function initDonationType() {
        $('#donationTypeGroup .sola-option-btn').on('click', function () {
            const $btn = $(this);
            const type = $btn.data('value');

            // Update UI
            $('#donationTypeGroup .sola-option-btn').removeClass('active');
            $btn.addClass('active');

            // Update state
            donationType = type;
            $('#donationType').val(type);

            // Show/hide charge day row
            if (type === 'monthly') {
                $('#chargeDayRow').slideDown(300);
            } else {
                $('#chargeDayRow').slideUp(300);
            }
        });
    }

    /**
     * Amount Selection
     */
    function initAmountSelection() {
        // Preset amounts
        $('.sola-amount-btn:not(.sola-custom-toggle)').on('click', function () {
            const $btn = $(this);
            const amount = $btn.data('value');

            // Update UI
            $('.sola-amount-btn').removeClass('active');
            $btn.addClass('active');

            // Update state
            currentAmount = amount;
            $('#amount').val(amount);
            $('#customAmount').val('');

            // Hide custom amount field
            $('#customAmountField').removeClass('active').slideUp(300);

            // Update submit button
            updateSubmitButton();
        });

        // Custom amount toggle
        $('#customAmountToggle').on('click', function () {
            const $field = $('#customAmountField');
            const $btn = $(this);

            // Remove active from preset buttons
            $('.sola-amount-btn:not(.sola-custom-toggle)').removeClass('active');
            $btn.addClass('active');

            // Show custom amount field with animation
            if (!$field.hasClass('active')) {
                $field.addClass('active').slideDown(300);
                setTimeout(function () {
                    $('#customAmount').focus();
                }, 350);
            }
        });

        // Custom amount input
        $('#customAmount').on('input', function () {
            const value = $(this).val();
            if (value && parseFloat(value) > 0) {
                currentAmount = value;
                $('#amount').val(value);
                updateSubmitButton();
            }
        });
    }

    function updateSubmitButton() {
        const symbol = currencySymbols[currentCurrency];
        const displayAmount = currentAmount ? `${symbol}${currentAmount}` : `${symbol}0`;
        $('.amount-display').text(displayAmount);
    }

    /**
     * Card Validation
     */
    function initCardValidation() {
        // Card number formatting and validation
        $('#cardNumber').on('input', function () {
            let value = $(this).val().replace(/\s/g, '');

            // Format with spaces
            if (value.length > 0) {
                value = value.match(/.{1,4}/g).join(' ');
                $(this).val(value);
            }

            // Detect card type
            const cardType = detectCardType(value.replace(/\s/g, ''));
            displayCardType(cardType);
        });

        // Expiry date formatting
        $('#expiry').on('input', function () {
            let value = $(this).val().replace(/\D/g, '');

            if (value.length >= 2) {
                value = value.substr(0, 2) + '/' + value.substr(2, 2);
            }

            $(this).val(value);
        });

        // CVV validation
        $('#cvv').on('input', function () {
            let value = $(this).val().replace(/\D/g, '');
            $(this).val(value);
        });
    }

    function detectCardType(number) {
        for (const [type, pattern] of Object.entries(cardPatterns)) {
            if (pattern.test(number)) {
                return type;
            }
        }
        return null;
    }

    function displayCardType(type) {
        const $logo = $('#cardTypeLogo');

        if (!type) {
            $logo.removeClass('visible').text('');
            return;
        }

        const logos = {
            visa: 'VISA',
            mastercard: 'MC',
            amex: 'AMEX',
            discover: 'DISC'
        };

        $logo.text(logos[type]).addClass('visible');
    }

    /**
     * Form Submission
     */
    function initFormSubmission() {
        $('#solaDonationFormElement').on('submit', function (e) {
            e.preventDefault();

            if (validateForm()) {
                submitForm();
            }
        });
    }

    function validateForm() {
        let isValid = true;
        const $message = $('#formMessage');

        // Get all required fields
        const requiredFields = [
            'firstName', 'lastName', 'phone', 'email', 'address',
            'cardNumber', 'expiry', 'cvv'
        ];

        // Validate each field
        requiredFields.forEach(function (fieldName) {
            const $field = $(`#${fieldName}`);
            if (!$field.val() || $field.val().trim() === '') {
                isValid = false;
                $field.addClass('error');
            } else {
                $field.removeClass('error');
            }
        });

        // Validate email format
        const email = $('#email').val();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email && !emailRegex.test(email)) {
            isValid = false;
            $('#email').addClass('error');
        }

        // Validate amount
        const amount = parseFloat($('#amount').val() || currentAmount);
        if (!amount || amount <= 0) {
            isValid = false;
            showMessage('error', currentLang === 'he' ? 'אנא בחר סכום תרומה' : 'Please select a donation amount');
            return false;
        }

        // Validate card number
        const cardNumber = $('#cardNumber').val().replace(/\s/g, '');
        if (cardNumber.length < 13) {
            isValid = false;
            showMessage('error', currentLang === 'he' ? 'מספר כרטיס לא תקין' : 'Invalid card number');
            return false;
        }

        // Validate expiry
        const expiry = $('#expiry').val();
        if (!/^\d{2}\/\d{2}$/.test(expiry)) {
            isValid = false;
            showMessage('error', currentLang === 'he' ? 'תוקף לא תקין' : 'Invalid expiry date');
            return false;
        }

        // Validate CVV
        const cvv = $('#cvv').val();
        if (cvv.length < 3 || cvv.length > 4) {
            isValid = false;
            showMessage('error', currentLang === 'he' ? 'CVV לא תקין' : 'Invalid CVV');
            return false;
        }

        if (!isValid) {
            showMessage('error', currentLang === 'he' ? 'אנא מלא את כל השדות הנדרשים' : 'Please fill all required fields');
        }

        return isValid;
    }

    function submitForm() {
        const $btn = $('#submitBtn');
        const $message = $('#formMessage');

        // Show loading state
        $btn.addClass('loading').prop('disabled', true);
        $message.hide();

        // Get form data
        const formData = {
            action: 'sola_donation_process',
            nonce: solaDonation.nonce,
            firstName: $('#firstName').val(),
            lastName: $('#lastName').val(),
            phone: $('#phone').val(),
            email: $('#email').val(),
            address: $('#address').val(),
            currency: currentCurrency,
            donationType: donationType,
            amount: parseFloat($('#amount').val() || currentAmount),
            cardNumber: $('#cardNumber').val().replace(/\s/g, ''),
            expiry: $('#expiry').val().replace('/', ''),
            cvv: $('#cvv').val()
        };

        // Add monthly donation fields
        if (donationType === 'monthly') {
            formData.chargeDay = $('#chargeDay').val();
            formData.chargeNow = $('#chargeNow').is(':checked');
        }

        // Submit via AJAX
        $.ajax({
            url: solaDonation.ajaxUrl,
            type: 'POST',
            data: formData,
            success: function (response) {
                if (response.success) {
                    showMessage('success', currentLang === 'he'
                        ? 'תודה על תרומתך! העסקה בוצעה בהצלחה.'
                        : 'Thank you for your donation! Transaction completed successfully.'
                    );

                    // Reset form
                    setTimeout(function () {
                        if (response.data.redirectUrl) {
                            window.location.href = response.data.redirectUrl;
                        } else {
                            $('#solaDonationFormElement')[0].reset();
                            $btn.removeClass('loading').prop('disabled', false);
                        }
                    }, 2000);
                } else {
                    showMessage('error', response.data.message || (currentLang === 'he'
                        ? 'אירעה שגיאה בעיבוד התשלום. אנא נסה שוב.'
                        : 'An error occurred processing the payment. Please try again.'
                    ));
                    $btn.removeClass('loading').prop('disabled', false);
                }
            },
            error: function () {
                showMessage('error', currentLang === 'he'
                    ? 'אירעה שגיאה בתקשורת. אנא נסה שוב.'
                    : 'A communication error occurred. Please try again.'
                );
                $btn.removeClass('loading').prop('disabled', false);
            }
        });
    }

    function showMessage(type, message) {
        const $message = $('#formMessage');
        $message
            .removeClass('success error')
            .addClass(type)
            .text(message)
            .slideDown(300);

        // Auto-hide success messages
        if (type === 'success') {
            setTimeout(function () {
                $message.slideUp(300);
            }, 5000);
        }
    }

})(jQuery);
