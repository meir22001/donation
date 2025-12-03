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
            <div class="sola-form-section" data-step="1">
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
                            <input type="text" name="firstName" id="firstName" class="sola-input" required placeholder=" ">
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
                            <input type="text" name="lastName" id="lastName" class="sola-input" required placeholder=" ">
                            <label class="sola-label" data-he="שם משפחה" data-en="Last Name">שם משפחה</label>
                            <span class="sola-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M9 21v-2a4 4 0 0 1 3-3.87"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <circle cx="15" cy="7" r="4"></circle>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="sola-form-row">
                    <div class="sola-form-field">
                        <div class="sola-input-wrapper">
                            <input type="tel" name="phone" id="phone" class="sola-input" required placeholder=" ">
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
                            <input type="email" name="email" id="email" class="sola-input" required placeholder=" ">
                            <label class="sola-label" data-he="דואר אלקטרוני" data-en="Email">דואר אלקטרוני</label>
                            <span class="sola-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </span>
                            <span class="sola-validation-icon"></span>
                        </div>
                    </div>
                </div>
                
                <div class="sola-form-row">
                    <div class="sola-form-field">
                        <div class="sola-input-wrapper">
                            <input type="text" name="address" id="address" class="sola-input" required placeholder=" ">
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
                                    <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                    <circle cx="8" cy="10" r="2"></circle>
                                    <path d="M14 8h4"></path>
                                    <path d="M14 12h4"></path>
                                    <path d="M6 16h12"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Donation Details Section -->
            <div class="sola-form-section" data-step="2">
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
                            <button type="button" class="sola-amount-btn sola-custom-amount-btn" id="customAmountBtn">
                            <span class="custom-label" data-he="סכום אחר" data-en="Custom Amount">סכום אחר</span>
                            <span class="currency-symbol" style="display: none;">₪</span>
                            <input type="number" 
                                   class="custom-amount-input number-font" 
                                   id="customAmountInput" 
                                   min="1" 
                                   step="0.01" 
                                   placeholder="0"
                                   style="display: none;">
                            <svg class="edit-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                        </button>
                        </div>
                        <input type="hidden" name="amount" id="amount" value="100">
                    </div>
                </div>
                
                <!-- Charge Day Selection (Monthly Only) -->
                <div class="sola-form-row" id="chargeDayRow">
                    <div class="sola-form-field">
                        <div class="sola-input-wrapper">
                            <select name="chargeDay" id="chargeDay" class="sola-input">
                                <?php for ($i = 1; $i <= 28; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                            <label class="sola-label" data-he="יום לחיוב" data-en="Charge Day">יום לחיוב</label>
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
                </div>

                <!-- Charge Now Checkbox (Monthly Only) -->
                <div class="sola-form-row" id="chargeNowRow">
                    <div class="sola-form-field sola-checkbox-field">
                        <div class="sola-checkbox-wrapper">
                            <input type="checkbox" name="chargeNow" id="chargeNow" class="sola-checkbox" checked>
                            <div class="sola-checkbox-custom"></div>
                            <span class="sola-checkbox-text" data-he="לחייב את התרומה הראשונה מהחודש הנוכחי" data-en="Charge first donation from current month">לחייב את התרומה הראשונה מהחודש הנוכחי</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Details Section -->
            <div class="sola-form-section" data-step="3">
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
                            <input type="text" name="cardNumber" id="cardNumber" class="sola-input number-font" maxlength="19" required autocomplete="cc-number" placeholder=" ">
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
                            <input type="text" name="expiry" id="expiry" class="sola-input number-font" placeholder=" " maxlength="5" required autocomplete="cc-exp">
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
                            <input type="text" name="cvv" id="cvv" class="sola-input number-font" maxlength="4" required autocomplete="cc-csc" placeholder=" ">
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
                        <button type="button" class="sola-wallet-btn google-pay" title="Requires merchant verification">
                            <svg width="41" height="17" viewBox="0 0 41 17" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.526 2.635v4.083h2.518c.6 0 1.096-.202 1.488-.605.403-.402.605-.882.605-1.437 0-.544-.202-1.018-.605-1.422-.392-.413-.888-.62-1.488-.62h-2.518zm0 5.52v4.736h-1.504V1.198h3.99c1.013 0 1.873.337 2.582 1.012.72.675 1.08 1.497 1.08 2.466 0 .991-.36 1.819-1.08 2.482-.697.665-1.559.996-2.583.996h-2.485v.001zm7.668 2.287c0 .392.166.718.499.98.332.26.722.391 1.168.391.633 0 1.196-.234 1.692-.701.497-.469.744-1.019.744-1.65-.469-.37-1.123-.555-1.962-.555-.61 0-1.12.148-1.528.442-.409.294-.613.657-.613 1.093m1.946-5.815c1.112 0 1.989.297 2.633.89.642.594.964 1.408.964 2.442v4.932h-1.439v-1.11h-.065c-.622.914-1.45 1.372-2.486 1.372-.882 0-1.621-.262-2.215-.784-.594-.523-.891-1.176-.891-1.96 0-.828.313-1.486.94-1.976s1.463-.735 2.51-.735c.892 0 1.629.163 2.206.49v-.344c0-.522-.207-.966-.621-1.33a2.132 2.132 0 0 0-1.455-.547c-.84 0-1.504.353-1.995 1.062l-1.324-.834c.73-1.045 1.81-1.568 3.238-1.568m11.853.262l-5.02 11.53h-1.504l1.864-4.034-3.302-7.496h1.635l2.387 5.749h.032l2.322-5.75z" fill="#5F6368"/>
                                <path d="M13.448 7.134c0-.474-.04-.93-.116-1.366H6.988v2.588h3.634a3.11 3.11 0 0 1-1.344 2.042v1.68h2.169c1.27-1.17 2.001-2.9 2.001-4.944" fill="#4285F4"/>
                                <path d="M6.988 13.7c1.816 0 3.344-.595 4.459-1.621l-2.169-1.681c-.603.406-1.38.643-2.29.643-1.754 0-3.244-1.182-3.776-2.774H.978v1.731a6.728 6.728 0 0 0 6.01 3.703" fill="#34A853"/>
                                <path d="M3.212 8.267a4.034 4.034 0 0 1 0-2.572V3.964H.978a6.678 6.678 0 0 0 0 6.034l2.234-1.731z" fill="#FBBC05"/>
                                <path d="M6.988 2.921c.992 0 1.88.34 2.58 1.008v.001l1.92-1.918C10.324.928 8.804.262 6.989.262a6.728 6.728 0 0 0-6.01 3.702l2.234 1.731c.532-1.592 2.022-2.774 3.776-2.774" fill="#EA4335"/>
                            </svg>
                            <span data-he="Pay" data-en="Pay">Pay</span>
                        </button>
                        <button type="button" class="sola-wallet-btn apple-pay" title="Requires merchant verification">
                            <svg class="apple-pay-logo" width="40" height="17" viewBox="0 0 40 17" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.8 2.8c.5-.6.8-1.4.7-2.2-.7 0-1.5.5-2 1-.4.5-.8 1.3-.7 2.1.8 0 1.5-.4 2-.9z" fill="white"/>
                                <path d="M8.5 3.9c-1.1-.1-2 .6-2.5.6s-1.3-.6-2.2-.6c-1.1 0-2.2.7-2.7 1.7-.2.5-.3 1-.3 1.5 0 2 1.5 4.9 3.4 4.9.9 0 1.5-.6 2.2-.6.7 0 1.2.6 2.2.6 1.9 0 3.1-2.7 3.1-2.7s-1.9-.7-1.9-2.8c0-1.8 1.5-2.6 1.5-2.6-1.2-1.5-2.9-1.5-3.8-1z" fill="white"/>
                                <path d="M18.9 3.5h1.7c1 0 1.6.4 1.6 1.2 0 .5-.3.9-.8 1 .6.1 1 .6 1 1.2 0 .9-.7 1.4-1.8 1.4h-1.7V3.5zm1 1.9h.6c.4 0 .7-.2.7-.6s-.2-.6-.7-.6h-.6V5.4zm0 1.9h.7c.5 0 .8-.2.8-.6s-.3-.6-.8-.6h-.7v1.2z" fill="white"/>
                                <path d="M26.4 8.3h-1l-.5-1.7h-1.8l-.5 1.7h-1l1.8-4.8h1l1.8 4.8zM24.7 5.9l-.6-1.8h-.1l-.6 1.8h1.3z" fill="white"/>
                                <path d="M30.5 8.3h-.9v-2c0-.7-.3-1-.8-1-.5 0-.9.4-.9 1v2h-.9v-3.5h.9v.5h.1c.2-.4.6-.6 1.1-.6 1 0 1.5.6 1.5 1.5v2.1z" fill="white"/>
                                <path d="M34.8 8.3h-.9v-2c0-.7-.3-1-.8-1-.5 0-.9.4-.9 1v2h-.9v-3.5h.9v.5h.1c.2-.4.6-.6 1.1-.6 1 0 1.5.6 1.5 1.5v2.1z" fill="white"/>
                                <path d="M37.9 8.3l-.1-.4h-.1c-.2.3-.6.5-1.1.5-.7 0-1.2-.5-1.2-1.1 0-.9.7-1.3 2.3-1.3v-.1c0-.4-.2-.6-.7-.6s-.9.2-1.2.5l-.3-.6c.4-.4 1-.6 1.6-.6 1 0 1.5.5 1.5 1.5v2.2h-.7zm-.2-1.7c-1 0-1.4.2-1.4.7s.2.5.6.5c.5 0 .9-.3.9-.8v-.4z" fill="white"/>
                            </svg>
                        </button>
                    </div>
                    </div>
                </div>

                <!-- Navigation for Step 3 with Submit Button -->
                <div class="sola-form-navigation">
                    <button type="button" class="sola-nav-btn btn-back" onclick="window.solaDonationGoToStep(2)">
                        <span class="nav-text" data-he="חזור לפרטי תרומה" data-en="Back to Donation Details">חזור לפרטי תרומה</span>
                    </button>
                    
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
                </div>
            </div>

            
            <!-- Messages -->
            <div class="sola-message" id="formMessage" style="display: none;"></div>
        </form>
    </div>
</div>
