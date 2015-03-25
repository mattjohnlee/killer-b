<?php

class Bluu_Contact_Info_Widget extends WP_Widget {

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/

	/**
	 * Sets up the widgets name etc
	 */
	function Bluu_Contact_Info_Widget() {
		
		$widget_ops = array(
			'classname' 	=> 'bluu_contact_info',
			'description' 	=> __( 'Display contact info', 'bluu' ),
		);

		$control_ops = array(
			'id_base' => 'bluu_contact_info-widget'
		);

		$this->WP_Widget( 'bluu_contact_info-widget', __( 'Bluu: Contact Info', 'bluu' ), $widget_ops, $control_ops );

		// Refreshing the widget's cached output with each new post
		add_action( 'save_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );

	} // end widget set-up


	/*--------------------------------------------------*/
	/* Widget API Functions
	/*--------------------------------------------------*/

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {

		// Check if there is a cached output
		$cache = wp_cache_get( 'bluu_contact_info-widget', 'widget' );

		if ( !is_array( $cache ) )
			$cache = array();

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract( $args );
		
		$title 			= apply_filters( 'widget_title', $instance['title'] );
		$bluu_address 	= $instance['bluu_address'];
		$bluu_phone 	= $instance['bluu_phone'];
		$bluu_mobile 	= $instance['bluu_mobile'];
		$bluu_fax 		= $instance['bluu_fax'];
		$bluu_email 	= $instance['bluu_email'];
		$bluu_web 		= $instance['bluu_web'];
		$bluu_webtext 	= $instance['bluu_webtext'];

		echo $args['before_widget'];

		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		// start main widget content..
		?>

		<div class="contact-info">

			<?php if( $bluu_address ) { ?>
				<p class="address"><?php echo $instance['bluu_address']; ?></p>
			<?php } ?>

			<?php if( $bluu_phone ) { ?>
				<p class="phone"><span class="contact-method"><?php _e( 'Tel:', 'bluu' ); ?></span> <?php echo $instance['bluu_phone']; ?></p>
			<?php } ?>

			<?php if( $bluu_mobile ) { ?>
				<p class="mobile"><span class="contact-method"><?php _e( 'Mobile:', 'bluu' ); ?></span> <?php echo $instance['bluu_mobile']; ?></p>
			<?php } ?>

			<?php if( $bluu_fax ) { ?>
				<p class="fax"><span class="contact-method"><?php _e( 'Fax:', 'bluu' ); ?></span> <?php echo $instance['bluu_fax']; ?></p>
			<?php } ?>

			<?php if( $bluu_email ) { ?>
				<p class="email"><span class="contact-method"><?php _e( 'Email:', 'bluu' ); ?></span> <?php echo $instance['bluu_email']; ?></p>
			<?php } ?>

			<?php if( $bluu_web ) { ?>
				<p class="web"><span class="contact-method"><?php _e( 'Web:', 'bluu' ); ?></span> <a href="<?php echo $instance['bluu_web']; ?>"><?php echo $instance['bluu_webtext']; ?></a></p>
			<?php } ?>

		</div><!-- end .contact-info -->

		<?php
		// end main widget content

		echo $args['after_widget'];

		$cache[ $args['widget_id'] ] = ob_get_flush();
		wp_cache_add( 'bluu_contact_info-widget', $cache, 'widget' );

	} // end widget function


	/*--------------------------------------------------*/
	/* Form Inputs
	/*--------------------------------------------------*/

	/**
	 * Ouputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	function form( $instance ) {

		$defaults = array(
			'title'             => 'Contact Us',
			'bluu_address' 		=> '',
			'bluu_phone' 		=> '',
			'bluu_mobile' 		=> '',
			'bluu_fax' 			=> '',
			'bluu_email' 		=> '',
			'bluu_web' 			=> '',
			'bluu_webtext' 		=> '',
		);

		$instance = wp_parse_args(
			( array ) $instance, $defaults
		);

		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'bluu' ) ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'bluu_address' ); ?>"><?php _e( 'Address:', 'bluu' ) ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'bluu_address' ); ?>" name="<?php echo $this->get_field_name( 'bluu_address' ); ?>" value="<?php echo $instance['bluu_address']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'bluu_phone' ); ?>"><?php _e( 'Phone:', 'bluu' ) ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'bluu_phone' ); ?>" name="<?php echo $this->get_field_name( 'bluu_phone' ); ?>" value="<?php echo $instance['bluu_phone']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'bluu_mobile' ); ?>"><?php _e( 'Mobile:', 'bluu' ) ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'bluu_mobile' ); ?>" name="<?php echo $this->get_field_name( 'bluu_mobile' ); ?>" value="<?php echo $instance['bluu_mobile']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'bluu_fax' ); ?>"><?php _e( 'Fax:', 'bluu' ) ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'bluu_fax' ); ?>" name="<?php echo $this->get_field_name( 'bluu_fax' ); ?>" value="<?php echo $instance['bluu_fax']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'bluu_email' ); ?>"><?php _e( 'Email:', 'bluu' ) ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'bluu_email' ); ?>" name="<?php echo $this->get_field_name( 'bluu_email' ); ?>" value="<?php echo $instance['bluu_email']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'bluu_web' ); ?>"><?php _e( 'Web (with HTTP):', 'bluu' ) ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'bluu_web' ); ?>" name="<?php echo $this->get_field_name( 'bluu_web' ); ?>" value="<?php echo $instance['bluu_web']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'bluu_webtext' ); ?>"><?php _e( 'Web (plain text):', 'bluu' ) ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'bluu_webtext' ); ?>" name="<?php echo $this->get_field_name( 'bluu_webtext' ); ?>" value="<?php echo $instance['bluu_webtext']; ?>" />
		</p>

		<?php

	} // end form function


	/*--------------------------------------------------*/
	/* Flush cache
	/*--------------------------------------------------*/

	/**
	 * Function triggered from action hooks in widget constructor
	 */
	function flush_widget_cache() {
		wp_cache_delete( 'bluu_contact_info-widget', 'widget' );
	}


	/*--------------------------------------------------*/
	/* Update values
	/*--------------------------------------------------*/

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['bluu_address'] 	= $new_instance['bluu_address'];
		$instance['bluu_phone'] 	= $new_instance['bluu_phone'];
		$instance['bluu_mobile'] 	= $new_instance['bluu_mobile'];
		$instance['bluu_fax'] 		= $new_instance['bluu_fax'];
		$instance['bluu_email'] 	= $new_instance['bluu_email'];
		$instance['bluu_web'] 		= $new_instance['bluu_web'];
		$instance['bluu_webtext'] 	= $new_instance['bluu_webtext'];

		return $instance;

	} // end update function

} // end class


/*--------------------------------------------------*/
/* Register the widget
/*--------------------------------------------------*/

add_action( 'widgets_init', 'register_bluu_contact_info_widget' );

function register_bluu_contact_info_widget() {
	register_widget( 'Bluu_Contact_Info_Widget' );
}