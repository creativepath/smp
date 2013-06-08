<?php

/*
 * ----------------------------------------------------------
 * Filename: CountriesModelAdmin.php
 * Created by: CreativePath
 * Creation date: Feb 25, 2012
 * Copyright(c) 2012 Creative Path Group Pty Ltd (Australia)
 * ----------------------------------------------------------
 */


class CurrenciesMA extends ModelAdmin {

    public static $managed_models = array('Currencies');
    private static $url_segment = 'Currency';
    static $menu_title = 'Currency';

    function init() {
        parent::init();
        //Trigger ModelAdmin submit
        Requirements::javascript('Currencies/js/admin.js');
    }
}
?>
