@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                  <form id="upload" method="post" action="{{url('/uploads/enqueue')}}" enctype="multipart/form-data">
                        <div id="drop">
                        	<div  class="alert alert-info">
                            	<p id="allowUploadsMsg"align="center">Browse the data files from the local machine to be uploaded</p>
                            </div>
                        	<div id="stopUploadsMsg" class="alert alert-danger">
                            	<p align="center">File uploads not permitted from 12:00 AM to 4:00 AM</p>
                            </div>
                            <br>
                            <div class="text-center row" id="browseFilesDiv">
                            	<div class="form-group col-xs-3 col-xs-offset-2">
                                	<select id="fileyearid" name="fileyear" class="form-control"></select>
                               	</div>
                            	<div class="form-group col-xs-4">
                                    <!--If this list of files ever changes, the list also needs to change in the PurgeData page also! -->
	                                <select id="fileTypeId" name="filetype" class="form-control">
	                                   <option value="default">-- Select File Type --</option>
	                                   <option value="schools">Schools</option>
	                                   <option value="admissions">Admissions</option>
	                                   <option value="fallenrollment">FallEnrollment</option>
	                                   <option value="employees">Employees</option>
	                                   <option value="defaultrates">DefaultRates</option>
	                                   <option value="graduations">Graduations</option>
	                                   <option value="instructionalstaff">InstructionalStaff</option>
	                                   <option value="noninstructionalstaff">NonInstructionalStaff</option>
	                                   <option value="completions">Completions</option>
	                                   <option value="ugcredithours">UGCredithours</option>
	                                   <option value="ugunduplicatedheadcount">UGUnduplicatedHeadcount</option>
	                                   <option value="privateprofit">PrivateProfit</option>
	                                   <option value="privatenonprofit">PrivateNonProfit</option>
	                                   <option value="public">Public</option>
	                                </select>
	                            </div>
	                            <div class="form-group col-xs-1">
	                                <!-- Browse files with a hidden input file element -->
	                                <a id="uploadFileHref" class="btn btn-info btn-md" disabled="true">Browse</a>
	                                <input id="uploadFileBtn" type="file" name="upl" single disabled="true" />
                                </div>
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

    //Load File Year dropdown.
    var start = 2000;
    var end = 2100;
    var options = "<option value='default'>\-\- Select File Year \-\-</option>";

    for(var year = start; year <= end; year++) {
      options += "<option value=\"" + year + "\">"+ year +"</option>";
    }

    document.getElementById("fileyearid").innerHTML = options;

    //Restrict file upload between 12:00 AM and 4:00 AM.
    var currentTime = new Date().getHours();
    if(currentTime >=0 && currentTime <= 4)
    {
        $('#allowUploadsMsg').hide();
        $('#browseFilesDiv').hide();
        $('#stopUploadsMsg').show();
    }
    else
    {
        $('#allowUploadsMsg').show();
        $('#browseFilesDiv').show();
        $('#stopUploadsMsg').hide();
    }

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

    $("select").on("change", function(){
        if($("#fileyearid").val() != 'default' && $("#fileTypeId").val() != 'default') {
            $("#uploadFileHref").removeAttr('disabled');
            $("#uploadFileBtn").removeAttr('disabled');
        }else{
            $("#uploadFileHref").attr('disabled', true);
            $("#uploadFileBtn").attr('disabled', true);
        }
    });
});
    
</script>
@endsection