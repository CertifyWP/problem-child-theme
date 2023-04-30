# CertifyWP: Problem Child Theme

This is a sample theme to be downloaded, installed, and activated on your WordPress site as part of your CertifyWP credential program. 

When active:
* this theme looks exactly like the default twentytwentythree theme but with a red background
* this theme adds a grey bar at the bottom of every page that says "CertifyWP Problem Child is working!"
* this theme converts post text on single pages to pig latin
* this theme formats post text on single pages to a grid shape

## Problem solving
The theme should activate. You'll know the theme is active when you see a theme that looks like the twentytwentythree theme, but with a red background, and it will show as the active theme in the Theme section of the WordPress admin.

You should see a grey bar at the bottom of every page that says "CertifyWP Problem Child is working!" If you don't see this, you will need to look at the code to figure out why.

The post content on single pages (i.e. individual post pages, not archive pages) should be in pig latin. Post content on all other pages (i.e. archive pages, home page) should remain unchanged.

The post content on single pages (i.e. individual post pages, not archive pages) should be formatted in a grid shape. Post content on all other pages (i.e. archive pages, home page) should remain unchanged.

## Changelog
1.1 (2023-04-30)
* Added certifywp_pig_latin_content_filter() and certifywp_grid_content_filter()

1.0 (2023-04-09)
* Initial version.