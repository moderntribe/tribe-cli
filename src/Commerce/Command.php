<?php
namespace Tribe\CLI\Commerce;

/**
 * Class Tribe__Cli__Commerce__Command
 *
 * @since 0.1.0
 */
class Command extends \WP_CLI_Command {

	/**
	 * @var Generator\PayPal\CLI
	 */
	protected $paypal;

	/**
	 * Command constructor.
	 *
	 * @since 0.1.0
	 *
	 * @param Generator\PayPal\CLI $paypal
	 */
	public function __construct( Generator\PayPal\CLI $paypal ) {
		parent::__construct();
		$this->paypal = $paypal;
	}

	/**
	 * Generates PayPal orders for one or more tickets.
	 *
	 * ## OPTIONS
	 *
	 * <ticket_id>
	 * : PayPal orders will be attached to this ticket(s); either a ticket post ID or a CSV list of ticket post IDs
	 *
	 * [--count=<count>]
	 * : the number of PayPal orders to generate
	 * ---
	 * default: 10
	 * ---
	 *
	 * [--attendees_min=<attendees_min>]
	 * : the minimum number of attendees per PayPal order
	 * ---
	 * default: 1
	 * ---
	 *
	 * [--attendees_max=<attendees_max>]
	 * : the maximum number of attendees per PayPal order
	 * ---
	 * default: 3
	 * ---
	 *
	 * [--order_status=<order_status>]
	 * : the status of the PayPal orders
	 * ---
	 * default: completed
	 * options:
	 *      - completed
	 *      - pending-payment
	 *      - denied
	 *      - refunded
	 * ---
	 *
	 * [--dont-send-emails]
	 * : if set emails will not be sent during the order generation process.
	 *
	 * ## EXAMPLES
	 *
	 *      wp tribe commerce generate-paypal-orders 23
	 *      wp tribe commerce generate-paypal-orders 23,89
	 *      wp tribe commerce generate-paypal-orders 23,89,31
	 *      wp tribe commerce generate-paypal-orders 23 --count=89
	 *      wp tribe commerce generate-paypal-orders 23,31 --count=89
	 *      wp tribe commerce generate-paypal-orders 23 --attendees_min=3
	 *      wp tribe commerce generate-paypal-orders 23 --attendees_min=3 --attendees_max=10
	 *      wp tribe commerce generate-paypal-orders 23 --attendees_min=3 --attendees_max=10 --order_status=denied
	 *      wp tribe commerce generate-paypal-orders 23,31 --count=89 --dont-send-emails
	 *
	 * @subcommand generate-paypal-orders
	 *
	 * @since 0.2.0
	 *
	 */
	public function generate_paypal_orders( array $args = null, array $assoc_args = null ) {
		$this->paypal->generate_orders( $args, $assoc_args );
	}

	/**
	 * Removes generated PayPal orders for a specific ticket or ticketed post.
	 *
	 * ## OPTIONS
	 *
	 * <post_id>
	 * : PayPal orders will be removed from this post or for this ticket ID
	 *
	 * [--reset-deleted-attendees]
	 * : reset the number of deleted attendees
	 *
	 * [--reset-total-sales]
	 * : reset the total sales to 0; for tickets only
	 *
	 *
	 * ## EXAMPLES
	 *
	 *      wp tribe commerce reset-paypal-orders 23
	 *      wp tribe commerce reset-paypal-orders 23 --reset-deleted-attendees
	 *      wp tribe commerce reset-paypal-orders 23 --reset-total-sales
	 *      wp tribe commerce reset-paypal-orders 23 --reset-total-sales=3
	 *      wp tribe commerce reset-paypal-orders 23 --reset-total-sales=3 --reset-deleted-attendees
	 *
	 * @subcommand reset-paypal-orders
	 *
	 * @since 0.2.0
	 *
	 */
	public function reset_paypal_orders(  array $args = null, array $assoc_args = null  ) {
		$this->paypal->reset_orders( $args, $assoc_args );
	}

	/**
	 * Updates the status of a generated PayPal order.
	 *
	 * ## OPTIONS
	 *
	 * <order_id>
	 * : the PayPal ID (hash) or post ID of an existing PayPal order.
	 *
	 * --order_status=<order_status>
	 * : the status of the PayPal orders
	 * ---
	 * options:
	 *      - completed
	 *      - pending
	 *      - denied
	 *      - refunded
	 * ---
	 *
	 * [--dont-send-emails]
	 * : if set emails will not be sent during the order update process.
	 *
	 * ## EXAMPLES
	 *
	 *      wp tribe commerce update-paypal-order-status 23 --order_status=completed
	 *      wp tribe commerce update-paypal-order-status 23 --order_status=pending
	 *      wp tribe commerce update-paypal-order-status 23 --order_status=denied
	 *      wp tribe commerce update-paypal-order-status 23 --order_status=refunded
	 *      wp tribe commerce update-paypal-order-status 23 --order_status=completed --dont-send-emails
	 *
	 * @subcommand update-paypal-order-status
	 *
	 * @since 0.2.1
	 *
	 */
	public function update_paypal_order_status( array $args = null, array $assoc_args = null ) {
		$this->paypal->update_order_status( $args, $assoc_args );
	}
}
