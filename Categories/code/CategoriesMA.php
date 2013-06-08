<?php

/*
 * ----------------------------------------------------------
 * Filename: CategoriesMA.php
 * Created by: CreativePath
 * Creation date: Feb 25, 2012
 * Copyright(c) 2012 Creative Path Group Pty Ltd (Australia)
 * ----------------------------------------------------------
 */


class CategoriesMA extends ModelAdmin {

    public static $managed_models = array('Categories');
    private static $url_segment = 'Categories';
    static $menu_title = 'Categories';

    function init() {
        parent::init();
        //Trigger ModelAdmin submit
        Requirements::javascript('Categories/js/admin.js');
    }
}
?>
