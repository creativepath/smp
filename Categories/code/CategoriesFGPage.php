<?php

/*
 * ----------------------------------------------------------
 * Filename: CategoriesFGPage
 * Created by: silva, gerry
 * Creation date: Dec 21, 2012
 * Copyright(c) 2012 Creative Path Group Pty Ltd (Australia)
 * ----------------------------------------------------------
 */

class CategoriesFGPage extends Page {

    //Display names in Page Type drop down
    static $singular_name = 'CategoriesFGPage';
    static $plural_name = 'CategoriesFGPage';
    private static $has_many = array(
        'Categories' => 'Categories'
    );

}

/* ----------------------------------------------------------
 * Page Controller Class
 * ----------------------------------------------------------
 */

class CategoriesFGPage_Controller extends FGPage_Controller {

}

?>
