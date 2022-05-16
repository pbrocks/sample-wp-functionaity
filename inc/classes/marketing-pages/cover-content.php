<?php
/**
 * [$cover_content]
 *
 * @var string
 * @package sample_wp_functionality
 */

$covers['home_cover'] = '
<!-- wp:cover {"url":"' . WP_CONTENT_URL . '/uploads/2021/06/home-banner-1.png","id":161,"dimRatio":0,"overlayColor":"white","focalPoint":{"x":"0.50","y":"0.50"},"minHeight":500,"contentPosition":"center center","align":"full","className":"hero-section","style":{"spacing":{"padding":{"top":"150px","right":"20px","bottom":"100px","left":"20px"}}}} -->
<div class="wp-block-cover alignfull has-white-background-color hero-section" style="padding-top:150px;padding-right:20px;padding-bottom:100px;padding-left:20px;min-height:500px"><img class="wp-block-cover__image-background wp-image-161" alt="" src="' . WP_CONTENT_URL . '/uploads/2021/06/home-banner-1.png" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%"/><div class="wp-block-cover__inner-container"><!-- wp:image {"align":"center","id":957,"width":345,"height":162,"sizeSlug":"large","linkDestination":"none","className":"hero-section-logo"} -->
<div class="wp-block-image hero-section-logo"><figure class="aligncenter size-large is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/sample-logo.svg" alt="" class="wp-image-957" width="345" height="162"/></figure></div>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","placeholder":"Write title…","className":"hero-section-sub-heading","fontSize":"normal"} -->
<p class="has-text-align-center hero-section-sub-heading has-normal-font-size"><strong>Nearly 2,500</strong> independent pharmacies and counting.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","className":"hero-section-heading","fontSize":"extra-large"} -->
<h2 class="has-text-align-center hero-section-heading has-extra-large-font-size">The <strong>Member-Owned</strong> Co-op Advantage:</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide","className":"hero-section-callout-wrapper"} -->
<div class="wp-block-columns alignwide hero-section-callout-wrapper"><!-- wp:column {"className":"hero-section-callout"} -->
<div class="wp-block-column hero-section-callout"><!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"#1b75bb"}},"fontSize":"normal"} -->
<h3 class="has-text-align-center has-text-color has-normal-font-size" style="color:#1b75bb"><strong>SAVINGS &gt;</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"extra-small"} -->
<p class="has-text-align-center has-extra-small-font-size">Putting profit back into independent pharmacies.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"hero-section-callout"} -->
<div class="wp-block-column hero-section-callout"><!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"#1b75bb"}},"fontSize":"normal"} -->
<h3 class="has-text-align-center has-text-color has-normal-font-size" style="color:#1b75bb">FREEDOM &gt;</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"extra-small"} -->
<p class="has-text-align-center has-extra-small-font-size">Freedom from long-term vendor contracts</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"hero-section-callout"} -->
<div class="wp-block-column hero-section-callout"><!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"#1b75bb"}},"fontSize":"normal"} -->
<h3 class="has-text-align-center has-text-color has-normal-font-size" style="color:#1b75bb"><strong>FLEXIBILITY &gt;</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"extra-small"} -->
<p class="has-text-align-center has-extra-small-font-size">Better inventory selection, tools and support.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"contentJustification":"center"} -->
<div class="wp-block-buttons is-content-justification-center"><!-- wp:button {"className":"free-benefits-assessment"} -->
<div class="wp-block-button free-benefits-assessment"><a class="wp-block-button__link" href="#get-your-free-benefits-assessment">Get your free benefits assessment</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->

';

$covers['become_member_cover'] = '
<!-- wp:cover {"url":"' . WP_CONTENT_URL . '/uploads/2021/07/become-member-background.mp4","id":466,"dimRatio":10,"overlayColor":"white","backgroundType":"video","minHeight":500,"contentPosition":"center center","align":"full","className":"member-hero-section","style":{"spacing":{"padding":{"top":"50px","right":"0px","bottom":"50px","left":"0px"}}}} -->
<div class="wp-block-cover alignfull has-background-dim-10 has-white-background-color has-background-dim member-hero-section" style="padding-top:50px;padding-right:0px;padding-bottom:50px;padding-left:0px;min-height:500px"><video class="wp-block-cover__video-background intrinsic-ignore" autoplay muted loop playsinline src="' . WP_CONTENT_URL . '/uploads/2021/07/become-member-background.mp4" data-object-fit="cover"></video><div class="wp-block-cover__inner-container"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","className":"hero-section-heading","fontSize":"extra-large"} -->
<h2 class="has-text-align-center hero-section-heading has-extra-large-font-size">Join nearly 2,500 independent pharmacies who have discovered a better way to compete in today’s marketplace.</h2>
<!-- /wp:heading -->

<!-- wp:buttons {"contentJustification":"center"} -->
<div class="wp-block-buttons is-content-justification-center"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link" href="#get-started-now">Become an Sample Member</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
';


$covers['profitamp_hero'] = '
<!-- wp:cover {"overlayColor":"white","align":"full","className":"profitamp-hero"} -->
<div class="wp-block-cover alignfull has-white-background-color has-background-dim profitamp-hero"><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"full"} -->
<div class="wp-block-group alignfull"><!-- wp:image {"align":"center","id":390,"sizeSlug":"large","linkDestination":"none","className":"profitamp-logo"} -->
<div class="wp-block-image profitamp-logo"><figure class="aligncenter size-large"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/profit-amp-logo-color.png" alt="" class="wp-image-390"/></figure></div>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5"},"color":{"text":"#282828"}},"className":"profitamp-hero-p","fontSize":"normal"} -->
<p class="has-text-align-center profitamp-hero-p has-text-color has-normal-font-size" style="color:#282828;line-height:1.5">Available exclusively to Sample Members and API Customers, ProfitAmp is a comprehensive business intelligence tool that delivers a deeper look into pharmacy operations. This includes an analysis of dispensing data through the Pharmacy Management System to identify key dispensing trends, missing patients and income opportunities.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide","className":"hero-columns-wrapper"} -->
<div class="wp-block-columns alignwide hero-columns-wrapper"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"align":"full"} -->
<div class="wp-block-group alignfull"><!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#1b75bb"}},"className":"profitamp-hero-h2","fontSize":"normal"} -->
<h2 class="has-text-align-center profitamp-hero-h2 has-text-color has-normal-font-size" style="color:#1b75bb"><a href="#actionable-data" data-type="internal" data-id="#actionable-data">ACTIONABLE DATA &gt;</a></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"profitamp-hero-p"} -->
<p class="has-text-align-center profitamp-hero-p">Clear data, clear recommendations</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"align":"full"} -->
<div class="wp-block-group alignfull"><!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#1b75bb"}},"className":"profitamp-hero-h2","fontSize":"normal"} -->
<h2 class="has-text-align-center profitamp-hero-h2 has-text-color has-normal-font-size" style="color:#1b75bb"><span class="ugb-highlight" style="color: #1b75bb;"><a href="#meaningful-reporting" data-type="internal" data-id="#meaningful-reporting">MEANINGFUL REPORTING &gt;</a></span></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"profitamp-hero-p"} -->
<p class="has-text-align-center profitamp-hero-p">Always current, reliable business insight</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"align":"full"} -->
<div class="wp-block-group alignfull"><!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#1b75bb"}},"className":"profitamp-hero-h2","fontSize":"normal"} -->
<h2 class="has-text-align-center profitamp-hero-h2 has-text-color has-normal-font-size" style="color:#1b75bb"><span class="ugb-highlight" style="color: #1b75bb;"><a href="#simple-and-innovative" data-type="internal" data-id="#simple-and-innovative">SIMPLE AND  INNOVATIVE &gt;</a></span></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"profitamp-hero-p"} -->
<p class="has-text-align-center profitamp-hero-p">Built to be intuitive, created for pharmacies</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"contentJustification":"center"} -->
<div class="wp-block-buttons is-content-justification-center"><!-- wp:button {"style":{"color":{"background":"#1b75bb"},"border":{"radius":10}},"className":"hero-section-button sample-button"} -->
<div class="wp-block-button hero-section-button sample-button"><a class="wp-block-button__link has-background" href="#schedule-an-appointment" style="border-radius:10px;background-color:#1b75bb">Get insight. Get ProfitAmp.</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
';

$covers['api_customer_hero'] = '
<!-- wp:cover {"url":"' . WP_CONTENT_URL . '/uploads/2021/07/api-hero-banner.png","id":593,"dimRatio":0,"overlayColor":"white","minHeight":495,"minHeightUnit":"px","align":"full","className":"api-customer-hero"} -->
<div class="wp-block-cover alignfull has-white-background-color api-customer-hero" style="min-height:495px"><img class="wp-block-cover__image-background wp-image-593" alt="" src="' . WP_CONTENT_URL . '/uploads/2021/07/api-hero-banner.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide"} -->
<div class="wp-block-group alignwide"><!-- wp:image {"align":"center","id":592,"width":134,"height":185,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/APILogo.png" alt="" class="wp-image-592" width="134" height="185"/></figure></div>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":1,"align":"wide","fontSize":"extra-large"} -->
<h1 class="alignwide has-text-align-center has-extra-large-font-size">Lower your inventory cost and increase margins<br>on Brand Rx, Generic Rx and OTCs.</h1>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"#1b75bb"}},"fontSize":"normal"} -->
<h3 class="has-text-align-center has-text-color has-normal-font-size" style="color:#1b75bb"><strong>SAVINGS &gt;</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"extra-small"} -->
<p class="has-text-align-center has-extra-small-font-size">Monthly rebates and extra 5% off invoice pricing on weekly featured items.&nbsp;Make saving simple and focus on your business.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"#1b75bb"}},"fontSize":"normal"} -->
<h3 class="has-text-align-center has-text-color has-normal-font-size" style="color:#1b75bb"><strong>CONVENIENCE &gt;</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"extra-small"} -->
<p class="has-text-align-center has-extra-small-font-size">With more than 2,000 Generic SKUs, you\'ll find everything you need to care for your patients.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"#1b75bb"}},"fontSize":"normal"} -->
<h3 class="has-text-align-center has-text-color has-normal-font-size" style="color:#1b75bb"><strong>CUSTOMIZED PROGRAMS &gt;</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"extra-small"} -->
<p class="has-text-align-center has-extra-small-font-size">Find out which of our industry-leading<br>buying programs is right for you.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"contentJustification":"center"} -->
<div class="wp-block-buttons is-content-justification-center"><!-- wp:button {"style":{"color":{"background":"#1b75bb"},"border":{"radius":10}},"className":"hero-section-button sample-button","fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size hero-section-button sample-button has-small-font-size"><a class="wp-block-button__link has-background" href="#get-your-api-account" style="border-radius:10px;background-color:#1b75bb">Get Your API account started today</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><em><a href="https://store.apirx.com" target="_blank" rel="noreferrer noopener">Already have an account? Click here to shop.</a></em></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
';
