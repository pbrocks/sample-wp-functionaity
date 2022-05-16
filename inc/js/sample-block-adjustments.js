/**
 *  Register block styles adds functionality
 *  to the editor UI in order to trigger specific CSS
 *
 * @package aap_wp_functionality
 **/

wp.blocks.registerBlockStyle(
	'core/image',
	{
		name: 'aap-rounded-border',
		label: 'Round Border'
	}
);
