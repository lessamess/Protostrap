# Protostrap - a prototyping framework for designers

Protostrap is a framework **for designers** that want to get clickable and testable prototypes up fast. It is based on Bootstrap, so all you can do there you can do here too.

With just **very** basic knowledge of php it allows designers to make page elements that are reusable on different pages - useful for reusing navigation and recurring elements.

This is, as yet, experimental      .

This is prototyping software and therefore lacks all security features needed for production
### Do NOT use this in a production environment

# Requirements
- A local webserver with any version of PHP.
**Mac Users with OS X Lion or older:** Macs come shipped with a webserver enabled by default, it is situated under /Library/WebServer/Documents.
**Mac users with OS X Mountain Lion:** The default webserver has been disabled. Read on <a href="http://reviews.cnet.com/8301-13727_7-57481978-263/how-to-enable-web-sharing-in-os-x-mountain-lion/"> how to enable web sharing on mountain lion</a>

As an alternative you might consider installing <a href="http://www.mamp.info/en/index.html">MAMP</a>

**Windows Users**
If you haven't already, get <a href="http://www.wampserver.com/en/">WAMP Server</a>.

## Usage
- Download Protostrap
- **Put it on your local server, if you have a MAC /Library/WebServer/Documents is the folder you're looking for**
- you can access it in the browser via: <a href="http://localhost/protostrap">http://localhost/protostrap</a> assuming you have named the folder protostrap and put it into the above directory.

## Features
### Site structure
- Filesnippets for header, footer, iosTabbar all easily adaptable
- Navigation filesnippet including a bootstrap navigation element
- missing.php file to show the "End of Prototype" situation in tests, 404 Handler that automatically redirects to missing.php
- Fake Login Process and logged in status, authentification error faking.

### Mobile
- iOS tabbar with styles for active and non active tabs
- Badges ⓵ and ⓶ for iOS tabbar
- Can be added to the homescreen as a native mobile-webapp when viewed on an iPhone
- Displays an "Add to Homescreen" hint when opened in mobile Safari, one time every 24 hours
- standalone app mode for ios, correctly handling all the links not to open in safari

- svg Placeholders, responsive or fixed in width


### Ready-to-Use Examples
- Grid
- Accordeon with dynamic ID
- Carousel
- Tabs
- Stacked Navigation
- Breadcrumb that is horizontally scrollable on mobile.

### Included Libraries
- iScroll Library (used for the scrollable breadcrumbs on mobile)
- fastclick library for really fast tapping experience on mobile

## Planned

- Megamenu files
- Forms with UX optimized Feedback
- Easy verification triggering for Form-Feedback
- Files to fake Google search (Great for usability testing)
- typeahead example with a better typeahead

## Licence
Protostrap is Licenced under Apache Licence Version 2.0
http://www.apache.org/licenses/LICENSE-2.0.txt