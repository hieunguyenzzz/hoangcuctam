<?php
/**
* Plugin Name: Latest Posts Widget
*/
add_action( 'widgets_init', 'truestory_follow_widget_fire' );

function truestory_follow_widget_fire() {
  register_widget( 'truestory_follow_widget' );
}

   class truestory_follow_widget extends WP_Widget {
          
          public function __construct(){
              parent::__construct('truestory_follow_widget',$name=esc_html__('ThemeRoyale Follow','truestory'));
          }

          public function widget($args,$instance){
          	extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$facebook     = $instance['facebook'];
		$twitter      = $instance['twitter'];
		$instagram    = $instance['instagram'];
		$pinterest    = $instance['pinterest'];
		$bloglovin    = $instance['bloglovin'];
		$googleplus   = $instance['googleplus'];
		$tumblr       = $instance['tumblr'];
		$youtube      = $instance['youtube'];
		
		$dribbble     = $instance['dribbble'];
		
		$linkedin     = $instance['linkedin'];

		
		$vimeo        = $instance['vimeo'];
		
		
		
		
		
		
		$rss = $instance['rss'];
		
		/* Before widget (defined by themes). */
		echo balanceTags($before_widget);

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo balanceTags($before_title . $title . $after_title);

		?>
		
			<div class="follow_widget">
				<?php if($facebook) : ?><a href="<?php echo balanceTags(esc_url(get_theme_mod('truestory_facebook'))); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
				<?php if($twitter) : ?><a href="<?php echo balanceTags(esc_url(get_theme_mod('truestory_twitter'))); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
				<?php if($instagram) : ?><a href="<?php echo balanceTags(esc_url(get_theme_mod('truestory_instagram'))); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
				<?php if($pinterest) : ?><a href="<?php echo balanceTags(esc_url(get_theme_mod('truestory_pinterest'))); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
				<?php if($bloglovin) : ?><a href="<?php echo balanceTags(esc_url(get_theme_mod('truestory_bloglovin'))); ?>" target="_blank"><i class="fa fa-heart"></i></a><?php endif; ?>
				<?php if($googleplus) : ?><a href="<?php echo balanceTags(esc_url(get_theme_mod('truestory_google'))); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
				<?php if($tumblr) : ?><a href="<?php echo balanceTags(esc_url(get_theme_mod('truestory_tumblr'))); ?>" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
				<?php if($youtube) : ?><a href="<?php echo balanceTags(esc_url(get_theme_mod('truestory_youtube'))); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
				
				<?php if($dribbble) : ?><a href="<?php echo balanceTags(esc_url(get_theme_mod('truestory_dribbble'))); ?>" target="_blank"><i class="fa fa-dribbble"></i></a><?php endif; ?>
				
				<?php if($linkedin) : ?><a href="<?php echo balanceTags(esc_url(get_theme_mod('truestory_linkedin'))); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php endif; ?>
				
				
				<?php if($vimeo) : ?><a href="<?php echo balanceTags(esc_url(get_theme_mod('truestory_vimeo'))); ?>" target="_blank"><i class="fa fa-vimeo-square"></i></a><?php endif; ?>
				
				
							
				<?php if($rss) : ?><a href="<?php echo balanceTags(esc_url(get_theme_mod('truestory_rss'))); ?>" target="_blank"><i class="fa fa-rss"></i></a><?php endif; ?>
			</div>
			
			
		<?php

		/* After widget (defined by themes). */
		echo balanceTags($after_widget);

          }
           	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['facebook'] = strip_tags( $new_instance['facebook'] );
		$instance['twitter'] = strip_tags( $new_instance['twitter'] );
		$instance['googleplus'] = strip_tags( $new_instance['googleplus'] );
		$instance['instagram'] = strip_tags( $new_instance['instagram'] );
		$instance['bloglovin'] = strip_tags( $new_instance['bloglovin'] );
		$instance['youtube'] = strip_tags( $new_instance['youtube'] );
		$instance['tumblr'] = strip_tags( $new_instance['tumblr'] );
		$instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
		$instance['dribbble'] = strip_tags( $new_instance['dribbble'] );
		$instance['soundcloud'] = strip_tags( $new_instance['soundcloud'] );
		$instance['vimeo'] = strip_tags( $new_instance['vimeo'] );
		$instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
		$instance['rss'] = strip_tags( $new_instance['rss'] );

		return $instance;
	}
          function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Follow Me', 'facebook' => 'on', 'twitter' => 'on', 'instagram' => 'on', );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_html($instance['title']); ?>" style="width:90%;" />
		</p>
		
		<p>Note: Set your social links in the Customizer</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>">Show Facebook:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>"
			 <?php checked( (bool) $instance['facebook'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>">Show Twitter:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" <?php checked( (bool) $instance['twitter'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'instagram' ); ?>">Show Instagram:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" <?php checked( (bool) $instance['instagram'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>">Show Pinterest:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" <?php checked( (bool) $instance['pinterest'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'bloglovin' ); ?>">Show Bloglovin:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'bloglovin' ); ?>" name="<?php echo $this->get_field_name( 'bloglovin' ); ?>" <?php checked( (bool) $instance['bloglovin'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'googleplus' ); ?>">Show Google Plus:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" <?php checked( (bool) $instance['googleplus'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'tumblr' ); ?>">Show Tumblr:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" <?php checked( (bool) $instance['tumblr'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'youtube' ); ?>">Show Youtube:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" <?php checked( (bool) $instance['youtube'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'dribbble' ); ?>">Show Dribbble:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" <?php checked( (bool) $instance['dribbble'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'soundcloud' ); ?>">Show Soundcloud:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'soundcloud' ); ?>" name="<?php echo $this->get_field_name( 'soundcloud' ); ?>" <?php checked( (bool) $instance['soundcloud'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'vimeo' ); ?>">Show Vimeo:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" <?php checked( (bool) $instance['vimeo'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>">Show Linkedin:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" <?php checked( (bool) $instance['linkedin'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>">Show RSS:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" <?php checked( (bool) $instance['rss'], true ); ?> />
		</p>


	<?php
	}
         










         }