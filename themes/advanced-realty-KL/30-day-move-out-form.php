<?php
/**
 * Template Name: Move Out Form
 */

// Handle form submission before outputting header
$form_status = '';
$form_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_moveout'])) {
    
    // 1. Verify reCAPTCHA
    $recaptcha_secret = '6LdCR5UsAAAAADIiHmjoYnoG-7nr5cSByWoEa-iZ'; // <--- ENTER YOUR V2 SECRET KEY HERE
    $recaptcha_response = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';
    
    $verify_response = wp_remote_post('https://www.google.com/recaptcha/api/siteverify', array(
        'body' => array(
            'secret' => $recaptcha_secret,
            'response' => $recaptcha_response
        )
    ));
    
    $verify_body = wp_remote_retrieve_body($verify_response);
    $verify_data = json_decode($verify_body);
    
    if (empty($recaptcha_response) || !$verify_data->success) {
        $form_status = 'error';
        $form_message = 'Please verify that you are a human by checking the reCAPTCHA box.';
    } else {
        // 2. Sanitize and collect data
        $tenant_name = sanitize_text_field($_POST['tenant_name']);
        $tenant_email = sanitize_email($_POST['tenant_email']);
        $tenant_address = sanitize_text_field($_POST['tenant_address']);
        $move_reason = sanitize_text_field($_POST['move_reason']);
        $vacate_date = sanitize_text_field($_POST['vacate_date']);
        $phone_number = sanitize_text_field($_POST['phone_number']);
        $forwarding_address = sanitize_text_field($_POST['forwarding_address']);
        $signature = sanitize_text_field($_POST['signature']);
        $sign_date = sanitize_text_field($_POST['sign_date']);
        
        // 3. Prepare Email
        $to = 'info@advancedrealty.com'; // <--- ENTER THE EMAIL TO RECEIVE THIS FORM
        $from = 'noreply@advancedrealty.com'; // <--- MUST MATCH WP MAIL SMTP "FROM" ACCOUNT
        $subject = 'New Move-Out Notice: ' . $tenant_name;
        
        $message = "You have received a new 30-Day Move-Out Notice from the website.\n\n";
        $message .= "PRESENT RENTAL INFORMATION:\n";
        $message .= "Name: " . $tenant_name . "\n";
        $message .= "Email: " . $tenant_email . "\n";
        $message .= "Address: " . $tenant_address . "\n";
        $message .= "Reason for Moving: " . $move_reason . "\n\n";
        
        $message .= "VACATE DETAILS:\n";
        $message .= "Vacating Date/Time: Noon on " . $vacate_date . "\n";
        $message .= "Appointment Phone: " . $phone_number . "\n\n";
        
        $message .= "DEPOSIT REFUND FORWARDING ADDRESS:\n";
        $message .= "Address: " . $forwarding_address . "\n\n";
        
        $message .= "AGREEMENT & SIGNATURE:\n";
        $message .= "Signature: " . $signature . "\n";
        $message .= "Date Signed: " . $sign_date . "\n";
        
        // Anti-Spam Headers (Proofpoint Fix)
        $headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            'From: Advanced Realty Website <' . $from . '>',
            'Reply-To: ' . $tenant_name . ' <' . $tenant_email . '>'
        );
        
        // 4. Send Email
        if (wp_mail($to, $subject, $message, $headers)) {
            $form_status = 'success';
            $form_message = 'Your move-out notice has been successfully submitted. Thank you.';
        } else {
            $form_status = 'error';
            $form_message = 'There was a problem sending your form. Please try again or contact us directly.';
        }
    }
}

// Calculate exactly 30 days from today for the calendar restriction
$min_date = date('Y-m-d', strtotime('+30 days'));

get_header(); ?>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<style>
    .move-out-wrapper {
        line-height: 1.8; 
        font-family: 'Inter', sans-serif; 
        color: #333; 
        max-width: 850px; 
        margin: 40px auto; 
        padding: 50px; 
        border: 1px solid #e2e8f0; 
        border-radius: 8px;
        background-color: #fff; 
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    }
    
    /* Beautiful, Highly Visible Inputs */
    .form-input {
        border: 1px solid #cbd5e1 !important;
        background-color: #f8fafc !important;
        border-radius: 4px !important;
        padding: 10px 14px !important;
        font-family: inherit;
        font-size: 1rem;
        color: #0f172a !important;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }
    .form-input:focus {
        outline: none;
        border-color: #00A699 !important; /* Advanced Realty Teal */
        box-shadow: 0 0 0 3px rgba(0, 166, 153, 0.2) !important;
        background-color: #fff !important;
    }

    /* Input Layout Helpers */
    .w-full { width: 100%; margin-top: 5px; margin-bottom: 15px; display: block; }
    .w-inline { display: inline-block; width: auto; min-width: 220px; margin: 0 5px; }
    .w-date { width: 170px; min-width: 170px; }
    
    .info-box {
        background: #f1f5f9; 
        padding: 25px; 
        border-left: 5px solid #00A699; 
        margin: 30px 0;
        border-radius: 0 6px 6px 0;
    }
    .signature-section {
        display: flex; 
        gap: 30px; 
        margin-top: 50px; 
        padding-top: 30px; 
        border-top: 2px solid #e2e8f0;
        flex-wrap: wrap;
    }
    .sig-block { flex: 1; min-width: 250px; }

    .submit-btn {
        background-color: #00A699; 
        color: #fff;
        padding: 14px 35px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 25px;
        transition: background 0.2s;
        width: 100%;
    }
    .submit-btn:hover { background-color: #008f83; }
    .msg-success { background: #d4edda; color: #155724; padding: 20px; border-radius: 6px; margin-bottom: 25px; font-weight: 600;}
    .msg-error { background: #f8d7da; color: #721c24; padding: 20px; border-radius: 6px; margin-bottom: 25px; font-weight: 600;}
</style>

<div class="container mx-auto">
    <div class="move-out-wrapper">
        
        <h2 style="text-align: center; font-weight: 800; font-size: 2rem; margin-bottom: 40px; color: #0f172a;">30-DAY MOVE-OUT NOTICE</h2>

        <?php if ($form_status === 'success') : ?>
            <div class="msg-success"><?php echo esc_html($form_message); ?></div>
        <?php else : ?>

            <?php if ($form_status === 'error') : ?>
                <div class="msg-error"><?php echo esc_html($form_message); ?></div>
            <?php endif; ?>

            <form method="POST" action="<?php echo esc_url(get_permalink()); ?>">
                
                <p><strong>BE ADVISED:</strong> At least 30 days prior written notice is required before moving out of a rental at the end of your lease or in the event of permissive or contractual holdover. Partial month rentals are not permitted according to the terms of your lease or by law. This move-out notice does not abrogate any terms of the original lease.</p>

                <div class="info-box">
                    <strong style="font-size: 1.1rem;">PRESENT RENTAL INFORMATION:</strong><br><br>
                    
                    <label>Full Name:</label>
                    <input type="text" name="tenant_name" class="form-input w-full" required placeholder="John Doe">
                    
                    <label>Email Address:</label>
                    <input type="email" name="tenant_email" class="form-input w-full" required placeholder="tenant@example.com">
                    
                    <label>Current Address:</label>
                    <input type="text" name="tenant_address" class="form-input w-full" required placeholder="123 Main St, Unit 4, City, Zip">
                    
                    <label>Reason For Moving:</label>
                    <input type="text" name="move_reason" class="form-input w-full" required placeholder="e.g. Bought a house, Job relocation">
                </div>

                <p style="line-height: 2.2;">I will have vacated my rental by noon on <input type="date" name="vacate_date" class="form-input w-inline w-date" min="<?php echo $min_date; ?>" required>. You are hereby authorized to re-rent the rental as of this date and time. I confirm that all keys will be returned by the date and time listed above. If I am not out and keys are not returned by the above date and time, I understand I will be totally and personally responsible for damage claimed by any new tenant and for continued rental charges and damages.</p>

                <p style="line-height: 2.2;">In accordance with the lease agreement, I will allow prospective tenants or purchasers to see the rental during my last two weeks by calling <input type="tel" name="phone_number" class="form-input w-inline" required placeholder="(555) 555-5555"> for an appointment.</p>

                <div class="info-box" style="border-color: #cbd5e1; background: #fafafa;">
                    <strong style="font-size: 1.1rem;">FORWARDING INFORMATION FOR DEPOSIT REFUND:</strong><br><br>
                    <label>Forwarding Address:</label>
                    <input type="text" name="forwarding_address" class="form-input w-full" required placeholder="New Street, City, State, Zip">
                </div>

                <p><strong>BE ADVISED:</strong> Cleaning and security deposits are refunded and/or a report of dissemination of deposit shall be sent within thirty (30) days of total vacancy of a rental. Terms of the original lease must have been satisfied. An inspection of the rental will be made to ensure it is completely cleaned—including vacuumed carpets, washed walls and baseboards, and clean appliances free from odors.</p>

                <p><strong>CARPET CLEANING:</strong> Management will have your carpets cleaned and the cost will be deducted from your deposit. Any damage or cleaning not completed by the tenant will be done by management and the costs will be deducted from deposits.</p>

                <div class="signature-section">
                    <div class="sig-block">
                        <label style="font-weight: bold; display: block; margin-bottom: 5px;">SIGNATURE:</label> 
                        <input type="text" name="signature" class="form-input w-full" required placeholder="Type Full Name to Sign">
                    </div>
                    <div class="sig-block" style="flex: 0.5;">
                        <label style="font-weight: bold; display: block; margin-bottom: 5px;">DATE SIGNED:</label> 
                        <input type="date" name="sign_date" class="form-input w-full" required>
                    </div>
                </div>

                <div style="margin-top: 40px;">
                    <details class="mb-6 text-xs text-gray-600 group">
                        <summary class="cursor-pointer font-medium text-gray-700 hover:text-gray-900 transition-colors list-none flex items-center">
                            <span class="mr-2 transition-transform group-open:rotate-90">▶</span>
                            Opt-Out disclaimer
                        </summary>
                        <div class="mt-3 p-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm leading-relaxed">
                            By providing your phone number, you agree to receive text messages from Advanced Realty for the purpose of communicating community news, urgent notifications, and events. Reply “STOP” to opt-out anytime or reply “HELP” for more information. Message and data rates may apply. Message frequency will vary. For more information, please read our <a href="https://advancedrealty.com/privacy-policy" class="text-teal-600 underline hover:text-teal-800" target="_blank" rel="noopener noreferrer">Privacy Policy</a> and <a href="https://advancedrealty.com/terms-and-conditions" class="text-teal-600 underline hover:text-teal-800" target="_blank" rel="noopener noreferrer">Terms and Conditions</a>.
                        </div>
                    </details>

                    <div class="g-recaptcha" data-sitekey="6LdCR5UsAAAAAFKuaSnBWX3TjFD7viZqL4KYJusZ"></div> 
                    
                    <button type="submit" name="submit_moveout" class="submit-btn">Submit Move-Out Notice</button>
                </div>

            </form>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>