<?php
/**
 * Template Name: Home
 */

get_header(); ?>

<?php get_template_part( 'blocks/home/hero-home'); ?>

<?php get_template_part( 'blocks/home/intro-home'); ?>

<?php get_template_part( 'blocks/global/explore'); ?>

<?php get_template_part( 'blocks/global/recent-posts'); ?>

<?php get_template_part( 'blocks/global/mid-banner'); ?>

<?php get_template_part( 'blocks/home/about-home'); ?>

<?php
get_footer();