/**
 *  Register post meta for Organizations
 *
 * @package sample_wp_functionality
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
		'rxsample-blocks/organization-meta',
		{
			title: __( 'Organization Meta', 'rxsample-blocks' ),
			icon: {
				src: 'carrot',
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

				const metaOrgGroup = meta['_rxsample_org_id'];
				function updateOrgGroup(newValue) {
					setMeta(
						Object.assign(
							{},
							meta,
							{
								_rxsample_org_id: newValue,
							}
						)
					);
				}

				const metaParentGroup = meta['_rxsample_org_itthinx_group_id'];
				function updateParentGroup(newValue) {
					setMeta(
						Object.assign(
							{},
							meta,
							{
								_rxsample_org_itthinx_group_id: newValue,
							}
						)
					);
				}

				const metaOrgOtherGroups = meta['_rxsample_org_other_groups'];
				function updateOrgOtherGroups(newValue) {
					setMeta(
						Object.assign(
							{},
							meta,
							{
								_rxsample_org_other_groups: newValue,
							}
						)
					);
				}

				const metaAdminUser = meta['_rxsample_org_owner_wpuser_id'];
				function updateAdminUser(newValue) {
					setMeta(
						Object.assign(
							{},
							meta,
							{
								_rxsample_org_owner_wpuser_id: newValue,
							}
						)
					);
				}

				const metaOrgName = meta['_rxsample_org_name'];
				function updateOrgName(newValue) {
					setMeta(
						Object.assign(
							{},
							meta,
							{
								_rxsample_org_name: newValue,
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
								TextControl,
								{
									label: 'Organization Name',
									value: metaOrgName,
									onChange: updateOrgName,
								}
							),
							el(
								NumberControl,
								{
									label: 'Org Group ID',
									value: metaOrgGroup,
									onChange: updateOrgGroup,
								}
							),
							el(
								TextControl,
								{
									label: 'Org Other Groups Array',
									value: metaOrgOtherGroups,
									onChange: updateOrgOtherGroups,
								}
							),
							el(
								NumberControl,
								{
									label: 'ITthinx Group ID',
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
