**Codoforum** is a modern forum software to create engaging communities.  
It works on your desktop or your mobile and has all the features that you need.   
Notifications and digests, subscriptions, categories, tags, search, moderation, permissions, badges, etc.  

This add-on will help you to integrate the Codoforum login with your existing CS Cart login/register system.  
When a user is logged in your website, he/she will be automatically logged into the forum as well.  



## Installation

1. Install the Add-on from CS-Cart Add-ons page
2. Go to Settings and enter the Client Id and Secret. 
Note: The values must be same as what you have entered in Codoforum backend -> Plugins -> Single Sign on.



The following details should be filled in Codoforum backend in Single sign on plugin  
Assuming your CS Cart website is installed at:  
https://myamazingsite.com  

Your settings will be something like this:  

SSO Get User Path:
https://www.loopazon.com/index.php?dispatch=codoforum_sso.get_user

SSO Login User Path:
https://www.loopazon.com/

SSO Logout User Path:
https://www.loopazon.com/index.php?dispatch=auth.logout&redirect_url=

SSO Register User Path:
https://www.loopazon.com/


For any further detailed documentation or help, refer: https://codoforum.com 
or contact us at admin@codologic.com
