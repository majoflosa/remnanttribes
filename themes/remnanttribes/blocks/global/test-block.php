<?php
$rem_blocks = Rem_Blocks::get_instance();
$test_block = $rem_blocks->get_block( 'test-block' );

// var_dump( $test_block );

$dynamic = '';
if ( empty($test_block) ) {
    $dynamic = 'No data received';
} else {
    $dynamic = $test_block['attributes']['attr_test'];
}
?>

<div class="test-block"><h3>This is the test-block template: <?php echo $dynamic; ?></div>
