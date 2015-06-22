# Private message module
This module add private message capabilities on your wonderful Asgard CMS!

So you got this functionality:
* private message between registered user
* support message (even for guest if you want)
* some extra settings

## Installation
Follow the [installation guide of module](https://asgardcms.com/en/docs/getting-started/installation#installing-modules-and-themes), with module name "grummfy/acms-privatemessage".

## Override view
Like for the user module, you can [override the view](https://asgardcms.com/en/docs/user-module/adding-additional-user-data#publishing-user-views).

1. php artisan vendor:publish --provider="Modules\PrivateMessage\Providers\PrivateMessageServiceProvider"
1. edit file in resources/views/asgard/private-message/

## Quality control
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/0b887dec-4def-492d-959c-c704a8a1e4bf/mini.png)](https://insight.sensiolabs.com/projects/0b887dec-4def-492d-959c-c704a8a1e4bf)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Grummfy/AsgardCMSPrivateMessage/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Grummfy/AsgardCMSPrivateMessage/?branch=master)

