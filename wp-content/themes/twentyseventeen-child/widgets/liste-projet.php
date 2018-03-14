<?php

class Liste_Projet extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'liste_projet',
			'description' => 'Un widget listant les projets',
		);
		parent::__construct( 'liste_projet', 'Liste Projet', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
        if(empty($instance['limit']) ){
            $limit = -1;
        }else {
            $limit = $instance['limit'];
        }
        
        echo $args['before_widget'];
        

        $query = new WP_Query( array( 'post_type' => 'projet',
        'posts_per_page' => $limit ) );
            while($query->have_posts()) : $query->the_post();
                
                echo '<article>';
                echo '<a href="';
                the_permalink();
                echo'" class="title">';
                the_title();
                echo'</a>';
                echo '<p class="screenshot">' . get_field('race') . '</p>';

                echo '</article>';

            endwhile;
            wp_reset_postdata();
        

		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
        echo '<label for="'.$this->get_field_id('limit').'">Nombre de Projet</label>';
        echo '<input class="widefat" type="number" name="'.$this->get_field_name('limit').'" id="'.$this->get_field_id('limit').'" value="'.$instance['limit'].'" >';

	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? strip_tags( $new_instance['limit'] ) : 3;

		return $instance;
	}
}