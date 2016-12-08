<?php

class SocialShareNetwork extends DataObject 
{
    private static $db = [
        'Network'    => 'Varchar(512)',
        'NetworkUrl' => 'Varchar(512)',
        'Active'     => 'Boolean',
        'SortOrder'  => 'Int'
    ];

    private static $has_one = [
        'Image' => 'Image'
    ];

    private static $summary_fields = [
        'Thumbnail'  => 'Image',
        'Network'    => 'Network',
        'NetworkUrl' => 'URL',
        'Active'     => 'Active'
    ];

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

    public function getThumbnail()
    {
        return $this->Image()->CroppedImage(20, 20);
    }
}