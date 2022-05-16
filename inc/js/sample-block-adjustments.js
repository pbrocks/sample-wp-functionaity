/**
 *  Register block styles adds functionality
 *  to the editor UI in order to trigger specific CSS
 *
 * @package sample_wp_functionality
 **/

wp.blocks.registerBlockStyle(
	'core/image',
	{
		name: 'sample-rounded-border',
		label: 'Round Border'
	}
);
