<?php

/* -------------------------------------------------------
  Creative Path Group Pty Ltd
  Sydney Australia
  Program: CategoriesPage
  Date:    23/09/2012
  Author:  cpg_admin
  -------------------------------------------------------- */

class CategoriesPage extends Page {

    //CMS Display names 
    static $singular_name = 'Categories';
    static $plural_name = 'Categories';
    private static $db = array();
    private static $has_many = array(
        'Categories' => 'Categories'
    );

    //  Add into CMS
    public function getCMSFields() {
        $fields = parent :: getCMSBackendFields();
        $config = GridFieldConfig_RecordEditor::create(12); //config with edit
        $config->addComponents(new GridFieldExportButton());
        $itemsInGrid = Categories::get(); // get a list of object you want to show
        $gridField = new GridField("Categories", "List Categories", $itemsInGrid, $config);
        $fields->addFieldToTab("Root.Categories", $gridField); // add the grid field to a tab in the CMS	 
        return $fields;
    }

}

class CategoriesPage_Controller extends FGPage_Controller {

    public function init(string $mydb = null, string $keyfield = null, string $urlprefix = null, string $urllist = null) {
        parent::init('Categories', false, 'cat', 'catFG');
        $this->SetTitle('Category');
        $this->setsort('MyClass', 'ASC');
        $this->setfieldnames('MyClass,Category,SubCategory,Description');
    }

    public function Title() {
        return "Category";
    }

}

?>