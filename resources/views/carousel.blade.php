@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="padding-top: 20px">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                  <form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
                        <div id="drop">
                            <p align="center">Browse the data files from the local machine to be uploaded</p>
                            <div class="text-center">
                                <!-- Browse files with a hidden input file element -->
                                <a class="btn btn-info btn-md">Browse</a>
                                <input id="uploadFileBtn" type="file" name="upl" multiple />
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
        <div id="fileListTable" class="col-md-10 col-md-offset-1 files-table">
            <div class="panel panel-default col-sm-12">
                <div id="uploadedFiles" class="panel-body">
                    <p class="text-center">List of uploaded files<i id="closeFileList" class="fa fa-times" aria-hidden="true"></i></p>
                    <ul>
                        <!-- The file uploads will be shown here -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Upload Success Modal -->
<div class="modal fade" id="uploadFileSuccess" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload Success!</h4>
            </div>
        <div class="modal-body">
            <p>The selected file(s) have been uploaded successfully.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">OK</button>
        </div>
      </div>      
    </div>
</div>

<!-- Invalid File Modal -->
<div class="modal fade" id="invalidFileModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Error!</h4>
            </div>
        <div class="modal-body">
            <p>Invalid file format. Please select only .csv files.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">OK</button>
        </div>
      </div>      
    </div>
</div>

@endsection

@section('footer')
<style>
    /* -----------------------------------------------
    CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel { margin-bottom: 0px; }

    /* Since positioning the image, we need to help out the caption */
    /* Declare heights because of positioning of img element */
    .carousel .item { height: 400px; /*background-color:#555;*/ }

    .carousel img { /*position: absolute;*/ /*top: 0;*/ /*left: 0;*/ min-height: 400px; }

    /* RESPONSIVE CSS
    -------------------------------------------------- */
    @media (min-width: 768px) {
        /* Bump up size of carousel content */
        .carousel-caption p { margin-bottom: 20px; font-size: 21px; line-height: 1.4; }
    }

    img.img-responsive { display: block; margin-left: auto; margin-right: auto; }
    /*span.icon-next, span.icon-prev { margin: 0px !important; position: static !important; }*/
    span.icon-prev { margin-left: -30px !important }
    span.icon-next { margin-right: -30px !important }

    #fileListTable { display: none; }

    #uploadFileBtn { visibility: hidden; }

    #closeFileList {
        float: right;
        font-size: 16px;
        color: #ababab;
        cursor: pointer;
    }

</style>
<script>
    $(function(){

    var ul = $('#uploadedFiles ul');

    $('#drop a').click(function(){
        // Simulate a click on the file input button
        // to show the file browser dialog
        $(this).parent().find('input').click();
    });

    // Initialize the jQuery File Upload plugin
    $('#upload').fileupload({

        // This element will accept file drag/drop uploading
        dropZone: $('#drop'),

        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        add: function (e, data) {

            var wrongFile = false;
            for (var i=0; i<data.files.length; i++) {
                var ext = data.files[i].name.substr(-3);
                if(ext != "csv")  {
                    wrongFile = true;
                    $("#invalidFileModal").modal();
                    return false;
                }
            }

            if(!wrongFile) {

                $("#fileListTable").show();

                var tpl = $('<li class="working"><input type="text" value="0" data-width="48" data-height="48"'+
                    ' data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" /><p></p><span></span></li>');

                // Append the file name and file size
                tpl.find('p').text(data.files[0].name)
                             .append('<i>' + formatFileSize(data.files[0].size) + '</i>');

                // Add the HTML to the UL element
                data.context = tpl.appendTo(ul);

                // Initialize the knob plugin
                tpl.find('input').knob();

                // Listen for clicks on the cancel icon
                tpl.find('span').click(function(){

                    if(tpl.hasClass('working')){
                        jqXHR.abort();
                    }

                    tpl.fadeOut(function(){
                        tpl.remove();
                    });

                });

                // Automatically upload the file once it is added to the queue
                var jqXHR = data.submit();
            }
        },

        progress: function(e, data){

            // Calculate the completion percentage of the upload
            var progress = parseInt(data.loaded / data.total * 100, 10);

            // Update the hidden input field and trigger a change
            // so that the jQuery knob plugin knows to update the dial
            data.context.find('input').val(progress).change();

            if(progress == 100){
                data.context.removeClass('working');
                $("#uploadFileSuccess").modal();
            }
        },

        fail:function(e, data){
            // Something has gone wrong!
            data.context.addClass('error');
        }
    });

    $("#closeFileList").click(function(){
        $("#fileListTable").hide();
        $("#uploadedFiles ul").empty();
    });

    // Prevent the default action when a file is dropped on the window
    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });

    // Helper function that formats the file sizes
    function formatFileSize(bytes) {
        if (typeof bytes !== 'number') {
            return '';
        }

        if (bytes >= 1000000000) {
            return (bytes / 1000000000).toFixed(2) + ' GB';
        }

        if (bytes >= 1000000) {
            return (bytes / 1000000).toFixed(2) + ' MB';
        }

        return (bytes / 1000).toFixed(2) + ' KB';
    }
});
    
</script>
@endsection