<?php

/*
 * ----------------------------------------------------------
 * Filename: Country.php
 * Created by: CreativePath
 * Creation date: Feb 25, 2012
 * Copyright(c) 2012 Creative Path Group Pty Ltd (Australia)
 * ----------------------------------------------------------
 */

class CountriesDropdownField extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        if ($list = Countries::get('Countries', '', 'Country')) {
            return $list->map('Country', 'CountriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class Countries extends DataObject {
    /* WARNING: UOM, Currency and Country classes already exists
     * It is important you use plural e.g. Countries etc
     * Otherwise  compile error appears!!!
     */

    //Display names in Page Type drop down
    static $singular_name = 'Country';
    static $plural_name = 'Countries';
    //ORM Database
    private static $db = array(
        'Country' => 'Varchar(3)',
        'Description' => 'Varchar(40)',
    );
    //Add an SQL index for the key field
    private static $indexes = array(
        "Country" => true
    );
    //Relationship with MVC Page
    private static $has_one = array(
        'CountriesPage' => 'CountriesPage'
    );
    //Sort fields in CMS
    private static $default_sort = "Country ASC";
    //Search fields in CMS
    static $searchable_fields = array(
        'Country',
        'Description'
    );
    //Sortable fields in CMS
    static $sortable_fields = array(
        'Country',
        'Description'
    );
    //Used by ModelAdmin for export
    static $summary_fields = array(
        'Country' => 'Country',
        'Description' => 'Description',
    );

    // Populate Dropdown Description
    function CountriesDropDownDesc() {
        return $this->Country . ' - ' . $this->Description;
    }

    /*
     * ----------------------------------------------------------
     * User defined routine to define fields for our
     * Non-DOM Forms
     * ModelAdmin summary_fields
     * ModelAdmin download fields
     * ----------------------------------------------------------
     */

    public function getFormFields() {
        $fields = array(
            'Country' => 'Country',
            'Description' => 'Description',
        );
        return $fields;
    }

    /*
     * ----------------------------------------------------------
     *  Back end fields - getCMSFields() normally called in 
     *  class_page_controller
     * ----------------------------------------------------------
     */

    public function getCMSFields() {
        $fields = $this->getCMSFieldsPopup();
        return $fields;
    }

    /*
     * ----------------------------------------------------------
     *  Pop up used by DataObject_Manager module
     * ----------------------------------------------------------
     */

    public function getCMSFieldsPopup() {

        //Define field set
        $fields = new FieldSList(
                        new TextField('Country', 'Country'),
                        new TextField('Description', 'Description')
        );
        return $fields;
    }

    /*
     * ----------------------------------------------------------
     *  onBeforeWrite - Setup additional data before saving
     * ----------------------------------------------------------
     */

    function onBeforeWrite() {
        parent::onBeforeWrite();
    }

    /*
     * ----------------------------------------------------------
     *  MyLink called in template <<Class>>.ss
     * 
     * Example,
     * 
     * From CountriesPage.ss > obj->MyLink() > 
     *    objPage->show() > Page.ss > objPage->Form()
     * 
     * <% control MyObjPagination.Pagination %>
     * <li><a href="$MyLink">$Description $Country</a></li> 
     * <% end_control %><br>
     * ----------------------------------------------------------
     */

    public function MyLink() {

        //testing url
        $temp = $this->CountriesPage();   //class
        $temp = $temp->Link(); 
        $temp = Director::absoluteBaseURL(); //
        $temp = DataObject::get_one('CountriesPage'); //class
        if ($temp) {
            $temp = $temp->Link('show/' . $this->ID); 
        }

        $obj = DataObject::get_one('CountriesPage');
        if ($obj) {
            $page = $obj->Link('show/' . $this->ID);
            if ($page) {
                return $page;
            }
        }
    }

    /*
     *   Authority Checking
     */

    public function canView($member = null) {
        //return true;
        $currUserID = Member::currentUserID();
        return Permission::check('ADMIN', 'any', $member) || ($currUserID == $this->MemberID);
        //return ($currUserID == $this->MemberID);
    }

    /**
     * @param Member $member
     * @return boolean
     */
    public function canEdit($member = null) {
        $currUserID = Member::currentUserID();
        return Permission::check('ADMIN', 'any', $member) || ($currUserID == $this->MemberID);
        //return ($currUserID == $this->MemberID);
    }

    /**
     * @param Member $member
     * @return boolean
     */
    public function canDelete($member = null) {
        $currUserID = Member::currentUserID();
        return Permission::check('ADMIN', 'any', $member) || ($currUserID == $this->MemberID);
        //return ($currUserID == $this->MemberID);
    }

    /**
     * @todo Should canCreate be a static method?
     *
     * @param Member $member
     * @return boolean
     */
    public function canCreate($member = null) {
        return true;
        //$currUserID = Member::currentUserID();
        //return Permission::check('ADMIN', 'any', $member) || ($currUserID == $this->MemberID);
        //return ($currUserID == $this->MemberID);
    }

}

?>