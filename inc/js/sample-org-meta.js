/**
 *  Register post meta for Organizations
 *
 * @package aap_wp_functionality
 **/

(function (wp) {
	const el                   = wp.element.createElement;
	const { __ }               = wp.i18n;
	const registerBlockType    = wp.blocks.registerBlockType;
	const { Panel, PanelBody } = wp.components;
	const TextControl          = wp.components.TextControl;
	const useSelect            = wp.data.useSelect;
	const useEntityProp        = wp.coreData.useEntityProp;
	const useBlockProps        = wp.blockEditor.useBlockProps;
	const NumberControl        = wp.components.__experimentalNumberControl;

	registerBlockType(
		'rxaap-blocks/organization-meta',
		{
			title: __( 'Org Meta', 'rxaap-blocks' ),
			icon: {
				src: 'sos',
				background: 'maroon',
				foreground: 'white',
			},
			category: 'text',

			edit: function (props) {
				const blockProps = useBlockProps();
				const postType   = useSelect(
					function (select) {
						return select( 'core/editor' ).getCurrentPostType();
					},
					[]
				);
				const entityProp = useEntityProp( 'postType', postType, 'meta' );
				const meta       = entityProp[0];
				const setMeta    = entityProp[1];

				const metaOrgGroup = meta['es5_aap_org_group_id'];
				function updateOrgGroup(newValue) {
					setMeta(
						Object.assign(
							{},
							meta,
							{
								es5_aap_org_group_id: newValue,
							}
						)
					);
				}

				const metaParentGroup = meta['es5_aap_org_parent_group_id'];
				function updateParentGroup(newValue) {
					setMeta(
						Object.assign(
							{},
							meta,
							{
								es5_aap_org_parent_group_id: newValue,
							}
						)
					);
				}

				const metaAdminUser = meta['es5_aap_org_admin_user_id'];
				function updateAdminUser(newValue) {
					setMeta(
						Object.assign(
							{},
							meta,
							{
								es5_aap_org_admin_user_id: newValue,
							}
						)
					);
				}

				const metaString1 = meta['es5_meta_string_1'];
				function updateString1(newValue) {
					setMeta(
						Object.assign(
							{},
							meta,
							{
								es5_meta_string_1: newValue,
							}
						)
					);
				}

				const metaString2 = meta['es5_meta_string_2'];
				function updateString2(newValue) {
					setMeta(
						Object.assign(
							{},
							meta,
							{
								es5_meta_string_2: newValue,
							}
						)
					);
				}

				return el(
					'div',
					blockProps,
					el(
						Panel,
						{},
						el(
							PanelBody,
							{},
							'Sample Organization Information',
							el(
								NumberControl,
								{
									label: 'Org Group ID',
									value: metaOrgGroup,
									onChange: updateOrgGroup,
								}
							),
							el(
								NumberControl,
								{
									label: 'Org Parent Group ID',
									value: metaParentGroup,
									onChange: updateParentGroup,
								}
							),
							el(
								NumberControl,
								{
									label: 'Org Admin ID',
									value: metaAdminUser,
									onChange: updateAdminUser,
								}
							),
							el(
								TextControl,
								{
									label: 'ES5 Sample Meta String 1',
									value: metaString1,
									onChange: updateString1,
								}
							),
							el(
								TextControl,
								{
									label: 'ES5 Sample Meta String 2',
									value: metaString2,
									onChange: updateString2,
								}
							)
						)
					)
				);
			},

			save: function () {
				return null;
			},
		}
	);
})( window.wp );
