Store Info
==========

This Magento module allows a merchant with a phyisical retail store to display some basic location information and 
business hours in the footer and on a page at example.com/retail-store.  

### Configuration ###
Settings are located at in the Magento Admin at ***System > Configuration > General > Retail Store Info***.  
In addition to location and regular business hours, business hours exceptions can be added for holiday closings or days 
with irregular hours.  Cache needs to be cleared after changing settings. 

### Footer Block ###
A block in the footer displays the store name, addres, and business hours for the current day, taking into account if 
there is an exception for today's date.  It also links to the retail store page (example.com/retail-store).


### Retail Store Page ###
The Retail Store page displays a table of current normal weekly hours, as well as an Upcoming Special Hours section 
below if there are any exceptions in the range of yesterday to 10 days in the future. If there are no exceptions in 
that range it doesn't display.  Below the business hours the store's address, phone number, and an embedded google map 
are displayed.


### Possible Future Improvments ###
Currently the hours exceptions take text input and store it in a serialized array.
It would be more user-proof to have fixed options in dropdown menus and not rely on string
comparision as much.  We'll see if any issue actually arise first though.
