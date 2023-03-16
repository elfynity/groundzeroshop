<?php
class ButtonLink{
	private $button_link;
	private $button_link_nsted;
	
	
	public function __construct($button_link = '',$button_link_nested = '') {
		$this->button_link_nested = $button_link_nested;
		$this->button_link = $button_link;
	}
	
	public function showButtonLink() {
		$link_url = $this->button_link['url'];
		$link_title = $this->button_link['title'];
		$link_target = $this->button_link['target'] ? $this->button_link['target'] : '_self';
	
		echo '<a class="button-link" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
	}
	
	
	public function showbuttonLinkNested() {
		$link_url = $this->button_link_nested['url'];
		$link_title = $this->button_link_nested['title'];
		$link_target = $this->button_link_nested['target'] ? $this->button_link_nested['target'] : '_self';
		
		echo '<a class="button-link" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
		
	}
	
	
} //class
