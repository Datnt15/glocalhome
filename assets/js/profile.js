jQuery(document).ready(function($) {
	// $.fn.editable.defaults.mode = 'inline';
	$.fn.editable.defaults.inputclass = 'form-control';
	$('#fullname').editable({success: function(response, newValue) { update_user_data('fullname', newValue);}});
	$('#email').editable({success: function(response, newValue) { update_user_data('email', newValue);}});
	$('#phone').editable({success: function(response, newValue) { update_user_data('phone', newValue);}});
	$('#address').editable({success: function(response, newValue) { update_user_data('address', newValue);}});
	$('#passport_number').editable({success: function(response, newValue) { update_user_data('passport_number', newValue);}});
	$('#ID_number').editable({success: function(response, newValue) { update_user_data('ID_number', newValue);}});
	function update_user_data(_field, _value){
		$.post($('base').attr('href')+'admin/update_user_data', {field: _field, value: _value}, function() {;});
	}
	var table = $('#sample_1');
    // begin first table
    var oTable = table.dataTable({


        "bStateSave": true, 

        "lengthMenu": [
            [5, 15, 20, -1],
            [5, 15, 20, "All"]
        ],
        // set the initial value
        "pageLength": 5,            
        "pagingType": "bootstrap_full_number",
        "columnDefs": [
            {  // set default column settings
                'orderable': false,
                'targets': [0]
            }, 
            {
                "searchable": false,
                "targets": [0]
            },
            {
                "className": "dt-right", 
                //"targets": [2]
            }
        ],
        "order": [
            [1, "asc"]
        ] // set first column as a default sort by asc
    });


    table.on('click', '.del-room', function (e) {
        e.preventDefault();
        var _this = $(this), nRow = _this.parents('tr')[0], _room = _this.attr('data-room');
        $.post(
            $('base').attr('href')+'admin/update_room_meta_data', 
            {
                room: _room, 
                field: 'delete_room', 
                accessToken: $("#delete-room-accessToken").val()}, 
            function(data) {
                data = JSON.parse(data);
                add_alert(data.type, data.msg, data.title);
                if (data.type == 'success') {
                    oTable.fnDeleteRow(nRow);
                }
            }
        );
    });
    var input = document.getElementById("file_input"), formdata = false;

    if (window.FormData) {
        formdata = new FormData();
    }
    if (input.addEventListener) {
        if (document.querySelector('#preview')) {
           
            input.addEventListener("change", previewImages, false);
            return false;
        }
        input.addEventListener("change", function (evt) {
            App.blockUI({
                target: '#tab_images',
                animate: true
            });

            var i = 0, len = this.files.length, img, reader, file;
            for ( ; i < len; i++ ) {
                file = this.files[i];
      
                if (!!file.type.match(/image.*/)) {
                    if (formdata) {
                        formdata.append("images[]", file);
                    }
                } 
            }
            formdata.append('action', 'upload_image');
            formdata.append('room', input.getAttribute('data-room'));
            formdata.append('accessToken', $("#accessToken").val());
            if (formdata) {
                $.ajax({
                    url: $('base').attr('href')+'admin/upload_room_image',
                    type: "POST",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function (res){
                        res = JSON.parse(res);
                        $("#gallery").append(res.html);
                        App.unblockUI('#tab_images');
                        add_alert(res.type, res.msg, res.title);
                    }
                });
            }
        }, false);
    }
    function previewImages() {
        App.blockUI({
            target: '#tab_images',
            animate: true
        });
        var preview = document.querySelector('#preview');
          
        if (this.files) {
            [].forEach.call(this.files, readAndPreview);
            App.unblockUI('#tab_images');
        }

        function readAndPreview(file) {

            // Make sure `file.name` matches our extensions criteria
            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            } 
            
            var reader = new FileReader();
            
            reader.addEventListener("load", function() {
                var image = new Image();
                image.height = 200;
                image.title  = file.name;
                image.src    = this.result;
                image.style.margin = '5px';
                preview.appendChild(image);
            }, false);
            
            reader.readAsDataURL(file);
            
        }

    }

    $("#gallery").on('click', '.set_thumbnail', function(){
        var _this = $(this), $_data = _this.data();
        $.post(
            $('base').attr('href')+'admin/update-room-meta-data', 
            {id: $_data.room, field: 'room_thumbnail', value: $_data.value, accessToken: $("#accessToken").val()}, 
            function(data) {
                data = JSON.parse(data);
                add_alert(data.type, data.msg, data.title);
                if (data.type=='success') {
                    $(".mt-element-ribbon").remove();
                    _this.parents('.mt-overlay-3.mt-overlay-3-icons').prepend(`
                        <div class="mt-element-ribbon">
                            <div class="ribbon ribbon-left ribbon-shadow ribbon-border-dash-hor ribbon-color-success uppercase">
                                <div class="ribbon-sub ribbon-clip ribbon-left"></div> Thumbnail
                            </div>
                        </div>`
                    );
                }
            }
        );
    });

    $("#gallery").on('click', '.delete_image', function(){
        var _this = $(this), $_data = _this.data();
        $.post(
            $('base').attr('href')+'admin/delete_image', 
            {id: $_data.id, room: $_data.room, value: $_data.value, accessToken: $("#accessToken").val()}, 
            function(data) {
                data = JSON.parse(data);
                add_alert(data.type, data.msg, data.title);
                if (data.type=='success') {
                    _this.parents(".mt-element-overlay").remove();
                }
            }
        );
    });

    function add_alert(type, message, title){
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "1000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        toastr[type](message, title);
    }

});