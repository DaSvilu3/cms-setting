# Backend theme

# Installation

1- Define package to your composer.json add this lines to composer.json :
` "repositories": [
    {
      "type": "git",
      "url":  "https://ahmed-elsadany@bitbucket.org/ahmed-elsadany/cms-backend-theme.git"
    }],`


2- Run command `composer require elsayed_nofal/backend-theme:dev-branch`

3- add service provider to config/app.php
`MediaSci\CmsBackendTheme\CmsBackenThemeServiceProvider,`


4- Run command `php artisan vendor:publish`

 # cms-setting
