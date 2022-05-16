/**
 * The creates some settings for showing embedded Power BI Reports.
 *
 * @since 0.8.4
 * @package aap_wp_functionality
 */

// phpcs:ignoreFile

/**
 * Function to call.
 */
function getPharmacyReport() {
	// (function () {
	// Embed type.
	// 1 = Embed type.
	// 0 = Azure AD.
	var rx_aap_tokenType = '1';

	// Get models, models contains enums that can be used.
	var rx_aap_models = window['powerbi-client'].models;

	// We give All permissions to demonstrate switching between View and Edit mode and saving report.
	var rx_aap_permissions = rx_aap_models.Permissions.All;

	// Embed configuration used to describe the what and how to embed.
	// This object is used when calling powerbi.embed.
	// This also includes settings and options such as filters.
	// You can find more information at https://github.com/Microsoft/PowerBI-JavaScript/wiki/Embed-Configuration-Details.
	var rx_aap_config = {
		type: 'report',
		tokenType: rx_aap_tokenType == '0' ? rx_aap_models.TokenType.Aad : rx_aap_models.TokenType.Embed,
		accessToken: rx_aap_txtAccessToken,
		embedUrl: rx_aap_txtEmbedUrl,
		id: rx_aap_txtEmbedReportId,
		permissions: rx_aap_permissions,
		settings: {
			panes: {
				filters: {
					visible: true
				},
				pageNavigation: {
					visible: true
				}
			}
		}
	};

	// Get a reference to the embedded report HTML element.
	var rx_aap_embedContainer = jQuery('.power-bi-embed-container')[0];

	// Embed the report and display it within the div container.
	var rx_aap_report = powerbi.embed(rx_aap_embedContainer, rx_aap_config);

	// Report.off removes a given event handler if it exists.
	rx_aap_report.off("loaded");

	// Report.on will add an event handler which prints to Log window.
	rx_aap_report.on(
		"loaded",
		function () {
			Log.logText("Loaded");
		}
	);

	// Report.off removes a given event handler if it exists.
	rx_aap_report.off("rendered");

	// Report.on will add an event handler which prints to Log window.
	rx_aap_report.on(
		"rendered",
		function () {
			Log.logText("Rendered");
		}
	);

	rx_aap_report.on(
		"error",
		function (event) {
			Log.log(event.detail);

			rx_aap_report.off("error");
		}
	);

	rx_aap_report.off("saved");
	rx_aap_report.on(
		"saved",
		function (event) {
			Log.log(event.detail);
			if (event.detail.saveAs) {
				Log.logText('In order to interact with the new report, create a new token and load the new report');
			}
		}
	);
}
// })();
