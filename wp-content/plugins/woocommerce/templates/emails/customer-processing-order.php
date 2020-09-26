<?php
/**
 * Customer processing order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-processing-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php /* translators: %s: Customer first name */ ?>
<p><?php printf( esc_html__( 'Dear %s,', 'woocommerce' ), esc_html( $order->get_billing_first_name() ) ); ?></p>


<p>A very warm welcome to Phi Tuition.</p>
<p>I look forward to having <?php /* translators: %s: Site title */ 
do_action( 'woocommerce_email_order_meta1', $order, $sent_to_admin, $plain_text, $email );
?> onboard our classes.</p>
<p>You will shortly receive from our secretary office, in a separate email, the following:</p>
<ul>
<li>
	<p><strong>The Student Registration Form,</strong> which summarises our terms of business, together with your contact details, the dates and times of the classes. It also includes the fees and the payment plan, as well as other useful operational information. As we use those details to communicate with our parents and students, I would appreciate it if you can spare few minutes to review the document, especially our Privacy Policy.</p>
	<p>Once you are happy with the outlined terms, please sign it and return it to us.</p>
</li>
<li>
 <p><strong>The Guidelines for Students and Parents,</strong> which outlines the Code of Practice for our students and their parents. Please review this document as well.</p>
</li>
<li><p>Detailed information on how to <a href="#"> setup the Direct Debit mandate</a> for the payment of fees for the rest of the academic year.</p>
</li>
<li><p>Our secretary will contact you to inform you about the starting date of your class.</p>
</li>
</ul>
<p>If there is a mistake, or in case you have any concerns, please do not hesitate to give us a call on 020 32863480, 07470 742559 or email us at: <a href="mailto:email@phi-tuition.eu">email@phi-tuition.eu</a> at your convenience.</p>
<?php /* translators: %s: Order number */ ?>


<?php

/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ( $additional_content ) {
	echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
}
?>
<p>In the meantime, please do let me know if there is anything more I can do.</p>
<p>Thank you once again and I shall look forward to hearing back from you.</p>
<p>Dr Stathis Stefanidis<br>
Founder & Director</p>

<p><a href="www.phi-tuition.eu">www.phi-tuition.eu</a> | <a href="www.facebook.com/phi.tuition">www.facebook.com/phi.tuition</a> | <a href="mailto:email@phi-tuition.eu">email@phi-tuition.eu</a>

<p>Building 3 (For attention of Phi Tuition)<br>
Chiswick Park<br>
566 Chiswick High Road<br>
Chiswick<br>
London, W4 5YA</p>

<p><strong>DISCLAIMER</strong></p>
<p>This email and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed. If you have received this email in error please notify the system manager. This message contains confidential information and is intended only for the individual named. If you are not the named addressee you should not disseminate, distribute or copy this e-mail. Please notify the sender immediately by e-mail if you have received this e-mail by mistake and delete this e-mail from your system. If you are not the intended recipient you are notified that disclosing, copying, distributing or taking any action in reliance on the contents of this information is strictly prohibited.</p>
<?php
/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
