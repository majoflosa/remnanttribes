<?php

class Rem_Blocks {
    private static $instance = null;

    private $blocks = [];

    public function add_block( $block_name ) {
        $this->blocks[$block_name] = [];
        return $this->blocks[$block_name];
    }

    public function get_blocks() {
        return $this->blocks;
    }
    
    public function get_block( $block_name ) {
        return $this->blocks[$block_name];
    }

    public function set_block_attributes( $block_name, $attributes ) {
        $this->blocks[$block_name]['attributes'] = $attributes;
    }

    public function get_block_attributes( $block_name ) {
        return $this->blocks[$block_name]['attributes'];
    }
    
    public function set_block_content( $block_name, $content ) {
        $this->blocks[$block_name]['content'] = $content;
    }

    public function get_block_content( $block_name ) {
        return $this->blocks[$block_name]['content'];
    }

    public static function get_instance() {
        if ( self::$instance === null ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}