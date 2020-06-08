# What does it do

This extension adds a page type which returns a pdf from the website you are currently visiting.
For this, a middleware checks the pagetype and on match it throws the content inside mPdf, which then generates a pdf-file.

You can write your own templates with fluid and include your own css-files for styling.
Also everything is overwritable.

# Usage

Include the extensions' "setup.typoscript" and "constants.typoscript".
Add typeNum 1590672891 to your routing config. You can add 1590672892 as well for debug purposes.
Replace the default template EXT:html_to_pdf/Resources/Private/Pdf/Templates/Index.html to render the correct col or do different layout adjustments for your project.
