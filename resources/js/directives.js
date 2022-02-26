/**
 * Created by private on 19/06/2015.
 */

app.directive('deletePopover', function () {
    return {
        restrict: 'A',
        template: '<i class="fa fa-trash-o"></i>',
        link: function (scope, el, attrs) {
            scope.label = attrs.popoverLabel;
            $(el).popover({
                trigger: 'click',
                html: true,
                content: $('<form><label>Are You Sure ?</label>' +
                '<div class="form-actions">' +
                '<input type="button" class="btn btn-danger btn-delete" id="delete" ng-click="delete()" value="delete" />' +
                '<input type="button" class="btn btn-cancel" id="cancel" value="cancel" />' +
                '</div></form>'),
                placement: attrs.popoverPlacement
            });
        }
    };
});

app.directive("imagedrop", ['$parse',function ($parse) {
    return {
        restrict: "EA",
        link: function (scope, element, attrs) {
            //The on-image-drop event attribute
            var onImageDrop = $parse(attrs.onImageDrop);

            //When an item is dragged over the document, add .dragOver to the body
            var onDragOver = function (e) {
                e.preventDefault();
                $(element).addClass("dragOver");
            };

            //When the user leaves the window, cancels the drag or drops the item
            var onDragEnd = function (e) {
                e.preventDefault();
                $(element).removeClass("dragOver");
            };

            var onDragLeave = function (e) {
                e.preventDefault();
                $(element).removeClass("dragOver");
            };

            //When a file is dropped on the overlay
            var loadFile = function (file) {
                scope.uploadedFile = file;
                scope.file_number = $(element).attr("file_number");
                scope.element = element;
                scope.$apply(onImageDrop(scope));
            };

            //Dragging begins on the document (shows the overlay)
            $(element).bind("dragover", onDragOver);
            $(element).bind("dragleave", onDragLeave);
            $(element).bind("click", function(e) {
                //console.log($(e.target));
                if($(e.target).hasClass("fa") || $(e.target).hasClass("primary_button")) {
                    return;
                }
                scope.file_number = $(element).attr("file_number");
                scope.element = element;
                $('#file-upload').click();
                //loadFile(e.originalEvent.dataTransfer.files[0]);
            });

            //Dragging ends on the overlay, which takes the whole window
            element.bind("dragleave", onDragEnd)
                .bind("drop", function (e) {
                    onDragEnd(e);
                    loadFile(e.originalEvent.dataTransfer.files[0]);
                    /* This is the file */
                });
        }
    };
}]);

app.directive('datepicker', function() {
    return {
        restrict: 'A',
        require : 'ngModel',
        link : function (scope, element, attrs, ngModelCtrl) {
            $(function(){
                //element.datepicker('setDate', new Date());
                element.datepicker({
                    format:'dd/mm/yyyy',
                    dateFormat:'dd/mm/yyyy',
                    onSelect:function (date) {
                        scope.$apply(function () {
                            ngModelCtrl.$setViewValue(date);
                        });
                    }
                }).on('changeDate', function(e){
                    $(this).datepicker('hide');
                });;
            });
        }
    }
});

app.directive('autoComplete', function($timeout) {
    return function(scope, iElement, iAttrs) {
        console.log(scope[iAttrs.uiItems])
        iElement.autocomplete({
            source: scope[iAttrs.uiItems],
            select: function() {
                $timeout(function() {
                    iElement.trigger('input');
                }, 0);
            }
        }).data("uiAutocomplete")._renderItem = function(ul, item) {
            return item.text;
        };
    };
});
