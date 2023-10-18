<?php
/**
 * Call to Action Widget
 */

 class B2w_Call_To_Action_Widget extends \Elementor\Widget_Base {


   public function get_name() {
 		return 'b2w_cta';
 	}

 	public function get_title() {
 		return __( 'Call to Action Card', 'plugin-b2w' );
 	}

 	public function get_icon() {
 		return 'eicon-call-to-action';
 	}

 	public function get_keywords() {
 		return [ 'b2w', 'action', 'call to', 'happy', 'cta' ];
 	}

 	public function get_categories() {
 		return [ 'b2w_category' ];
 	}


  protected function _register_controls() {
    global $plugin_images;

    $this->start_controls_section(
      'b2w_cta',
      [
        'label' => __( 'Call to Action', 'plugin-b2w' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
			'sub_title_text',
      [
				'label' => __('Sub Title Text', 'plugin-b2w'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Sub Title Goes HERE', 'plugin-b2w' ),
				'default' => __( 'JOIN 49,000 STUDENTS', 'plugin-b2w' ),
			]
    );

    $this->add_control(
			'sub_title_color',
      [
        'label' => __( 'Sub Title Color', 'plugin-b2w' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
        'selectors' => [
          '{{WRAPPER}} .sub-title' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->add_control(
			'title_text',
      [
        'label' => __('Title Text', 'plugin-b2w'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
        'placeholder' => __('CTA Title', 'plugin-b2w' ),
        'default' => __( 'Bootstrap to WordPress with Brad Hussey', 'plugin-b2w' ),
      ]
    );

    $this->add_control(
			'title_color',
      [
        'label' => __( 'Title Colour', 'plugin-b2w' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#ffffff',
        'selectors' => [
					'{{WRAPPER}} h2' => 'color: {{VALUE}}',
				],
      ]
    );

    $this->add_control(
			'cta_desc',
			[
        'label' => __('Description', 'plugin-b2w'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Description', 'plugin-b2w' ),
        'default' => __( 'Learn how to design and build custom, beautiful & responsive WordPress websites and themes for beginners TODAY!', 'plugin-b2w' ),
      ]
    );

    $this->add_control(
      'desc_color',
      [
        'label' => __( 'Description Colour', 'plugin-b2w' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
        'selectors' => [
					'{{WRAPPER}} .cta-desc' => 'color: {{VALUE}}',
				],
      ]
    );

    $this->add_control(
			'overlay_image',
			[
				'label' => __( 'Choose Image', 'plugin-b2w' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => $plugin_images . '/card-css.png',
				],
			]
		);

    $this->add_control(
			'button_text',
			[
				'label' => __('Button Text', 'plugin-b2w'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Button Text', 'plugin-b2w' ),
				'default' => __( 'Join Now ->', 'plugin-b2w' ),

			]
		);

    $this->add_control(
			'button_link',
			[
				'label' => __( 'Button Link', 'plugin-b2w' ),
				'type' => \Elementor\Controls_Manager::URL,
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => false,
				],
			]
		);

    $this->add_control(
			'btn_style',
			[
				'label' => __( 'Button Style', 'plugin-b2w' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'btn-primary',
				'options' => [
					'btn-primary'  => __( 'Primary', 'plugin-b2w' ),
					'btn-secondary' => __( 'Secondary', 'plugin-b2w' ),
					'btn-invert' => __( 'Invert', 'plugin-b2w' ),
				],
			]
		);

    $this->add_control(
      'btn_align',
      [
        'label' => __( 'Alignment', 'plugin-b2w' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [

          'text-start' => [
            'title' => __( 'Left', 'plugin-b2w' ),
						'icon' => 'eicon-text-align-left',
          ],

          'text-center' => [
            'title' => __( 'Center', 'plugin-b2w' ),
						'icon' => 'eicon-text-align-center',
          ],

          'text-end' => [
            'title' => __( 'Right', 'plugin-b2w' ),
						'icon' => 'eicon-text-align-right',
          ],

        ],
        'default' => 'text-center',
        'toggle' => true,
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
      [
        'name' => 'background',
        'label' => __( 'Background', 'plugin-b2w' ),
        'types' => [ 'classic', 'gradient' ],
        'selector' => '{{WRAPPER}} .overlay',
      ]
    );

    $this->end_controls_section();

  }

	protected function render() {
    global $plugin_images;
    $settings = $this->get_settings_for_display();
    $target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
    $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';

  echo '<div class="section-call-to-action">';

    echo '<div class="overlay">';
      echo '<div class="overlay-image"><img src="'. esc_url( $settings['overlay_image']['url'] ) .'"></div>';
    echo '</div>';

    echo '<div class="underlay-bg"></div>';

    echo '<p class="sub-title">'. $settings['sub_title_text'] .'</p>';
    echo '<h2>'. $settings['title_text'] .'</h2>';
    echo '<p class="cta-desc">'. $settings['cta_desc'] .'</p>';
    echo '<div class="link-box '. $settings['btn_align'] .'">';
      echo '<a href="'. $settings['button_link']['url'] .'" ' . $target . $nofollow . ' class="btn '. $settings['btn_style'] .'">'.$settings['button_text'].'</a>';
    echo '</div>';
  echo '</div>';

  }


 }

 // Register widget
 \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \B2w_Call_To_Action_Widget() );
