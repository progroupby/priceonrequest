# Price on Request

Price on Request module for Prestashop 1.6.*.
This module need for getting products price on request.

## Getting Started
Download and upload the module on your site.
### Installing
In modules find ain install this module.
In the "email" field write the email address on which you wish to receive your price requests.

###Addition
The module uses the hooks:
1. Heder - to add js and css
2. Footer - to display the request form prices
3. displayProductButtons - hook output buttons goods

4. priceOnRequestForm - for withdrawal request form prices, if you are not using Footer hook
for output to add in the template footer.tpl
{capture name='priceonrequestform'}{hook h='priceonrequestform'}{/capture}

5. displayPriceOnRequest to display buttons price request if you don't use hook displayProductButtons
for output to add in the template product-list.tpl
{hook h='displayPriceOnRequest' product=$product}

{product hook H='displayPriceOnRequest'=$product}

## Authors
Dzmitry Hehenia - progroup.by

## License
