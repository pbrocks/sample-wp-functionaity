/**
 *  Register post meta for Pharmacy
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
		'rxsample-blocks/pharmacy-meta',
		{
			title: __( 'Pharmacy Meta', 'rxsample-blocks' ),
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

				const metaPharmacyID = meta['_rxsample_pharmacy_id'];

				const metaPharmacyGroup = meta['_rxsample_pharmacy_itthinx_id'];
				function updatePharmacyGroup(newValue) {
					setMeta(
						Object.assign(
							{},
							meta,
							{
								_rxsample_pharmacy_itthinx_id: newValue,
							}
						)
					);
				}

				const metaParentGroup = meta['_rxsample_pharmacy_parent_id'];
				function updateParentGroup(newValue) {
					setMeta(
						Object.assign(
							{},
							meta,
							{
								_rxsample_pharmacy_parent_id: newValue,
							}
						)
					);
				}

				const metaAdminUser = meta['_rxsample_pharmacy_admin_user_id'];
				function updateAdminUser(newValue) {
					setMeta(
						Object.assign(
							{},
							meta,
							{
								_rxsample_pharmacy_admin_user_id: newValue,
							}
						)
					);
				}

				const metaOrgID = meta['_rxsample_org_id'];
				function updateOrgID(newValue) {
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

				const metaPharmAddress = meta['_rxsample_pharmacy_address'];
				function updatePharmAddress(newValue) {
					setMeta(
						Object.assign(
							{},
							meta,
							{
								_rxsample_pharmacy_address: newValue,
							}
						)
					);
				}

				const metaPharmCity = meta['_rxsample_pharmacy_city'];
				function updatePharmCity(newValue) {
					setMeta(
						Object.assign(
							{},
							meta,
							{
								_rxsample_pharmacy_city: newValue,
							}
						)
					);
				}

				const metaPharmState = meta['_rxsample_pharmacy_state'];
				function updatePharmState(newValue) {
					setMeta(
						Object.assign(
							{},
							meta,
							{
								_rxsample_pharmacy_state: newValue,
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
							'Sample Pharmacy Information',
							el(
								NumberControl,
								{
									label: 'Pharmacy\'s RxSample ID',
									value: metaPharmacyID,
								}
							),
							el(
								NumberControl,
								{
									label: 'Pharmacy ITThinx Group ID',
									value: metaPharmacyGroup,
									onChange: updatePharmacyGroup,
								}
							),
							el(
								NumberControl,
								{
									label: 'Pharmacy Parent ITThinx Group ID',
									value: metaParentGroup,
									onChange: updateParentGroup,
								}
							),
							el(
								// This is visible when value does not exist.
								NumberControl,
								{
									label: 'Organization ID of Pharmacy',
									value: metaOrgID,
									onChange: updateOrgID,
								}
							),
							el(
								NumberControl,
								{
									label: 'Pharmacy Admin User ID',
									value: metaAdminUser,
									onChange: updateAdminUser,
								}
							),
							el(
								TextControl,
								{
									label: 'Pharmacy Address',
									value: metaPharmAddress,
									onChange: updatePharmAddress,
								}
							),
							el(
								TextControl,
								{
									label: 'Pharmacy City',
									value: metaPharmCity,
									onChange: updatePharmCity,
								}
							),
							el(
								TextControl,
								{
									label: 'Pharmacy State',
									value: metaPharmState,
									onChange: updatePharmState,
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
