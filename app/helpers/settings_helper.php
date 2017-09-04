<?php

function theme_url($uri = '')
{
    $_ci=& get_instance();
    return base_url($_ci->config->item('frontend_theme').$uri);
}