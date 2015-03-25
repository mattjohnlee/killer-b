<?php

class Bluu_Dribbble_Shots_Widget extends WP_Widget {

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/

	/**
	 * Sets up the widgets name etc
	 */
	function Bluu_Dribbble_Shots_Widget() {
		
		$widget_ops = array(
			'classname' 	=> 'bluu_dribbble_shots',
			'description' 	=> __( 'Display your recent portfolio posts', 'bluu' ),
		);

		$control_ops = array(
			'id_base' => 'bluu_dribbble_shots-widget'
		);

		$this->WP_Widget( 'bluu_dribbble_shots-widget', __( 'Bluu: Dribbble Shots', 'bluu' ), $widget_ops, $control_ops );

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
		$cache = wp_cache_get( 'bluu_dribbble_shots-widget', 'widget' );

		if ( !is_array( $cache ) )
			$cache = array();

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		include_once(ABSPATH . WPINC . '/feed.php');

		$playerName 	= $instance['bluu_dribbble_player'];
		$shots 			= $instance['bluu_shot_count'];

		if( function_exists('fetch_feed') ) :
			$rss = fetch_feed( "http://dribbble.com/players/$playerName/shots.rss" );
			add_filter( 'wp_feed_cache_transient_lifetime', create_function( '$a', 'return 1800;' ) );
			if( !is_wp_error( $rss ) ) : 
				$items = $rss->get_items( 0, $rss->get_item_quantity( $shots ) ); 
			endif;
		endif;

		ob_start();
		extract( $args );
		
		$title 					= apply_filters( 'widget_title', $instance['title'] );
		$bluu_dribbble_player 	= $instance['bluu_dribbble_player'];
		$bluu_shot_count 		= $instance['bluu_shot_count'];

		echo $args['before_widget'];

		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		// start main widget content..
		?>

		<ul class="dribbble-shots clearfix">
			<?php foreach ( $items as $item ):
				$title = $item->get_title();
				$link = $item->get_permalink();
				$date = $item->get_date('F d, Y');
				$description = $item->get_description();
			
				preg_match("/src=\"(http.*(jpg|jpeg|gif|png))/", $description, $image_url);
				$image = $image_url[1];
				
			?>
			<li class="dribbble-img"> 
				<a href="<?php echo $link; ?>" class="dribbble-link"><img src="<?php echo $image; ?>" alt="<?php echo $title;?>"/></a> 
		 	</li>
		 	<?php endforeach;?>
	 	</ul><!-- end .dribbble-shots -->

		<?php
		// end main widget content

		echo $args['after_widget'];

		$cache[ $args['widget_id'] ] = ob_get_flush();
		wp_cache_add( 'bluu_dribbble_shots-widget', $cache, 'widget' );

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
			'title'             	=> 'Dribbble Shots',
			'bluu_dribbble_player' 	=> '',
			'bluu_shot_count' 		=> 6
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
			<label for="<?php echo $this->get_field_id( 'bluu_dribbble_player' ); ?>"><?php _e( 'Dribbble Username:', 'bluu' ) ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'bluu_dribbble_player' ); ?>" name="<?php echo $this->get_field_name( 'bluu_dribbble_player' ); ?>" value="<?php echo $instance['bluu_dribbble_player']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'bluu_shot_count' ); ?>"><?php _e( 'Shot Count:', 'bluu' ) ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'bluu_shot_count' ); ?>" name="<?php echo $this->get_field_name( 'bluu_shot_count' ); ?>" value="<?php echo $instance['bluu_shot_count']; ?>" />
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
		wp_cache_delete( 'bluu_recent_projects-widget', 'widget' );
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

		$instance['bluu_dribbble_player'] 	= $new_instance['bluu_dribbble_player'];
		$instance['bluu_shot_count'] 		= $new_instance['bluu_shot_count'];

		return $instance;

	} // end update function

} // end class


/*--------------------------------------------------*/
/* Register the widget
/*--------------------------------------------------*/

add_action( 'widgets_init', 'register_bluu_dribbble_shots_widget' );

function register_bluu_dribbble_shots_widget() {
	register_widget( 'Bluu_Dribbble_Shots_Widget' );
}