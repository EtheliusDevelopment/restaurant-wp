<?php

class NigiriElatedClassLike {
	private static $instance;
	
	private function __construct() {
		add_action( 'wp_ajax_nigiri_elated_like', array( $this, 'ajax' ) );
		add_action( 'wp_ajax_nopriv_nigiri_elated_like', array( $this, 'ajax' ) );
	}
	
	public static function get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		
		return self::$instance;
	}
	
	function ajax() {

		$likes_id = isset( $_POST['likes_id'] ) && ! empty( $_POST['likes_id'] ) ? sanitize_text_field( $_POST['likes_id'] ) : '';
		//update
		if ( !empty( $likes_id ) ) {
			$post_id = str_replace( 'eltdf-like-', '', $likes_id );
			$post_id = substr( $post_id, 0, - 4 );
			$type    = isset( $_POST['type'] ) ? sanitize_text_field($_POST['type']) : '';
			
			echo wp_kses( $this->like_post( $post_id, 'update', $type ), array(
				'span' => array(
					'class'       => true,
					'aria-hidden' => true,
					'style'       => true,
					'id'          => true
				),
				'i'    => array(
					'class' => true,
					'style' => true,
					'id'    => true
				)
			) );
		} else {
			$post_id = str_replace( 'eltdf-like-', '', $likes_id );
			$post_id = substr( $post_id, 0, - 4 );
			echo wp_kses( $this->like_post( $post_id, 'get' ), array(
				'span' => array(
					'class'       => true,
					'aria-hidden' => true,
					'style'       => true,
					'id'          => true
				),
				'i'    => array(
					'class' => true,
					'style' => true,
					'id'    => true
				)
			) );
		}
		
		exit;
	}
	
	public function like_post( $post_id, $action = 'get', $type = '' ) {
		if ( ! is_numeric( $post_id ) ) {
			return;
		}

		
		switch ( $action ) {
			
			case 'get':
				$like_count = get_post_meta( $post_id, '_eltdf-like', true );

				$like_count_label = '';
				
				if ( $like_count > 1) {
					$like_count_label = esc_html__('Likes','nigiri');
				} else {
					$like_count_label = esc_html__('Like','nigiri');
				}
				
				if ( isset( $_COOKIE[ 'eltdf-like_' . $post_id ] ) ) {
					$icon = '<i class="icon_heart" aria-hidden="true"></i>';
				} else {
					$icon = '<i class="icon_heart_alt" aria-hidden="true"></i>';
				}
				
				if ( ! $like_count ) {
					$like_count = 0;
					add_post_meta( $post_id, '_eltdf-like', $like_count, true );
					$icon = '<i class="icon_heart_alt" aria-hidden="true"></i>';
				}
				
				$return_value = $icon . "<span>" . esc_attr( $like_count ) . "</span>". "<span>" . esc_attr( $like_count_label ) . "</span>";
				
				return $return_value;
				break;
			
			case 'update':
				$like_count = get_post_meta( $post_id, '_eltdf-like', true );

				$like_count_label = '';
				
				if ( $like_count > 1) {
					$like_count_label = esc_html__('Likes','nigiri');
				} else {
					$like_count_label = esc_html__('Like','nigiri');
				}
				
				if ( isset( $_COOKIE[ 'eltdf-like_' . $post_id ] ) ) {
					return $like_count;
				}
				
				$like_count ++;
				
				update_post_meta( $post_id, '_eltdf-like', $like_count );
				setcookie( 'eltdf-like_' . $post_id, $post_id, time() * 20, '/' );

				
				$return_value = "<i class='icon_heart' aria-hidden='true'></i><span>" . esc_html( $like_count ) . "</span><span>" . esc_html( $like_count_label ) . "</span>";
				
				return $return_value;
				
				break;
			default:
				return '';
				break;
		}
	}
	
	public function add_like() {
		global $post;
		
		$output = $this->like_post( $post->ID );
		
		$class       = 'eltdf-like';
		$rand_number = rand( 100, 999 );
		$title       = esc_html__( 'Like this', 'nigiri' );
		
		if ( isset( $_COOKIE[ 'eltdf-like_' . $post->ID ] ) ) {
			$class = 'eltdf-like liked';
			$title = esc_html__( 'You already like this!', 'nigiri' );
		}
		
		return '<a href="#" class="' . esc_attr( $class ) . '" id="eltdf-like-' . esc_attr( $post->ID ) . '-' . $rand_number . '" title="' . esc_attr( $title ) . '">' . $output . '</a>';
	}
}

if ( ! function_exists( 'nigiri_elated_create_like' ) ) {
	function nigiri_elated_create_like() {
		NigiriElatedClassLike::get_instance();
	}
	
	add_action( 'after_setup_theme', 'nigiri_elated_create_like' );
}