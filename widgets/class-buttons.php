<?php
/**
 * B2W Button Widget
 */

class B2w_Buttons_Widget extends \Elementor\Widget_Base {

	public function get_name() {
    return 'b2w_buttons';
  }

	public function get_title() {
    return __( 'Button', 'plugin-b2w' );
  }

	public function get_icon() {
    return 'eicon-button';
  }

  public function get_keywords() {
    return [ 'b2w', 'button', 'link', 'ui', 'cta', 'happy' ];
  }

	public function get_categories() {
    return ['b2w_category'];
  }

	protected function _register_controls() {

    $this->start_controls_section(
      'b2w_buttons',
      [
        'label' => __('Button','plugin-b2w'),
        'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    // add our controls

    $this->add_control(
      'button_text',
      [
        'label' => __('Button Text', 'plugin-b2w'),
        'label_block' => true,
        'placeholder' => __('Type something special here, my friend!', 'plugin-b2w' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Learn More','plugin-b2w'),
      ]
    );

    $this->add_control(
      'button_link',
      [
        'label' => __('Button Link', 'plugin-b2w'),
        'type' => \Elementor\Controls_Manager::URL,
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => false
        ],
      ]
    );

    $this->add_control(
      'button_style',
      [
        'label' => __( 'Button Style', 'plugin-b2w' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'btn-primary',
        'options' => [
          'btn-primary'   => __( 'Primary', 'plugin-b2w' ),
          'btn-secondary' => __( 'Secondary', 'plugin-b2w' ),
					'btn-invert'    => __( 'Invert', 'plugin-b2w' ),
        ],
      ],
    );

    $this->add_responsive_control(
      'button_align',
      [
        'label' => __( 'Alignment', 'plugin-b2w' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [

          'left' => [
            'title' => __( 'Left', 'plugin-b2w' ),
						'icon' => 'eicon-text-align-left',
          ],

          'center' => [
            'title' => __( 'Center', 'plugin-b2w' ),
						'icon' => 'eicon-text-align-center',
          ],

          'right' => [
            'title' => __( 'Right', 'plugin-b2w' ),
						'icon' => 'eicon-text-align-right',
          ],

        ],

				'devices' => [ 'desktop', 'tablet', 'mobile' ],
        'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .link-box' => 'text-align: {{VALUE}};',
				],
        'toggle' => true,

      ],
    );


    $this->end_controls_section();

  }

	protected function render() {

    $settings = $this->get_settings_for_display();
    $target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
    $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';

    echo '<div class="link-box">';
    echo '<a href="' . $settings['button_link']['url'] . '" ' . $target . $nofollow . ' class="btn ' . $settings['button_style'] . '">' . $settings['button_text'] . '</a>';
    echo '</div>';


  }

}


// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \B2w_Buttons_Widget() );
