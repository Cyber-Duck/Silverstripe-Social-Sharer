<?php

/**
 * SocialShareNetwork
 *
 * @package silverstripe-social-sharer
 * @license MIT License https://github.com/cyber-duck/silverstripe-social-sharer/blob/master/LICENSE
 * @author  <andrewm@cyber-duck.co.uk>
 **/
class SocialShareNetwork extends DataObject 
{
    /**
     * Model database fields
     *
     * @since version 1.0.0
     *
     * @config array $db
     **/
    private static $db = [
        'Network'    => 'Varchar(512)',
        'NetworkUrl' => 'Varchar(512)',
        'Active'     => 'Boolean',
        'SortOrder'  => 'Int'
    ];

    /**
     * Has one relation fields
     *
     * @since version 1.0.0
     *
     * @config array $has_one
     **/
    private static $has_one = [
        'Image' => 'Image'
    ];

    /**
     * Fields in the Grid field
     *
     * @since version 1.0.0
     *
     * @config array $summary_fields
     **/
    private static $summary_fields = [
        'Thumbnail'  => 'Image',
        'Network'    => 'Network',
        'NetworkUrl' => 'URL',
        'Active'     => 'Active'
    ];

    /**
     * Create the CMS fields where we can enter any blocked data
     *
     * @since version 1.0.0
     * 
     * @return object
     **/
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $image = UploadField::create('Image');
        $image->setAllowedMaxFileNumber(1);
        $image->setFolderName('SocialShareNetwork');

        $fields->addFieldsToTab('Root.Main', TextField::create('Network'));
        $fields->addFieldsToTab('Root.Main', HiddenField::create('NetworkUrl'));
        $fields->addFieldsToTab('Root.Main', CheckboxField::create('Active'));
        $fields->addFieldsToTab('Root.Main', HiddenField::create('SortOrder'));
        $fields->addFieldsToTab('Root.Main', $image);
        $fields->addFieldsToTab('Root.Main', HeaderField::create('Social Network'), 'Network');

        return $fields;
    }

    /**
     * Write default data
     *
     * @since version 1.0.0
     * 
     * @return void
     **/
    public function requireDefaultRecords()
    {
        parent::requireDefaultRecords();

        if(SocialShareNetwork::get()->Count() == 0) {
            $object = new SocialShareNetwork();
            $object->Network = 'Facebook';
            $object->NetworkUrl = 'http://www.facebook.com/sharer.php?u={$AbsoluteLink}';
            $object->Active = 1;
            $object->write();

            $object = new SocialShareNetwork();
            $object->Network = 'Twitter';
            $object->NetworkUrl = 'https://twitter.com/share?url={$AbsoluteLink}&text={$Title}';
            $object->Active = 1;
            $object->write();

            $object = new SocialShareNetwork();
            $object->Network = 'Google+';
            $object->NetworkUrl = 'https://plus.google.com/share?url={$AbsoluteLink}';
            $object->Active = 1;
            $object->write();

            $object = new SocialShareNetwork();
            $object->Network = 'Linkedin';
            $object->NetworkUrl = 'http://www.linkedin.com/shareArticle?url={$AbsoluteLink}&title={$Title}';
            $object->Active = 1;
            $object->write();

            $object = new SocialShareNetwork();
            $object->Network = 'Reddit';
            $object->NetworkUrl = 'http://www.reddit.com/submit?url={$AbsoluteLink}&title={$Title}';
            $object->Active = 1;
            $object->write();
        }
    }

    /**
     * Get the DataObject social image thumbnail
     *
     * @since version 1.0.0
     * 
     * @return object
     **/
    public function getThumbnail()
    {
        return $this->Image()->CroppedImage(20, 20);
    }
}