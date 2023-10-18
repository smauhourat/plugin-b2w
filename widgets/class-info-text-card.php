<?php
/**
 * Information Text Card
 */


class B2w_Info_Text_Card_Widget extends \Elementor\Widget_Base {

  public function get_name() {
		return 'b2w_text_card';
	}

	public function get_title() {
		return __( 'Info Card', 'plugin-b2w' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_keywords() {
		return [ 'b2w', 'info', 'card', 'happy' ];
	}

	public function get_categories() {
		return [ 'b2w_category' ];
	}


  protected function _register_controls() {

    $this->start_controls_section(
      'b2w_text_info',
      [
        'label' => __( 'Info Text Card', 'plugin-b2w' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'info_title_text',
      [
        'label' => __('Title', 'plugin-b2w'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Title', 'plugin-b2w' ),
				'default' => __( 'Enter Your Title Here', 'plugin-b2w' ),
      ]
    );

    $this->add_control(
      'info_desc',
      [
        'label' => __('Description', 'plugin-b2w'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Enter your description here', 'plugin-b2w' ),
				'default' => __( 'Yes, I know “handcrafted” is a word only hipsters use, but you really will hand code your HTML & CSS.', 'plugin-b2w' ),
      ]
    );

    $this->add_control(
			'card_image',
      [
        'label' => __( 'Choose Image', 'plugin-b2w' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
      [
        'name' => 'background',
        'label' => __( 'Background', 'plugin-b2w' ),
        'types' => [ 'classic', 'gradient' ],
        'selector' => '{{WRAPPER}} .text-card',
      ]
    );

    $this->end_controls_section();

  }

  protected function render() {
    $settings = $this->get_settings_for_display();

    echo '<div class="text-card style-1">';
      echo '<div class="overlay"></div>';
      echo '<h4>'.$settings['info_title_text'].'</h4>';
      echo '<p>'. $settings['info_desc'] .'</p>';
      echo '<div class="overlay-image"><img src="'. esc_url( $settings['card_image']['url'] ) .'"></div>';
    echo '</div>';
  }

}

// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \B2w_Info_Text_Card_Widget() );
