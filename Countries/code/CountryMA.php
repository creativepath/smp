<?php

/*
 * ----------------------------------------------------------
 * Filename: CountriesMA.php
 * Created by: CreativePath
 * Creation date: Feb 25, 2012
 * Copyright(c) 2012 Creative Path Group Pty Ltd (Australia)
 * ----------------------------------------------------------
 */


class CountriesMA extends ModelAdmin {

    public static $managed_models = array('Countries');
    private static $url_segment = 'Countries';
    static $menu_title = 'Countries';

    function init() {
        parent::init();
        //Trigger ModelAdmin submit
        Requirements::javascript('Countries/js/admin.js');
    }
}
?>
