<?php
/**
 * Donation Form Template
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="sola-donation-form-wrapper" id="solaDonationForm" data-lang="he" dir="rtl">
    <div class="sola-form-container">
        <!-- Header -->
        <div class="sola-form-header">
            <div class="sola-header-content">
                <h1 class="sola-title" data-he="תרומה לאור מאיר וברכה" data-en="Donate to Ohr Meir & Bracha">תרומה לאור מאיר וברכה</h1>
                <p class="sola-subtitle" data-he="כל תרומה תתקבל באהבה" data-en="Any donation will be gratefully received">כל תרומה תתקבל באהבה</p>
            </div>
            <button type="button" class="sola-lang-toggle" id="langToggle">
                <span data-he="English" data-en="עברית">English</span>
            </button>
        </div>
        
        <!-- Progress Indicator -->
        <div class="sola-progress-steps">
            <div class="sola-step active" data-step="1">
                <div class="step-number">1</div>
                <div class="step-label" data-he="פרטים אישיים" data-en="Personal Info">פרטים אישיים</div>
            </div>
            <div class="sola-step" data-step="2">
                <div class="step-number">2</div>
                <div class="step-label" data-he="פרטי תרומה" data-en="Donation Details">פרטי תרומה</div>
            </div>
            <div class="sola-step" data-step="3">
                <div class="step-number">3</div>
                <div class="step-label" data-he="תשלום" data-en="Payment">תשלום</div>
            </div>
        </div>

        <form id="solaDonationFormElement" class="sola-donation-form">
            <!-- Personal Details Section -->
            <div class="sola-form-section">
                <h2 class="sola-section-title">
                    <div class="sola-section-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <span data-he="פרטים אישיים" data-en="Personal Details">פרטים אישיים</span>
                </h2>
                
                <div class="sola-form-row">
                    <div class="sola-form-field">
                        <div class="sola-input-wrapper">
                            <input type="text" name="firstName" id="firstName" class="sola-input" required>
                            <label class="sola-label" data-he="שם פרטי" data-en="First Name">שם פרטי</label>
                            <span class="sola-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                        </div>
                    </div>
                    
                    <div class="sola-form-field">
                        <div class="sola-input-wrapper">
                            <input type="text" name="lastName" id="lastName" class="sola-input" required>
                            <label class="sola-label" data-he="שם משפחה" data-en="Last Name">שם משפחה</label>
                            <span class="sola-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="sola-form-row">
                    <div class="sola-form-field">
                        <div class="sola-input-wrapper">
                            <input type="tel" name="phone" id="phone" class="sola-input" required>
                            <label class="sola-label" data-he="טלפון" data-en="Phone">טלפון</label>
                            <span class="sola-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    
                    <div class="sola-form-field">
                        <div class="sola-input-wrapper">
                            <input type="email" name="email" id="email" class="sola-input" required>
                            <label class="sola-label" data-he="דואר אלקטרוני" data-en="Email">דואר אלקטרוני</label>
                            <span class="sola-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="sola-form-row">
                    <div class="sola-form-field">
                        <div class="sola-input-wrapper">
                            <input type="text" name="address" id="address" class="sola-input" required placeholder="">
                            <label class="sola-label" data-he="כתובת מגורים" data-en="Address">כתובת מגורים</label>
                            <span class="sola-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </span>
                        </div>
                    </div>
                    
                    <div class="sola-form-field">
                        <div class="sola-input-wrapper">
                            <input type="text" name="taxId" id="taxId" class="sola-input" placeholder="">
                            <label class="sola-label" data-he="מספר עוסק / ת.ז" data-en="Tax ID">מספר עוסק / ת.ז</label>
                            <span class="sola-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Donation Details Section -->
            <div class="sola-form-section">
                <h2 class="sola-section-title">
                    <div class="sola-section-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                    </div>
                    <span data-he="פרטי תרומה" data-en="Donation Details">פרטי תרומה</span>
                </h2>
                
                <div class="sola-form-row">
                    <div class="sola-form-field">
                        <label class="sola-field-label" data-he="מטבע" data-en="Currency">מטבע</label>
                        <div class="sola-button-group" id="currencyGroup">
                            <button type="button" class="sola-option-btn active" data-value="ILS">₪</button>
                            <button type="button" class="sola-option-btn" data-value="USD">$</button>
                            <button type="button" class="sola-option-btn" data-value="EUR">€</button>
                        </div>
                        <input type="hidden" name="currency" id="currency" value="ILS">
                    </div>
                    
                    <div class="sola-form-field">
                        <label class="sola-field-label" data-he="סוג תרומה" data-en="Donation Type">סוג תרומה</label>
                        <div class="sola-button-group" id="donationTypeGroup">
                            <button type="button" class="sola-option-btn active" data-value="monthly" data-he="חודשי" data-en="Monthly">חודשי</button>
                            <button type="button" class="sola-option-btn" data-value="oneTime" data-he="חד פעמי" data-en="One-Time">חד פעמי</button>
                        </div>
                        <input type="hidden" name="donationType" id="donationType" value="monthly">
                    </div>
                </div>
                
                <div class="sola-form-row">
                    <div class="sola-form-field sola-full-width">
                        <label class="sola-field-label" data-he="סכום התרומה" data-en="Donation Amount">סכום התרומה</label>
                        <div class="sola-amount-grid" id="amountGrid">
                            <button type="button" class="sola-amount-btn" data-value="50"><span class="amount-symbol">₪</span>50</button>
                            <button type="button" class="sola-amount-btn active" data-value="100"><span class="amount-symbol">₪</span>100</button>
                            <button type="button" class="sola-amount-btn" data-value="180"><span class="amount-symbol">₪</span>180</button>
                            <button type="button" class="sola-amount-btn" data-value="500"><span class="amount-symbol">₪</span>500</button>
                            <div class="sola-amount-btn sola-custom-amount-btn" id="customAmountBtn">
                                <span class="custom-label" data-he="סכום אחר" data-en="Custom Amount">סכום אחר</span>
                                <input type="number" class="custom-amount-input number-font" id="customAmountInput" min="1" step="0.01" placeholder="" style="display: none;">
                                <span class="currency-symbol" style="display: none;">₪</span>
                            </div>
                        </div>
                        <input type="hidden" name="amount" id="amount" value="100">
                    </div>
                </div>
                
                <div class="sola-form-row" id="chargeDayRow">
                    <div class="sola-form-field">
                        <label class="sola-field-label" data-he="יום לחיוב" data-en="Charge Day">יום לחיוב</label>
                        <div class="sola-input-wrapper">
                            <select name="chargeDay" id="chargeDay" class="sola-input number-font">
                                <?php for ($i = 1; $i <= 28; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                            <span class="sola-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                            </span>
                        </div>
                    </div>
                    
                    <div class="sola-form-field">
                        <div class="sola-checkbox-wrapper">
                            <label class="sola-checkbox-label">
                                <input type="checkbox" name="chargeNow" id="chargeNow" class="sola-checkbox">
                                <span class="sola-checkbox-custom"></span>
                                <span class="sola-checkbox-text" data-he="לחייב את התרומה הראשונה מהחודש הנוכחי" data-en="Charge the first donation this month">לחייב את התרומה הראשונה מהחודש הנוכחי</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Details Section -->
            <div class="sola-form-section">
                <div class="sola-section-header">
                    <h2 class="sola-section-title">
                        <div class="sola-section-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                        </div>
                        <span data-he="פרטי תשלום" data-en="Payment Details">פרטי תשלום</span>
                    </h2>
                    <div class="sola-security-badge">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        <span data-he="תשלום מאובטח" data-en="Secure Payment">תשלום מאובטח</span>
                    </div>
                </div>
                
                <div class="sola-form-row">
                    <div class="sola-form-field sola-full-width">
                        <div class="sola-input-wrapper">
                            <input type="text" name="cardNumber" id="cardNumber" class="sola-input number-font" maxlength="19" required autocomplete="cc-number">
                            <label class="sola-label" data-he="מספר כרטיס אשראי" data-en="Credit Card Number">מספר כרטיס אשראי</label>
                            <span class="sola-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="cardIcon">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                            </span>
                            <span class="card-type-logo" id="cardTypeLogo"></span>
                        </div>
                    </div>
                </div>
                
                <div class="sola-form-row">
                    <div class="sola-form-field">
                        <div class="sola-input-wrapper">
                            <input type="text" name="expiry" id="expiry" class="sola-input number-font" placeholder="MM/YY" maxlength="5" required autocomplete="cc-exp">
                            <label class="sola-label" data-he="תוקף" data-en="Expiry">תוקף</label>
                            <span class="sola-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                            </span>
                        </div>
                    </div>
                    
                    <div class="sola-form-field">
                        <div class="sola-input-wrapper">
                            <input type="text" name="cvv" id="cvv" class="sola-input number-font" maxlength="4" required autocomplete="cc-csc">
                            <label class="sola-label" data-he="CVV" data-en="CVV">CVV</label>
                            <span class="sola-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="sola-encryption-notice">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    <span data-he="מוצפן 256-bit" data-en="256-bit Encrypted">מוצפן 256-bit</span>
                </div>
                
                <!-- Payment Methods -->
                <div class="sola-payment-methods">
                    <div class="sola-payment-methods-title" data-he="או תשלום מהיר" data-en="Or pay with">או תשלום מהיר</div>
                    <div class="sola-wallet-buttons">
                        <button type="button" class="sola-wallet-btn google-pay">
                            <svg width="41" height="17" viewBox="0 0 41 17" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.5 8.5v3h-1.9c-.3 0-.5-.2-.5-.5v-5c0-.3.2-.5.5-.5h3.2c1.3 0 2.3 1 2.3 2.3s-1 2.3-2.3 2.3h-1.3zm0-3.7v2.4h1.3c.7 0 1.2-.5 1.2-1.2s-.5-1.2-1.2-1.2h-1.3z" fill="#5F6368"/>
                                <path d="M26.9 9c0 1.7-1.3 2.9-2.9 2.9s-2.9-1.2-2.9-2.9 1.3-2.9 2.9-2.9 2.9 1.2 2.9 2.9zm-1.1 0c0-1.1-.8-1.9-1.8-1.9s-1.8.8-1.8 1.9.8 1.9 1.8 1.9 1.8-.8 1.8-1.9z" fill="#5F6368"/>
                                <path d="M31.2 13.5c-1.6 0-2.9-1.2-2.9-2.9s1.3-2.9 2.9-2.9c.9 0 1.6.3 2.1.9l-.7.7c-.3-.4-.8-.6-1.4-.6-1 0-1.8.8-1.8 1.9s.8 1.9 1.8 1.9c.8 0 1.3-.5 1.5-1.1h-1.5v-.9h2.5c0 .1.1.3.1.5 0 1.6-1 2.5-2.6 2.5z" fill="#5F6368"/>
                                <path d="M34.7 3.5h1.1v8h-1.1z" fill="#5F6368"/>
                                <path d="M40.5 11v-2.5c0-1.3-.8-2.1-2-2.1-.7 0-1.4.3-1.7.9l.9.4c.2-.3.5-.4.9-.4.5 0 .9.3.9.8v.1c-.2-.1-.6-.2-1-.2-1 0-2 .5-2 1.5s1 1.5 1.9 1.5c.6 0 1.2-.3 1.4-.7h.1v.6h1v-2.9zm-.1 1c0 .8-.7 1.3-1.5 1.3-.5 0-1.1-.2-1.1-.7 0-.7.7-.9 1.4-.9.3 0 .7.1.9.2v.1z" fill="#5F6368"/>
                                <path d="M11.1 7.3c0-.4 0-.7-.1-1.1H5.7v2.1h3c-.1.6-.5 1.1-1.1 1.4v1.4h1.8c1.1-1 1.7-2.4 1.7-3.8z" fill="#4285F4"/>
                                <path d="M5.7 12.5c1.5 0 2.7-.5 3.6-1.3l-1.8-1.4c-.5.3-1.1.5-1.8.5-1.4 0-2.5-1-2.9-2.3H1v1.4c.9 1.7 2.7 2.9 4.7 2.9z" fill="#34A853"/>
                                <path d="M2.8 8c-.1-.3-.2-.7-.2-1s.1-.7.2-1V4.6H1c-.4.7-.6 1.6-.6 2.4s.2 1.7.6 2.4L2.8 8z" fill="#FBBC05"/>
                                <path d="M5.7 4.1c.8 0 1.5.3 2 .8l1.5-1.5c-.9-.8-2.1-1.3-3.6-1.3-2 0-3.8 1.2-4.7 2.9L2.8 6c.3-1.3 1.4-2.3 2.9-2.3z" fill="#EA4335"/>
                            </svg>
                            <span data-he="Pay" data-en="Pay">Pay</span>
                        </button>
                        <button type="button" class="sola-wallet-btn apple-pay">
                            <svg width="40" height="17" viewBox="0 0 40 17" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.8 2.8c.5-.6.8-1.4.7-2.2-.7 0-1.5.5-2 1-.4.5-.8 1.3-.7 2.1.8 0 1.5-.4 2-.9z" fill="white"/>
                                <path d="M8.5 3.9c-1.1-.1-2 .6-2.5.6s-1.3-.6-2.2-.6c-1.1 0-2.2.7-2.7 1.7-.2.5-.3 1-.3 1.5 0 2 1.5 4.9 3.4 4.9.9 0 1.5-.6 2.2-.6.7 0 1.2.6 2.2.6 1.9 0 3.1-2.7 3.1-2.7s-1.9-.7-1.9-2.8c0-1.8 1.5-2.6 1.5-2.6-1.2-1.5-2.9-1.5-3.8-1z" fill="white"/>
                                <path d="M18.9 3.5h1.7c1 0 1.6.4 1.6 1.2 0 .5-.3.9-.8 1 .6.1 1 .6 1 1.2 0 .9-.7 1.4-1.8 1.4h-1.7V3.5zm1 1.9h.6c.4 0 .7-.2.7-.6s-.2-.6-.7-.6h-.6V5.4zm0 1.9h.7c.5 0 .8-.2.8-.6s-.3-.6-.8-.6h-.7v1.2z" fill="white"/>
                                <path d="M26.4 8.3h-1l-.5-1.7h-1.8l-.5 1.7h-1l1.8-4.8h1l1.8 4.8zM24.7 5.9l-.6-1.8h-.1l-.6 1.8h1.3z" fill="white"/>
                                <path d="M30.5 8.3h-.9v-2c0-.7-.3-1-.8-1-.5 0-.9.4-.9 1v2h-.9v-3.5h.9v.5h.1c.2-.4.6-.6 1.1-.6 1 0 1.5.6 1.5 1.5v2.1z" fill="white"/>
                                <path d="M34.8 8.3h-.9v-2c0-.7-.3-1-.8-1-.5 0-.9.4-.9 1v2h-.9v-3.5h.9v.5h.1c.2-.4.6-.6 1.1-.6 1 0 1.5.6 1.5 1.5v2.1z" fill="white"/>
                                <path d="M37.9 8.3l-.1-.4h-.1c-.2.3-.6.5-1.1.5-.7 0-1.2-.5-1.2-1.1 0-.9.7-1.3 2.3-1.3v-.1c0-.4-.2-.6-.7-.6s-.9.2-1.2.5l-.3-.6c.4-.4 1-.6 1.6-.6 1 0 1.5.5 1.5 1.5v2.2h-.7zm-.2-1.7c-1 0-1.4.2-1.4.7s.2.5.6.5c.5 0 .9-.3.9-.8v-.4z" fill="white"/>
                            </svg>
                            <span data-he="Pay" data-en="Pay">Pay</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="sola-submit-btn" id="submitBtn">
                <svg class="heart-icon" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
                <span class="btn-text">
                    <span data-he="תרום" data-en="Donate">תרום</span>
                    <span class="amount-display number-font">₪100</span>
                    <span data-he="עכשיו" data-en="Now">עכשיו</span>
                </span>
                <span class="spinner" style="display: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="spin">
                        <line x1="12" y1="2" x2="12" y2="6"></line>
                        <line x1="12" y1="18" x2="12" y2="22"></line>
                        <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                        <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                        <line x1="2" y1="12" x2="6" y2="12"></line>
                        <line x1="18" y1="12" x2="22" y2="12"></line>
                        <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                        <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                    </svg>
                </span>
            </button>
            
            <!-- Messages -->
            <div class="sola-message" id="formMessage" style="display: none;"></div>
        </form>
    </div>
</div>
