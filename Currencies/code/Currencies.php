<?php

/*
 * ----------------------------------------------------------
 * Filename: Currencies.php
 * Created by: CreativePath
 * Creation date: Feb 25, 2012
 * Copyright(c) 2012 Creative Path Group Pty Ltd (Australia)
 * ----------------------------------------------------------
 */

class CurrenciesDropdownField extends DropdownField {

    function __construct($name, $title = null, $value = "", $form = null) {
        parent::__construct($name, $title, self::getList(), $value, $form);
        parent::setEmptyString('--- Select ---');
    }

    function getList() {
        if ($list = DataObject::get('Currencies', '', 'Currency')) {
            return $list->map('Currency', 'CurrenciesDropDownDesc', 'Please select...');
        } else {
            return array('No records found');
        }
    }

}

class Currencies extends DataObject {

    //Display names in Page Type drop down
    static $singular_name = 'Currency';
    static $plural_name = 'Currencies';
    //ORM Database
    private static $db = array(
        'Currency' => 'Varchar(3)',
        'Description' => 'Varchar(40)',
    );
    //Add an SQL index for the key field
    private static $indexes = array(
        "Currency" => true
    );
    //Relationship with MVC Page
    private static $has_one = array(
        'CurrenciesPage' => 'CurrenciesPage'
    );
    //Sort fields in CMS
    private static $default_sort = "Currency ASC";
    //Search fields in CMS
    static $searchable_fields = array(
        'Currency',
        'Description'
    );
    //Sortable fields in CMS
    static $sortable_fields = array(
        'Currency',
        'Description'
    );
    //Used by ModelAdmin for export
    static $summary_fields = array(
        'Currency' => 'Currency',
        'Description' => 'Description',
    );

    // Populate Dropdown Description
    function CurrenciesDropDownDesc() {
        return $this->Currency . ' - ' . $this->Description;
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
            'Currency' => 'Currency',
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
        $fields = new FieldList(
                        new TextField('Currency', 'Currency'),
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