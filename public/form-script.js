/**
 * Sola Donation Form JavaScript - Enhanced Multi-Step Version
 */

(function ($) {
    'use strict';

    // State
    let currentLang = 'he';
    let currentCurrency = 'ILS';
    let currentAmount = '100';
    let donationType = 'monthly';
    let currentStep = 1;

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

    // Card logos (SVG data URIs)
    const cardLogos = {
        visa: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDgiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCA0OCAzMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iNDgiIGhlaWdodD0iMzIiIHJ4PSI0IiBmaWxsPSIjMUQzMThEIi8+PHBhdGggZD0iTTE4IDEwSDIyTDIwIDE4SDE2TDE4IDEwWiIgZmlsbD0id2hpdGUiLz48cGF0aCBkPSJNMjQgMTBMMjYgMThIMjhMMzAgMTBIMjRaIiBmaWxsPSJ3aGl0ZSIvPjwvc3ZnPg==',
        mastercard: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDgiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCA0OCAzMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iNDgiIGhlaWdodD0iMzIiIHJ4PSI0IiBmaWxsPSIjRUI2MDJEIi8+PGNpcmNsZSBjeD0iMTgiIGN5PSIxNiIgcj0iOCIgZmlsbD0iI0ZGNUIyQiIvPjxjaXJjbGUgY3g9IjMwIiBjeT0iMTYiIHI9IjgiIGZpbGw9IiNGNzcyMzYiLz48L3N2Zz4=',
        amex: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDgiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCA0OCAzMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iNDgiIGhlaWdodD0iMzIiIHJ4PSI0IiBmaWxsPSIjMDA4NkRFIi8+PHBhdGggZD0iTTEyIDEwSDIwTDE2IDE2TDIwIDIySDE2TDEyIDEwWiIgZmlsbD0id2hpdGUiLz48cGF0aCBkPSJNMjggMTBIMzZMMzIgMjJIMjhMMjggMTBaIiBmaWxsPSJ3aGl0ZSIvPjwvc3ZnPg==',
        discover: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDgiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCA0OCAzMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iNDgiIGhlaWdodD0iMzIiIHJ4PSI0IiBmaWxsPSIjRkY2MjAwIi8+PGNpcmNsZSBjeD0iMjQiIGN5PSIxNiIgcj0iNiIgZmlsbD0id2hpdGUiLz48L3N2Zz4='
    };

    // Initialize when DOM is ready
    $(document).ready(function () {
        initMultiStep();
        initLanguageToggle();
        initCurrencySelection();
        initDonationType();
        initAmountSelection();
        initCardValidation();
        initFormSubmission();
        initPaymentMethods();
    });

    /**
     * Multi-Step Navigation
     */
    function initMultiStep() {
        // Show first step by default
        $('.sola-form-section[data-step="1"]').addClass('active');

        // Add step attribute to sections
        $('.sola-form-section').each(function (index) {
            $(this).attr('data-step', index + 1);
        });

        // Create navigation buttons
        $('.sola-form-section:not(:first-child)').append(`
            <div class="sola-form-navigation">
                <button type="button" class="sola-nav-btn btn-back">
                    <span data-he="חזור" data-en="Back">חזור</span>
                </button>
                <button type="button" class="sola-nav-btn btn-next">
                    <span data-he="המשך" data-en="Next">המשך</span>
                </button>
            </div>
        `);

        // First section - only next button
        $('.sola-form-section:first-child').append(`
            <div class="sola-form-navigation">
                <button type="button" class="sola-nav-btn btn-next" style="width: 100%;">
                    <span data-he="המשך" data-en="Next">המשך</span>
                </button>
            </div>
        `);

        // Last section - just submit button (already exists)
        $('.sola-form-section:last-child .sola-form-navigation').remove();

        // Navigation handlers
        $(document).on('click', '.btn-next', function () {
            if (validateStep(currentStep)) {
                goToStep(currentStep + 1);
            }
        });

        $(document).on('click', '.btn-back', function () {
            goToStep(currentStep - 1);
        });

        // Step indicator click
        $('.sola-step').on('click', function () {
            const stepNum = parseInt($(this).data('step'));
            if (stepNum < currentStep || validateStep(currentStep)) {
                goToStep(stepNum);
            }
        });
    }

    function goToStep(stepNum) {
        if (stepNum < 1 || stepNum > 3) return;

        // Hide current step
        $('.sola-form-section').removeClass('active');

        // Show new step
        $(`.sola-form-section[data-step="${stepNum}"]`).addClass('active');

        // Update progress indicator
        $('.sola-step').removeClass('active completed');
        $(`.sola-step[data-step="${stepNum}"]`).addClass('active');

        // Mark previous steps as completed
        for (let i = 1; i < stepNum; i++) {
            $(`.sola-step[data-step="${i}"]`).addClass('completed');
        }

        currentStep = stepNum;

        // Scroll to top
        $('html, body').animate({
            scrollTop: $('.sola-form-header').offset().top - 20
        }, 300);
    }

    function validateStep(step) {
        let isValid = true;
        const $section = $(`.sola-form-section[data-step="${step}"]`);

        // Validate required fields in current step
        $section.find('input[required]').each(function () {
            if (!$(this).val() || $(this).val().trim() === '') {
                isValid = false;
                $(this).addClass('error');
            } else {
                $(this).removeClass('error');
            }
        });

        if (!isValid) {
            showMessage('error', currentLang === 'he'
                ? 'אנא מלא את כל השדות הנדרשים'
                : 'Please fill all required fields');
        }

        return isValid;
    }

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

        $wrapper.attr('data-lang', lang).attr('dir', dir);

        // Update all text elements
        $('[data-he][data-en]').each(function () {
            const $el = $(this);
            $el.text($el.data(lang));
        });

        updateSubmitButton();
    }

    /**
     * Currency Selection
     */
    function initCurrencySelection() {
        $('#currencyGroup .sola-option-btn').on('click', function () {
            const $btn = $(this);
            const currency = $btn.data('value');

            $('#currencyGroup .sola-option-btn').removeClass('active');
            $btn.addClass('active');

            currentCurrency = currency;
            $('#currency').val(currency);

            updateCurrencySymbols();
        });
    }

    function updateCurrencySymbols() {
        const symbol = currencySymbols[currentCurrency];
        $('.amount-symbol').text(symbol);
        $('.currency-symbol').text(symbol);
        updateSubmitButton();
    }

    /**
     * Donation Type
     */
    function initDonationType() {
        $('#donationTypeGroup .sola-option-btn').on('click', function () {
            const $btn = $(this);
            const type = $btn.data('value');

            $('#donationTypeGroup .sola-option-btn').removeClass('active');
            $btn.addClass('active');

            donationType = type;
            $('#donationType').val(type);

            if (type === 'monthly') {
                $('#chargeDayRow').slideDown(300);
            } else {
                $('#chargeDayRow').slideUp(300);
            }
        });
    }

    /**
     * Amount Selection - ENHANCED
     */
    function initAmountSelection() {
        // Preset amounts
        $('.sola-amount-btn:not(.sola-custom-amount-btn)').on('click', function () {
            const $btn = $(this);
            const amount = $btn.data('value');

            $('.sola-amount-btn').removeClass('active');
            $btn.addClass('active');

            // Reset custom amount
            $('#customAmountBtn').removeClass('active editing');
            $('#customAmountInput').hide();
            $('.custom-label').show();
            $('#customAmountInput').val('');

            currentAmount = amount;
            $('#amount').val(amount);
            updateSubmitButton();
        });

        // Custom amount button click
        $('#customAmountBtn').on('click', function () {
            const $btn = $(this);

            if (!$btn.hasClass('editing')) {
                // Enter edit mode
                $('.sola-amount-btn').removeClass('active');
                $btn.addClass('active editing');
                $('.custom-label').hide();
                $('#customAmountInput').show().focus();
                $('.currency-symbol').show();
            }
        });

        // Custom amount input
        $('#customAmountInput').on('input', function () {
            const value = $(this).val();
            if (value && parseFloat(value) > 0) {
                currentAmount = value;
                $('#amount').val(value);
                updateSubmitButton();
            }
        });

        // Click outside to close custom amount
        $(document).on('click', function (e) {
            const $customBtn = $('#customAmountBtn');
            if (!$(e.target).closest('#customAmountBtn').length) {
                if ($customBtn.hasClass('editing') && !$('#customAmountInput').val()) {
                    $customBtn.removeClass('active editing');
                    $('#customAmountInput').hide();
                    $('.custom-label').show();
                    $('.currency-symbol').hide();
                }
            }
        });
    }

    function updateSubmitButton() {
        const symbol = currencySymbols[currentCurrency];
        const displayAmount = currentAmount ? `${symbol}${currentAmount}` : `${symbol}0`;
        $('.amount-display').text(displayAmount);
    }

    /**
     * Card Validation - ENHANCED WITH LOGOS
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

            // Detect card type and show logo
            const cardType = detectCardType(value.replace(/\s/g, ''));
            displayCardLogo(cardType);
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

    function displayCardLogo(type) {
        const $logo = $('#cardTypeLogo');

        if (!type || !cardLogos[type]) {
            $logo.removeClass('visible').html('');
            return;
        }

        $logo.html(`<img src="${cardLogos[type]}" alt="${type}">`).addClass('visible');
    }

    /**
     * Payment Methods (Google Pay / Apple Pay)
     */
    function initPaymentMethods() {
        // Check if Google Pay is available
        if (window.google && window.google.payments) {
            // Google Pay supported
            console.log('Google Pay available');
        }

        // Check if Apple Pay is available
        if (window.ApplePaySession) {
            // Apple Pay supported
            console.log('Apple Pay available');
        }

        // Placeholder handlers (need Sola API integration)
        $('.sola-wallet-btn.google-pay').on('click', function () {
            alert('Google Pay integration - requires Sola API setup');
        });

        $('.sola-wallet-btn.apple-pay').on('click', function () {
            alert('Apple Pay integration - requires Sola API setup');
        });
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

        requiredFields.forEach(function (fieldName) {
            const $field = $(`#${fieldName}`);
            if (!$field.val() || $field.val().trim() === '') {
                isValid = false;
                $field.addClass('error');
            } else {
                $field.removeClass('error');
            }
        });

        // Email validation
        const email = $('#email').val();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email && !emailRegex.test(email)) {
            isValid = false;
            $('#email').addClass('error');
        }

        // Amount validation
        const amount = parseFloat($('#amount').val() || currentAmount);
        if (!amount || amount <= 0) {
            isValid = false;
            showMessage('error', currentLang === 'he' ? 'אנא בחר סכום תרומה' : 'Please select a donation amount');
            return false;
        }

        // Card number
        const cardNumber = $('#cardNumber').val().replace(/\s/g, '');
        if (cardNumber.length < 13) {
            isValid = false;
            showMessage('error', currentLang === 'he' ? 'מספר כרטיס לא תקין' : 'Invalid card number');
            return false;
        }

        // Expiry
        const expiry = $('#expiry').val();
        if (!/^\d{2}\/\d{2}$/.test(expiry)) {
            isValid = false;
            showMessage('error', currentLang === 'he' ? 'תוקף לא תקין' : 'Invalid expiry date');
            return false;
        }

        // CVV
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

        $btn.addClass('loading').prop('disabled', true);
        $message.hide();

        const formData = {
            action: 'sola_donation_process',
            nonce: solaDonation.nonce,
            firstName: $('#firstName').val(),
            lastName: $('#lastName').val(),
            phone: $('#phone').val(),
            email: $('#email').val(),
            address: $('#address').val(),
            taxId: $('#taxId').val(),
            currency: currentCurrency,
            donationType: donationType,
            amount: parseFloat($('#amount').val() || currentAmount),
            cardNumber: $('#cardNumber').val().replace(/\s/g, ''),
            expiry: $('#expiry').val().replace('/', ''),
            cvv: $('#cvv').val()
        };

        if (donationType === 'monthly') {
            formData.chargeDay = $('#chargeDay').val();
            formData.chargeNow = $('#chargeNow').is(':checked');
        }

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

                    setTimeout(function () {
                        if (response.data.redirectUrl) {
                            window.location.href = response.data.redirectUrl;
                        } else {
                            $('#solaDonationFormElement')[0].reset();
                            goToStep(1);
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

        if (type === 'success') {
            setTimeout(function () {
                $message.slideUp(300);
            }, 5000);
        }
    }

})(jQuery);
