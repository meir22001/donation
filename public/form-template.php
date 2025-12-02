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
    <!-- Floating background elements -->
    <div class="floating-bg floating-bg-1"></div>
    <div class="floating-bg floating-bg-2"></div>
    
    <div class="sola-form-container">
        <!-- Header -->
        <div class="sola-form-header">
            <div class="sola-header-content">
                <h1 class="sola-title" data-he="תרומה בטוחה" data-en="Secure Donation">תרומה בטוחה</h1>
                <p class="sola-subtitle" data-he="כל תרומה עושה את ההבדל" data-en="Every contribution makes a difference">כל תרומה עושה את ההבדל</p>
            </div>
            <button type="button" class="sola-lang-toggle" id="langToggle">
                <span data-he="English" data-en="עברית">English</span>
            </button>
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
                    <div class="sola-form-field sola-full-width">
                        <div class="sola-input-wrapper">
                            <input type="text" name="address" id="address" class="sola-input" required>
                            <label class="sola-label" data-he="כתובת מגורים" data-en="Address">כתובת מגורים</label>
                            <span class="sola-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
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
                            <button type="button" class="sola-amount-btn sola-custom-toggle" id="customAmountToggle" data-he="סכום אחר" data-en="Custom Amount">סכום אחר</button>
                        </div>
                        <input type="hidden" name="amount" id="amount" value="100">
                        
                        <div class="sola-custom-amount" id="customAmountField" style="display: none;">
                            <div class="sola-input-wrapper">
                                <input type="number" name="customAmount" id="customAmount" class="sola-input number-font" min="1" step="0.01">
                                <label class="sola-label" data-he="הזן סכום" data-en="Enter Amount">הזן סכום</label>
                                <span class="sola-icon">
                                    <span class="currency-symbol">₪</span>
                                </span>
                            </div>
                        </div>
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
