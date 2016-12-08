<?php

class SocialSharePageExtension extends DataExtension
{
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

	public function SocialSharerUrl($path)
	{
		$find = ['{$AbsoluteLink}', '{$Title}'];
		$replace = [urlencode($this->owner->AbsoluteLink()), urlencode($this->owner->Title)];
		
		return str_replace($find, $replace, $path);
	}
}