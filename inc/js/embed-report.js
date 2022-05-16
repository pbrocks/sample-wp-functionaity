/**
 * The creates some settings for showing embedded Power BI Reports.
 *
 * @since 0.8.4
 * @package sample_wp_functionality
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
	var rx_sample_tokenType = '1';

	// Get models, models contains enums that can be used.
	var rx_sample_models = window['powerbi-client'].models;

	// We give All permissions to demonstrate switching between View and Edit mode and saving report.
	var rx_sample_permissions = rx_sample_models.Permissions.All;

	// Embed configuration used to describe the what and how to embed.
	// This object is used when calling powerbi.embed.
	// This also includes settings and options such as filters.
	// You can find more information at https://github.com/Microsoft/PowerBI-JavaScript/wiki/Embed-Configuration-Details.
	var rx_sample_config = {
		type: 'report',
		tokenType: rx_sample_tokenType == '0' ? rx_sample_models.TokenType.Aad : rx_sample_models.TokenType.Embed,
		accessToken: rx_sample_txtAccessToken,
		embedUrl: rx_sample_txtEmbedUrl,
		id: rx_sample_txtEmbedReportId,
		permissions: rx_sample_permissions,
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
	var rx_sample_embedContainer = jQuery('.power-bi-embed-container')[0];

	// Embed the report and display it within the div container.
	var rx_sample_report = powerbi.embed(rx_sample_embedContainer, rx_sample_config);

	// Report.off removes a given event handler if it exists.
	rx_sample_report.off("loaded");

	// Report.on will add an event handler which prints to Log window.
	rx_sample_report.on(
		"loaded",
		function () {
			Log.logText("Loaded");
		}
	);

	// Report.off removes a given event handler if it exists.
	rx_sample_report.off("rendered");

	// Report.on will add an event handler which prints to Log window.
	rx_sample_report.on(
		"rendered",
		function () {
			Log.logText("Rendered");
		}
	);

	rx_sample_report.on(
		"error",
		function (event) {
			Log.log(event.detail);

			rx_sample_report.off("error");
		}
	);

	rx_sample_report.off("saved");
	rx_sample_report.on(
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
