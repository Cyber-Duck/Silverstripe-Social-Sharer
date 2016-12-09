<?php

/**
 * SocialSharePageExtension
 *
 * @package silverstripe-social-sharer
 * @license MIT License https://github.com/cyber-duck/silverstripe-social-sharerblob/master/LICENSE
 * @author  <andrewm@cyber-duck.co.uk>
 **/
class SocialSharePageExtension extends DataExtension
{
    /**
     * Render the social widget
     *
     * @since version 1.0.0
     *
     * @return string 
     **/
    public function SocialShareWidget()
    {
        Requirements::css(SOCIAL_SHARER.'/css/social-sharer.css');
        Requirements::javascript(SOCIAL_SHARER.'/javascript/social-sharer.js');

        return $this->owner
            ->customise([
                'SocialNetworks' => SocialShareNetwork::get()
            ])
            ->renderWith('SocialShareWidget');
    }

    /**
     * Replace the path string variables with the page link and title
     *
     * @since version 1.0.0
     *
     * @param string $path
     *
     * @return string 
     **/
    public function SocialSharerUrl($path)
    {
        $find = ['{$AbsoluteLink}', '{$Title}'];
        $replace = [urlencode($this->owner->AbsoluteLink()), urlencode($this->owner->Title)];
        
        return str_replace($find, $replace, $path);
    }
}