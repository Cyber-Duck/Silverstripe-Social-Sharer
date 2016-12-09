<?php

/**
 * SocialShareSiteConfigExtension
 *
 * @package silverstripe-social-sharer
 * @license MIT License https://github.com/cyber-duck/silverstripe-social-sharer/blob/master/LICENSE
 * @author  <andrewm@cyber-duck.co.uk>
 **/
class SocialShareSiteConfigExtension extends DataExtension
{
    /**
     * Add the social widget fields to the CMS settings panel
     *
     * @since version 1.0.0
     *
     * @return object 
     **/
	public function updateCMSFields(FieldList $fields)
	{
		$editor = GridFieldConfig_RelationEditor::create()->addComponent(new GridFieldSortableRows('SortOrder'));
		$grid = new GridField('SocialShareNetworks', 'Social Sharing Networks', SocialShareNetwork::get(), $editor);

		$fields->addFieldToTab('Root.SocialSharingWidget', new HeaderField('Social Sharing Widget'));
		$fields->addFieldToTab('Root.SocialSharingWidget', $grid);
		
		return $fields;
	}
}