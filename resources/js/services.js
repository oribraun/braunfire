/**
 * Created by private on 19/06/2015.
 */
app.service(
    "ajaxService2",
    function( $http, $q ) {

        // Return public API.
        return({
            loadData: loadData,
            saveData: saveData,
            deleteData: deleteData
        });


        // ---
        // PUBLIC METHODS.
        // ---


        // I add a friend with the given name to the remote collection.
        function loadData(ctrl_name) {

            var request = $http({
                method: "post",
                url: ctrl_name+ "/ajax_list"
            });

            return( request.then( handleSuccess, handleError ) );

        }


        // I get all of the friends in the remote collection.
        function saveData() {

            var request = $http({
                method: "get",
                url: "api/index.cfm",
                params: {
                    action: "get"
                }
            });

            return( request.then( handleSuccess, handleError ) );

        }


        // I remove the friend with the given ID from the remote collection.
        function deleteData( id ) {

            var request = $http({
                method: "delete",
                url: "api/index.cfm",
                params: {
                    action: "delete"
                },
                data: {
                    id: id
                }
            });

            return( request.then( handleSuccess, handleError ) );

        }


        // ---
        // PRIVATE METHODS.
        // ---


        // I transform the error response, unwrapping the application dta from
        // the API response payload.
        function handleError( response ) {

            // The API response from the server should be returned in a
            // nomralized format. However, if the request was not handled by the
            // server (or what not handles properly - ex. server error), then we
            // may have to normalize it on our end, as best we can.
            if (
                ! angular.isObject( response.data ) ||
                ! response.data.message
            ) {

                return( $q.reject( "An unknown error occurred." ) );

            }

            // Otherwise, use expected error message.
            return( $q.reject( response.data.message ) );

        }


        // I transform the successful response, unwrapping the application data
        // from the API response payload.
        function handleSuccess( response ) {

            return( response.data );

        }

    }
);
app.service("ajaxService", ['$rootScope','$http', function($rootScope, $http) {
    var service = {
        entities: [],
        busy: false,
        page: 0,
        pageSize: 300,
        total:0,
        sortBy: {
            column:'id',
            order:'desc'
        },
        msgErr:''
    }
    service.setSortBy = function(ctrl,column){
        if(service.sortBy.column == column) {
            if(service.sortBy.order == "desc") {
                service.sortBy.order = "asc"
            } else {
                service.sortBy.order = "desc"
            }
        } else {
            service.sortBy = {
                column:column,
                order:'desc'
            };
        }

        service.loadData(ctrl);
    }
    service.resetPage = function(){
        service.page = 0;
    }
    service.loadData = function(ctrl){
        //console.log(this.busy);
        if (service.busy){
            return;
        }
        //console.log($rootScope.searching.text);
        var formData = {
            page:service.page++,
            page_size:service.pageSize,
            sort_by:service.sortBy
        };
        jQuery.extend(formData, $rootScope.searching);

        service.busy = true;
        return $http.post(ADMIN_PATH + ctrl + "/ajax_load",formData)
            .success(function(response){
                service.busy = false;
                if(response.err == 0){
                    service.entities = response.entities;
                    $rootScope.entities = response.entities;
                    console.log($rootScope.entities);
                } else {
                    service.msgErr = response.errdesc;
                }
            })
            .error(function(){
                service.busy = false;
                service.msgErr = 'קרתה תקלה';
            })
            .then(function(result) {
                //resolve the promise as the data
                return result.data;
            });
    }

    service.saveData = function(ctrl, formData, close_window){
        if (service.busy){
            return;
        }
        service.busy = true;
        return $http.post(ADMIN_PATH + ctrl + '/ajax_save',formData)
            .success(function(response){
                service.busy = false;
                if (response.err==0){
                    if(close_window) {
                        window.close();
                        return;
                    }
                    window.location.href = ADMIN_PATH + ctrl;
                }
            })
            .error(function(){
                service.busy = false;
                service.msgErr = "קרתה תקלה";
            })
            .then(function(result) {
                //resolve the promise as the data
                return result.data;
            });
    }

    service.deleteData = function(evt, ctrl, formData){
        if (service.busy){
            return;
        }
        service.busy = true;
        var popoverContent = $('<form><label>האם ברצונך למחוק רשומה זו?</label>' +
        '<div class="form-actions">' +
        '<input type="button" class="btn btn-danger btn-delete" value="מחק" />' +
        '<input type="button" class="btn btn-default btn-cancel" value="ביטול" />' +
        '</div></form>');
        var de = $(evt.target);
        de.popover({
            animation : true,
            html : true,
            content : popoverContent,
            title : 'אשר מחיקה',
            placement : 'right',
            container : 'body'
        }).popover('show');
        popoverContent.find('.btn-cancel').on('click',(function(){
            console.log("cancel");
            service.busy = false;
            de.popover('destroy');
        }));
        popoverContent.find('.btn-delete').on('click',(function() {
            $.ajax({
                'type' : 'POST', 'dataType' : 'json', 'data' : formData,
                'url' : ADMIN_PATH + "/" + ctrl_name + '/ajax_delete',
                'success' : function(response){
                    if (response.err > 0){
                        return;
                    }
                    de.popover('destroy');
                    var pos = $rootScope.entities.map(function(e) {console.log(e.id);return parseInt(e.id)}).indexOf(response.id);
                    //console.log(pos)
                    //$rootScope.entities.splice(pos,1);
                    //console.log(response.id);
                    //var pos = $.grep($rootScope.entities, function(e){console.log(e.id); return e.id});
                    //console.log(pos);
                    $rootScope.entities.splice(pos,1)
                    $rootScope.$apply();
                    service.busy = false;
                },
                'error' : function(){
                }
            });
        }));
    };

    service.getFormData = function(){
        var formData = {};
        for(f in this.fields){
            if ( typeof(this.fields[f].getValue) == 'function' ) {
                formData[f] = this.fields[f].getValue();
            } else {
                formData[f] = this.fields[f].value;
            }
        }
        return formData;
    };

    return service;

}]);
app.factory('ajaxService3', ['$http', function($http){

    var service = {
        _timeout : null,
        path : '',
        title	: 'נתונים',
        entities : [],
        filters : {},
        filters_form : {},
        page : 1,
        pageSize : 30,
        total : 0,
        selectedRecords : {},
        sortBy : {
            column 	: 'id',
            order 	: 'desc'
        },
        keyword : '',
        columns : [],
        actions : [],
        url_list : '',
        checkAll_state : false,

        entity_id : 0,
        msgText : '',
        msgMode : 'error'
    };


    service.getFormData = function(){
        var formData = {};
        for(f in this.fields){
            if ( typeof(this.fields[f].getValue) == 'function' ) {
                formData[f] = this.fields[f].getValue();
            } else {
                formData[f] = this.fields[f].value;
            }
        }
        return formData;
    };
    service.getPath = function(){
        return this.path;
    };

    service.defaultActions = {
        edit	: {
            title	: 'עריכה',
            icon	: 'pencil',
            link	: {
                'url'	: '{PATH}/edit/{id}',
                'target': '_self'
            }
        },
        delete	: {
            class	: 'btn-danger',
            title	: 'מחיקה',
            icon	: 'trash-o',
            action	: function(element, evt, path, ctrl){
                var popoverContent = $('<form><label>האם ברצונך למחוק רשומה זו?</label>' +
                '<div class="form-actions">' +
                '<input type="button" class="btn btn-danger btn-delete" value="מחק" />' +
                '<input type="button" class="btn btn-default btn-cancel" value="ביטול" />' +
                '</div></form>');
                var de = $(evt.target);
                de.popover({
                    animation : true,
                    html : true,
                    content : popoverContent,
                    title : 'אשר מחיקה',
                    placement : 'right',
                    container : 'body'
                }).popover('show');
                popoverContent.find('.btn-cancel').click(function(){
                    de.popover('destroy');
                });
                popoverContent.find('.btn-delete').click(function(){
                    $.ajax({
                        'type' : 'POST', 'dataType' : 'json', 'data' : { id_list : [element.id]},
                        'url' : ctrl.path+'/ajax_delete',
                        'success' : function(response){
                            if (response.err > 0){
                                return;
                            }
                            ctrl.loadData();
                            de.popover('destroy');
                        },
                        'error' : function(){
                        }
                    });
//					$http.post(ctrl.path+'/ajax_delete', { id_list : [element.id]})
//					.success(function(response){
//						ctrl.loadData();
//						de.popover('destroy');
//					}).error(function(){
//							console.log('error');
//						});
//					console.log('sent!');
                });
            }
        }
    };


    service.loadData = function(){
        var $this = this;
        clearTimeout(this._timeout);
        var urlList = this.url_list;
        $.ajax({
            'type' : 'POST', 'dataType' : 'json', data : this.getQueryData(),
            'url' : urlList,
            'success' : function(response){
                $this.entities = response.entities;
                $this.total = response.total;
                $this.scope.$apply();
            },
            'error' : function(){
            }
        });
    };
    service.getQueryData = function(){
        var $this = this;
        var fl = {};
        for(var i=0; i<$this.filters_form.length; i++){
            fl[$this.filters_form[i].param] = $this.filters[$this.filters_form[i].param];
        }
        return {
            dbtable : {
                page 		: $this.page,
                page_size	: $this.pageSize,
                search_all	: $this.keyword,
                sortby		: $this.sortBy,
                filters		: fl
            }
        };
    };
    service.getRowClass = function(entity){
        return '';
    };
    service.fetch = function(entity, field, idx){
        return (typeof(this.columns[idx].viewer) == 'function') ?
            this.columns[idx].viewer(entity) : ((entity[field.name] == null) ? '' : htmlEntities(entity[field.name]));
    };
    service.visibleFirst = function(){
        return (this.page-1) * this.pageSize + 1;
    };
    service.visibleLast = function(){
        return Math.min(this.page*this.pageSize, this.entities.length);
    };
    service.displayText = function(){
        if (this.entities.length == 0){
            return 'אין נתונים';
        }
        return 'מציג ' + this.visibleFirst() + ' - ' + this.visibleLast() + ' מתוך '+this.total;
    };
    service.getNumPages = function(){
        return this.total == 0 ? 0 : Math.ceil(this.total/this.pageSize);
    };
    service.paginate = function(){
        return '';
    };
    service.isSelected = function(id){
        return (typeof(this.selectedRecords[id]) != 'undefined' && this.selectedRecords[id]) ? 'info' : '';
    };
    service.getPageRange = function(){
        var ans = [];
        var n = this.getNumPages();
        for(var i=1; i<=n; i++){
            if (Math.abs(i-this.page) <= 3){
                ans.push(i);
            }
        }
        return ans;
    };
    service.setPage = function(n){
        if (n < 1) n = 1;
        if (n > this.getNumPages()){
            n = this.getNumPages();
        }
        if (this.page != n){
            this.page = n;
            this.loadData();
        }
    };
    service.setPageSize = function(i){
        if (this.pageSize == i){
            return false;
        }
        this.pageSize = i;
        this.loadData();
        return false;
    };
    service.delayedLoad = function(){
        var $this = this;
        if (this._timeout != null){
            clearTimeout(this._timeout);
        }
        this._timeout = setTimeout(function(){
            $this.loadData();
        }, 500);
    };
    service.toggleCheckAll = function(){
        if (this.checkAll_state){
            for(var i=0; i<this.entities.length; i++){
                this.selectedRecords[this.entities[i].id] = true;
            }
        } else {
            this.selectedRecords = {};
        }
    };
    service.setSortBy = function(col){
        if (this.sortBy.column == col){
            this.sortBy.order = (this.sortBy.order == 'asc') ? 'desc' : 'asc';
        } else {
            this.sortBy.column = col;
            this.sortBy.order = 'asc';
        }
        this.loadData();
    };
    service.generateActionUrl = function(url, element){
        if (typeof(url) == 'undefined' || url == ''){
            return '';
        }
        url = url.replace('{PATH}', this.getPath());
        for(at in element){
            if (typeof(element[at]) != 'function'){
                while(url.indexOf('{'+at+'}') > -1){
                    url = url.replace('{'+at+'}', element[at]);
                }
            }
        }
        return url;
    };
    service.deleteSelected = function(evt){
        var itemsToDelete = [];
        for(var id in this.selectedRecords){
            if (this.selectedRecords[id]){
                itemsToDelete.push(id);
            }
        }
        if (itemsToDelete.length==0){
            return;
        }
        var $this = this;

        var popoverContent = $('<form><label>האם ברצונך למחוק את הרשומות הבאות?</label>' +
        itemsToDelete.join(', ') +
        '<div class="form-actions">' +
        '<input type="button" class="btn btn-danger btn-delete" value="מחק" />' +
        '<input type="button" class="btn btn-default btn-cancel" value="ביטול" />' +
        '</div></form>');
        var de = $(evt.target);
        de.popover({
            animation : true,
            html : true,
            content : popoverContent,
            title : 'אשר מחיקה',
            placement : 'bottom',
            container : 'body'
        }).popover('show');
        popoverContent.find('.btn-cancel').click(function(){
            de.popover('destroy');
        });
        popoverContent.find('.btn-delete').click(function(){
            $http.post($this.path+'/ajax_delete', { id_list : itemsToDelete})
                .success(function(){
                    $this.loadData();
                    de.popover('destroy');
                });
        });

    };
    return service;
}]);
