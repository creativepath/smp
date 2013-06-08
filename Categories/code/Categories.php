<?php

/*
 * ----------------------------------------------------------
 * Filename: Country.php
 * Created by: CreativePath
 * Creation date: Feb 25, 2012
 * Copyright(c) 2012 Creative Path Group Pty Ltd (Australia)
 * ----------------------------------------------------------
 */



/* Categories must exists in each Master Data Setup, we do not require...
 * $myDefaultCode = '--- Select ---'; <-- not required
 * parent::__construct($name, $title, self::getList(), $value, $form, $myDefaultCode);
 */

class CategoriesDropdownField extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        if ($list = Categories::get('Categories', '', 'Category')) {
            return $list->map('Categories', 'CategoriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class CategoriesMyClass extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        $member = Member::currentUser();
        if ($list = Categories::get('Categories', "MyClass='MyClass' && OrgID = '$member->OrgID'", 'Category')) {
            return $list->map('Category', 'CategoriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class CategoriesPartners extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        $member = Member::currentUser();
        if ($list = Categories::get('Categories', "MyClass='Partners' && OrgID = '$member->OrgID'", 'Category')) {
            return $list->map('Category', 'CategoriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class CategoriesParty extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        $member = Member::currentUser();
        if ($list = Categories::get('Categories', "MyClass='Party' && OrgID = '$member->OrgID'", 'Category')) {
            return $list->map('Category', 'CategoriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class CategoriesActivities extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        $member = Member::currentUser();
        if ($list = Categories::get('Categories', "MyClass='Activities' && OrgID = '$member->OrgID'", 'Category')) {
            return $list->map('Category', 'CategoriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class CategoriesMaterials extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        $member = Member::currentUser();
        if ($list = Categories::get('Categories', "MyClass='Materials' && OrgID = '$member->OrgID'", 'Category')) {
            return $list->map('Category', 'CategoriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class CategoriesFLocations extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        $member = Member::currentUser();
        if ($list = Categories::get('Categories', "MyClass='FLocations' && OrgID = '$member->OrgID'", 'Category')) {
            return $list->map('Category', 'CategoriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class CategoriesBOS extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        $member = Member::currentUser();
        if ($list = Categories::get('Categories', "MyClass='BillOfServices' && OrgID = '$member->OrgID'", 'Category')) {
            return $list->map('Category', 'CategoriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class CategoriesServices extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        $member = Member::currentUser();
        if ($list = Categories::get('Categories', "MyClass='Services' && OrgID = '$member->OrgID'", 'Category')) {
            return $list->map('Category', 'CategoriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class CategoriesServicesStatus extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        $member = Member::currentUser();
        if ($list = Categories::get('Categories', "MyClass='ServicesStatus' && OrgID = '$member->OrgID'", 'Category')) {
            return $list->map('Category', 'CategoriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class CategoriesServicesScope extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        $member = Member::currentUser();
        if ($list = Categories::get('Categories', "MyClass='ServicesScope' && OrgID = '$member->OrgID'", 'Category')) {
            return $list->map('Category', 'CategoriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class CategoriesServicesDefect extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        $member = Member::currentUser();
        if ($list = Categories::get('Categories', "MyClass='ServicesDefect' && OrgID = '$member->OrgID'", 'Category')) {
            return $list->map('Category', 'CategoriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class CategoriesServicesResolution extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        $member = Member::currentUser();
        if ($list = Categories::get('Categories', "MyClass='ServicesResolution' && OrgID = '$member->OrgID'", 'Category')) {
            return $list->map('Category', 'CategoriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class CategoriesPaymentTerms extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        $member = Member::currentUser();
        if ($list = Categories::get('Categories', "MyClass='PaymentTerms' && OrgID = '$member->OrgID'", 'Category')) {
            return $list->map('Category', 'CategoriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class CategoriesCostType extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        $member = Member::currentUser();
        if ($list = Categories::get('Categories', "MyClass='CostType' && OrgID = '$member->OrgID'", 'Category')) {
            return $list->map('Category', 'CategoriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class CategoriesRevenueType extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    static function getList() {
        $member = Member::currentUser();
        if ($list = Categories::get('Categories', "MyClass='RevenueType' && OrgID = '$member->OrgID'", 'Category')) {
            return $list->map('Category', 'CategoriesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class Categories extends DataObject {
    /* WARNING: UOM, Currency and Country classes already exists
     * It is important you use plural e.g. Categories etc
     * Otherwise  compile error appears!!!
     */

    //Display names in Page Type drop down
    static $singular_name = 'Category';
    static $plural_name = 'Categories';
    //ORM Database
    private static $db = array(
        'OrgID' => 'Varchar(20)',
        'MyClass' => 'Varchar(40)',
        'Category' => 'Varchar(40)',
        'SubCategory' => 'Varchar(40)',
        'Description' => 'Varchar(40)',
    );
    //Add an SQL index for the key field
    private static $indexes = array(
        "OrgID" => true,
        "MyClass" => true,
        "Category" => true
    );
    //Relationship with MVC Page
    private static $has_one = array(
        'CategoriesPage' => 'CategoriesPage'
    );
    //Sort fields in CMS
    private static $default_sort = "Category ASC";
    //Search fields in CMS
    static $searchable_fields = array(
        'OrgID',
        'MyClass',
        'Category',
        'Description'
    );
    //Sortable fields in CMS
    static $sortable_fields = array(
        'OrgID',
        'MyClass',
        'Category',
        'Description'
    );
    //Used by ModelAdmin for export
    static $summary_fields = array(
        'OrgID' => 'Organisation',
        'MyClass' => 'Class',
        'Category' => 'Category',
        'SubCategory' => 'SubCategory',
        'Description' => 'Description',
    );

    // Populate Dropdown Description
    function CategoriesDropDownDesc() {
        return $this->Category . ' - ' . $this->Description;
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
            'Category' => 'Category',
            'Description' => 'Description',
        );
        return $fields;
    }

    /*
     * ----------------------------------------------------------
     *  onBeforeWrite - Setup additional data before saving
     * ----------------------------------------------------------
     */

    function onBeforeWrite() {
        $member = Member::currentUser();
        /* 
         * We are using the values in the import file
         * $this->OrgID = $member->OrgID;
         */
        parent::onBeforeWrite();
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

    /* ----------------------------------------------------------
     *  CMSFields
     * ----------------------------------------------------------
     */

    /*
     * ----------------------------------------------------------
     *  Back end fields - getCMSFields() normally called in 
     *  class_page_controller
     * ----------------------------------------------------------
     */

    public function getCMSFields() {

        $member = Member::currentUser();

        //Define field set
        $fields = new FieldList(
                        new HiddenField('OrgID', 'OrgID', $member->OrgID),
                        new CategoriesMyClass('MyClass', 'Class'),
                        new TextField('Category', 'Category'),
                        new TextField('SubCategory', 'Sub-Category'),
                        new TextField('Description', 'Description')
        );
        return $fields;
    }

    public function getCMSBackEndFields() {

        $member = Member::currentUser();

        //Define field set
        $fields = new FieldList(
                        new TextField('OrgID', 'OrgID', $member->OrgID),
                        new CategoriesMyClass('MyClass', 'Class'),
                        new TextField('Category', 'Category'),
                        new TextField('SubCategory', 'Sub-Category'),
                        new TextField('Description', 'Description')
        );
        return $fields;
    }

}

?>