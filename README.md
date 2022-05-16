# RxSample WP Functionality

## Description

WordPress plugin to add functionality to the site.

## Automated Deployment

Automated deployment is configured via GitHub Actions. Workflows map to each deployed environment.

General deployment flow:

-   Feature/bug branches get pushed to rxaapdev
-   Merges to main get pushed to rxaapstg
-   Release branch gets pushed to rxaap AND aapcontentdev
-   Promoting to aapharm will happen through full backup restore

## Release Notes

-   v0.13.5 Pharmacy Updater
-   v0.13.4 Pharmacy Picker
-   v0.13.3 Fix Constant Def
-   v0.13.2 Pruning version bump
-   v0.13.1 Pruning Import Code, Org/Pharm CPTs and Blocks
-   v0.13.0 Global JS scripts in Customizer; limit user roles in Profile
-   v0.12.9 Footer Links
-   v0.12.8 Adjust CPT permissions
-   v0.12.7 Pharmacy Lookup
-   v0.12.6 Redirect to Profile after registration without logging out
-   v0.12.5 Adjust callback to return strings
-   v0.12.4 Adjust callback function for Orgs/Pharms
-   v0.12.3 Bug fix for no login after registration and naming conventions.
-   v0.12.2 Make Power Bi use constant for group workspace.
-   v0.12.1 Implement action to redirect before log-in of created user
-   v0.12.0 Add Filter function for UM Member pages
-   v0.11.9 Fix issue with csv upload not handling array of organization cpt posts when a user has more than one organization
    v0.11.8 Remove Dashboard Tabs
-   v0.11.7 Fix issue with csv upload and duplicate incoming cpt names with different org_ids
-   v0.11.6 Fix more duplicate org issue with bulk_add endpoint
-   v0.11.5 Fix issue of login redirects
-   v0.11.4 Fix duplicate org issue with bulk_add endpoint
-   v0.11.3 Remove First/Last name autofill on Registration Form
-   v0.11.2 Clear Registration Form fields and file cleanup
-   v0.11.1 Update Org CSV upload to append org id
-   v0.11.0 Accommodate Org info in Pharmacy Push to bulk_add endpoint
-   v0.10.9 Login Redirects with UM roles
-   v0.10.8 Maps to Block Patterns.
-   v0.10.7 Add Pharmacy Assignment code
-   v0.10.6 Login Redirect Settings
-   v0.10.5 Org/Pharm blocks updated
-   v0.10.4 Image fade only on homepage
-   v0.10.3 Fix pipeline typos
-   v0.10.2 Updating Block Patterns
-   v0.10.1 Change deployment targets
-   v0.9.0 Template redirect for Private pages
-   v0.8.9 Ultimate Member CSS, Change Hero Image
-   v0.8.8 Loading custom js with phpcs, remove diagnostic code
-   v0.8.7 Add style to UI in editor via JS
-   v0.8.6 Move power bi settings to wp-config.php
-   v0.8.5 Adding customizer
-   v0.8.4 Add Embedded Power Bi Reports
-   v0.8.3 Fix version comparison in dev workflow
-   v0.8.2 Add bulk_add endpoint (wp/v2/rxsample_pharmacy/bulk_add)
-   v0.8.1 Meta Block for Orgs CPT
-   v0.8.0 Meta Block for Pharmacies CPT, remove Limit Core Blocks
-   v0.7.9 Add Sample CSV upload file -- Import users and customers from CSV plugin
-   v0.7.8 Metabox HTML and Regularize nomenclature
-   v0.7.7 Create CSV Upload Processing
-   v0.7.6 Expanded Organization CPT
-   v0.7.5 Update dev workflow for PRs
-   v0.7.4 Add Organization CPT
-   v0.7.3 Initial Ultimate Member
-   v0.7.2 CSS for blocks
-   v0.7.1 Block patterns by section
-   v0.6.1 Adding block patterns
-   v0.5.2 Adding marketing pages as patterns
-   v0.5.1 Animate CSS
-   v0.4.1 Limit Core Blocks, remove Block Template
-   v0.3.1 Initial login css and redirect
-   v0.2.1 Dashboard page start
-   v0.1.1 Initial push

## PHP CodeSniffer

If you have the CodeSniffer path installed in your startup file, you can run in Terminal from within the plugin's main folder.

```sh
phpcs .
```

If not, you can install using `composer` with:

```sh
composer install ./vendor/bin/phpcs --ignore=/vendor/ --standard=WordPress .
```
