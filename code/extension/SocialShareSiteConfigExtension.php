<?php

class SocialShareSiteConfigExtension extends DataExtension
{
	public function updateCMSFields(FieldList $fields)
	{
		$editor = GridFieldConfig_RelationEditor::create()->addComponent(new GridFieldSortableRows('SortOrder'));
		$grid = new GridField('SocialShareNetworks', 'Social Sharing Networks', SocialShareNetwork::get(), $editor);

		$fields->addFieldToTab('Root.SocialSharingWidget', new HeaderField('Social Sharing Widget'));
		$fields->addFieldToTab('Root.SocialSharingWidget', $grid);
		
		return $fields;
	}
}