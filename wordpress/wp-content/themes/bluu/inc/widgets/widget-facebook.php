<?php

class Bluu_Facebook_Like_Widget extends WP_Widget {

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/

	/**
	 * Sets up the widgets name etc
	 */
	function Bluu_Facebook_Like_Widget() {
		
		$widget_ops = array(
			'classname' 	=> 'bluu_facebook_like',
			'description' 	=> __( 'Display your Facebook Like box.', 'bluu' ),
		);

		$control_ops = array(
			'id_base' => 'bluu_facebook_like-widget'
		);

		$this->WP_Widget( 'bluu_facebook_like-widget', __( 'Bluu: Facebook Like', 'bluu' ), $widget_ops, $control_ops );

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
		$cache = wp_cache_get( 'bluu_facebook_like-widget', 'widget' );

		if ( !is_array( $cache ) )
			$cache = array();

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract( $args );
		
		$title 				= apply_filters( 'widget_title', $instance['title'] );
		$bluu_fburl 		= $instance['bluu_fburl'];
		$bluu_fbwidth 	= $instance['bluu_fbwidth'];
		$bluu_fbcolor 	= $instance['bluu_fbcolor'];
		$bluu_fbfaces 	= isset( $instance['bluu_fbfaces'] ) ? 'true' : 'false';
		$bluu_fbstream 	= isset( $instance['bluu_fbstream'] ) ? 'true' : 'false';
		$bluu_fbheader 	= isset( $instance['bluu_fbheader'] ) ? 'true' : 'false';
		$bluu_fbheight 	= '65';

		if( $bluu_fbfaces == 'true' ) {
			$bluu_fbheight = '240';
		}

		if( $bluu_fbstream == 'true' ) {
			$bluu_fbheight = '515';
		}

		if( $bluu_fbstream == 'true' && $bluu_fbfaces == 'true' && $bluu_fbheader == 'true' ) {
			$bluu_fbheight = '540';
		}

		if( $bluu_fbstream == 'true' && $bluu_fbfaces == 'true' && $bluu_fbheader == 'false' ) {
			$bluu_fbheight = '540';
		}

		if( $bluu_fbheader == 'true' ) {
			$bluu_fbheight = $bluu_fbheight + 30;
		}

		echo $args['before_widget'];

		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		// start main widget content..

		if( $bluu_fburl ): ?>
			<iframe src="http<?php echo (is_ssl())? 's' : ''; ?>://www.facebook.com/plugins/likebox.php?href=<?php echo urlencode($bluu_fburl); ?>&amp;width=<?php echo $bluu_fbwidth; ?>&amp;colorscheme=<?php echo $bluu_fbcolor; ?>&amp;show_faces=<?php echo $bluu_fbfaces; ?>&amp;stream=<?php echo $bluu_fbstream; ?>&amp;header=<?php echo $bluu_fbheader; ?>&amp;height=<?php echo $bluu_fbheight; ?>&amp;force_wall=true<?php if($show_faces == 'true'): ?>&amp;connections=8<?php endif; ?>" style="border:none; overflow:hidden; width:<?php echo $bluu_fbwidth; ?>px; height: <?php echo $bluu_fbheight; ?>px;"></iframe>
		<?php endif;

		// end main widget content

		echo $args['after_widget'];

		$cache[ $args['widget_id'] ] = ob_get_flush();
		wp_cache_add( 'bluu_facebook_like-widget', $cache, 'widget' );

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
			'title'             => 'Like us on Facebook',
			'bluu_fburl' 		=> '',
			'bluu_fbwidth' 		=> '300',
			'bluu_fbcolor' 		=> 'light',
			'bluu_fbfaces' 		=> 'on',
			'bluu_fbstream' 	=> false,
			'bluu_fbheader' 	=> false,
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
			<label for="<?php echo $this->get_field_id( 'bluu_fburl' ); ?>"><?php _e( 'Facebook Page URL:', 'bluu' ) ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'bluu_fburl' ); ?>" name="<?php echo $this->get_field_name( 'bluu_fburl' ); ?>" value="<?php echo $instance['bluu_fburl']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'bluu_fbwidth' ); ?>"><?php _e( 'Width:', 'bluu' ) ?></label>
			<input class="widefat" type="text" style="width: 40px;" id="<?php echo $this->get_field_id( 'bluu_fbwidth' ); ?>" name="<?php echo $this->get_field_name( 'bluu_fbwidth' ); ?>" value="<?php echo $instance['bluu_fbwidth']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('bluu_fbcolor'); ?>"><?php _e( 'Color Scheme:', 'bluu' ) ?></label>
			<select id="<?php echo $this->get_field_id('bluu_fbcolor'); ?>" name="<?php echo $this->get_field_name('bluu_fbcolor'); ?>" class="widefat" style="width:100%;">
				<option <?php if( 'light' == $instance['bluu_fbcolor'] ) echo 'selected="selected"'; ?>>light</option>
				<option <?php if( 'dark' == $instance['bluu_fbcolor'] ) echo 'selected="selected"'; ?>>dark</option>
			</select>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['bluu_fbfaces'], 'on' ); ?> id="<?php echo $this->get_field_id('bluu_fbfaces'); ?>" name="<?php echo $this->get_field_name('bluu_fbfaces'); ?>" />
			<label for="<?php echo $this->get_field_id('bluu_fbfaces'); ?>"><?php _e( 'Show Faces', 'bluu' ) ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['bluu_fbstream'], 'on' ); ?> id="<?php echo $this->get_field_id('bluu_fbstream'); ?>" name="<?php echo $this->get_field_name('bluu_fbstream'); ?>" />
			<label for="<?php echo $this->get_field_id('bluu_fbstream'); ?>"><?php _e( 'Show Stream', 'bluu' ) ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['bluu_fbheader'], 'on' ); ?> id="<?php echo $this->get_field_id('bluu_fbheader'); ?>" name="<?php echo $this->get_field_name('bluu_fbheader'); ?>" />
			<label for="<?php echo $this->get_field_id('bluu_fbheader'); ?>"><?php _e( 'Show Facebook Header', 'bluu' ) ?></label>
		</p>

		<?php

	} // end form function


	/*--------------------------------------------------*/
	/* Flush Cache
	/*--------------------------------------------------*/

	/**
	 * Function triggered from action hooks in widget constructor
	 */
	function flush_widget_cache() {
		wp_cache_delete( 'bluu_facebook_like-widget', 'widget' );
	}


	/*--------------------------------------------------*/
	/* Update Values
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

		$instance['bluu_fburl'] 	= $new_instance['bluu_fburl'];
		$instance['bluu_fbwidth'] 	= $new_instance['bluu_fbwidth'];
		$instance['bluu_fbcolor'] 	= $new_instance['bluu_fbcolor'];
		$instance['bluu_fbfaces'] 	= $new_instance['bluu_fbfaces'];
		$instance['bluu_fbstream'] 	= $new_instance['bluu_fbstream'];
		$instance['bluu_fbheader'] 	= $new_instance['bluu_fbheader'];

		return $instance;

	} // end update function

} // end class


/*--------------------------------------------------*/
/* Register the widget
/*--------------------------------------------------*/

add_action( 'widgets_init', 'register_bluu_facebook_like_widget' );

function register_bluu_facebook_like_widget() {
	register_widget( 'Bluu_Facebook_Like_Widget' );
}