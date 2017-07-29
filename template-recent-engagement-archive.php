<?php

/*
*   Template Name: Recent Engagement Archive
*
*   This template is used for adding content to the Recent Engagements
*   post archive.  Content added to a page with slug 'recent-engagement-archive' 
*   is pulled into the post type archive for the recent_engagement
*   post type.  If the dummy page is accessed, this template is
*   triggered and redirects to the real post type archive page.
*/

wp_safe_redirect( get_post_type_archive_link( RECENT_ENGAGEMENT_POST_TYPE ) );
exit;
