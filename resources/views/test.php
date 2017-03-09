<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Select List Actions - jQuery Plugin</title>
    <meta name="description" content="Select List Actions - jQuery Plugin">

    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.selectlistactions.js"></script>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/site.css">

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<div class="container">


    <p>&nbsp;</p>
    <div class="row style-select">
        <div class="col-md-12">
            <div class="subject-info-box-1">
                <label>Available Superheroes</label>
                <select multiple class="form-control" id="lstBox1">
                    <option value="123">Superman</option>
                    <option value="456">Batman</option>
                    <option value="789">Spiderman</option>
                    <option value="654">Captain America</option>
                </select>
            </div>

            <div class="subject-info-arrows text-center">
                <br /><br />
                <input type='button' id='btnAllRight' value='>>' class="btn btn-default" /><br />
                <input type='button' id='btnRight' value='>' class="btn btn-default" /><br />
                <input type='button' id='btnLeft' value='<' class="btn btn-default" /><br />
                <input type='button' id='btnAllLeft' value='<<' class="btn btn-default" />
            </div>

            <div class="subject-info-box-2">
                <label>Superheroes You Have Selected</label>
                <select multiple class="form-control" id="lstBox2">
                    <option value="765">Nick Fury</option>
                    <option value="698">The Hulk</option>
                    <option value="856">Iron Man</option>
                </select>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<script>

    $('#btnRight').click(function (e) {
        $('select').moveToListAndDelete('#lstBox1', '#lstBox2');
        e.preventDefault();
    });
    $('#btnAllRight').click(function (e) {
        $('select').moveAllToListAndDelete('#lstBox1', '#lstBox2');
        e.preventDefault();
    });
    $('#btnLeft').click(function (e) {
        $('select').moveToListAndDelete('#lstBox2', '#lstBox1');
        e.preventDefault();
    });
    $('#btnAllLeft').click(function (e) {
        $('select').moveAllToListAndDelete('#lstBox2', '#lstBox1');
        e.preventDefault();
    });
</script>
</body>
</html>