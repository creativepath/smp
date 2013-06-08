jQuery.noConflict();
jQuery(function($) { 
    
    $("#flexCategories").flexigrid({

        url : baseURL + 'cat/getdata',
        dataType : 'json',
        colModel : [ {
            display : 'ID',
            name : 'ID',
            width : 50,
            sortable : true,
            align : 'center'
        }, {
            display : 'Class',
            name : 'MyClass',
            width : 200,
            sortable : true,
            align : 'center'
        }, {
            display : 'Category',
            name : 'Category',
            width : 100,
            sortable : true,
            align : 'left'
        }, {            
            display : 'Sub-Category',
            name : 'SubCategory',
            width : 100,
            sortable : true,
            align : 'left'
        }, {            
            display : 'Description',
            name : 'Description',
            width : 200,
            sortable : true,
            align : 'left'
        } ],
        buttons : [ {
            name : 'Edit',
            bclass : 'Edit',
            onpress : doCommand
        }, {
            name : 'Delete',
            bclass : 'Delete',
            onpress : doCommand
        },{
            name : 'Add',
            bclass : 'Add',
            onpress : doCommand
        },{            
            name : 'Copy',
            bclass : 'Copy',
            onpress : doCommand
        },{            
            separator : true
        },{
            name : 'Export',
            bclass : 'Export',
            onpress : doCommand
        },{            
            name : 'Import',
            bclass : 'Import',
            onpress : doCommand
        },{
            separator : true
        } ],			
        searchitems : [ {
            display : 'Class',
            name : 'MyClass'
        }, {
            display : 'Category',
            name : 'Category'
        }, {            
            display : 'Sub-Category',
            name : 'SubCategory'
        }, {            
            display : 'Description',
            name : 'Description',
            isdefault : true
        } ],
        sortname : "MyClass",
        sortorder : "ASC",
        usepager : true,
        title : 'Categories',
        useRp : true,
        rp : 15,
        showTableToggleBtn : true,
        onSubmit : addFormData,
        height : 300
    });   
    $('#sform').submit(function() {
        $('#flexCategories').flexOptions({
            newp : 1
        }).flexReload();
        return false;
    });
    
    function doCommand(com, grid) {
                   
        switch(com)
        {
            case 'Edit':
                $('.trSelected', grid).each(function() {
                    var id = $(this).attr('id');
                    id = id.substring(id.lastIndexOf('row') + 3);
                    window.location.href = baseURL + 'cat/doEdit/' + id;
                   
                });
                break;
                
            case 'Delete':
                $('.trSelected', grid).each(function() {
                    var id = $(this).attr('id');
                    id = id.substring(id.lastIndexOf('row') + 3);
                    var cont = confirm('Delete record ID, ' + id + ' ?');
                    if(cont) {
                        //window.location.href = baseURL + 'cat/doDelete/' + id;
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: baseURL + 'cat/doAjaxDelete/'+id,
                            //data: "parentID="+parentid+'&ID='+id,
                            success: function(data){
                                $("#flexCategories").flexReload();
                            }
                        });                        
                    }
                });
                break;

            case 'Copy':
                $('.trSelected', grid).each(function() {
                    var id = $(this).attr('id');
                    id = id.substring(id.lastIndexOf('row') + 3);
                    var cont = confirm('Copy record ID, ' + id + ' ?');
                    if(cont) {
                        //window.location.href = baseURL + 'cat/doDelete/' + id;
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: baseURL + 'cat/doAjaxCopy/'+id,
                            success: function(data){
                                $("#flexCategories").flexReload();
                            }
                        });                        
                    }
                });
                break;
                
            case 'Add':
                window.location.href = baseURL + 'cat/doAdd/'
                break;
                
            case 'Export':
                window.location.href = baseURL + 'cat/doExport';                 
                break;     
                
            case 'Import':
                window.location.href = baseURL + 'cat/doImport';                 
                break;                    
                
            case 'Print':
                window.location.href = baseURL + 'cat/doPrint';         
                break;
                
            default:
        //do nothing
        }
    }
    function addFormData() {
        //passing a form object to serializeArray will get the valid data 
        //from all the objects, but, if the you pass a non-form object, 
        //you have to specify the input elements that the data will come from
        var dt = $('#sform').serializeArray();
        $("#flexCategories").flexOptions({
            params : dt
        });
        return true;
    }
    $('.Delete').submit(function() {
        $('#flexCategories').flexReload();
        return false;
    });
    
});

