Store Info
==========

### Retail Store Page ###
The Retail Store page displays a complete breakdown of the retail store's current
normal weekly hours, as well as any upcoming exceptions for
specific dates the store is closed or has irregular hours.  You edit the weekly hours
and exceptions in the Magento Admin at ***System > Configuration > General > Hours***.
As with any Magento changes, clearing the cache may be necessary before being reflected
on the front end.  On any give day the Upcoming Special Hours section displays any
exceptions in the range of yesterday to 10 days in the future.
If there are no exceptions in that range it doesn't display.

### Footer ###
The Footer also displays business hours for the current day,
taking into account if there is an exception for today's date.


### Possible Future Improvments ###
Currently the exceptions take text input and store it in a serialized array.
It would be more user-proof to have fixed options in dropdown menus and not rely on string
comparision as much.  We'll see if any issue actually arise first though.
