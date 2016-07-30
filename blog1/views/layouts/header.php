<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="true" name="mssmarttagspreventparsing" />
    <meta http-equiv="imagetoolbar" content="no" />
    <title>BlogAir Template</title>
    <link href="/template/css/style.css" rel="stylesheet" type="text/css" />




    <script type="text/javascript">
        /*
         * Simple JS function for setting the search value
         */
        function clS(t){
            var srch = document.getElementById('s'), val = srch.value.toString().toLowerCase(), re = /^\s+$/;
            if(t) {
                if(val == 'Search' || val == 'search'){
                    srch.value = '';
                }
            } else {
                if(val == 'Search' || val == 'search' || val == '' || re.test(val)) {
                    srch.value = 'Search';
                }
            }
        }
    </script>


</head>

<body>
<!-- Wrap Div -->
<div id="wrap">

    <!-- Header -->
    <div id="hdr">

        <!-- Top Menu -->
        <div id="hdl">
            <a href="#" class="hl">About Us</a>
            <a href="#" class="hl">Contact Us</a>
            <a href="#" class="hl">Login</a>
        </div>

        <!-- Search form -->
        <form id="search_form" method="get" action="">
            <input class="search_field" type="text" value="Search" onfocus="clS(1);" onblur="clS(0);"  name="s" id="s" />
            <input class="search_button" type="submit"  value="" id="searchsubmit" />

        </form>

        <!-- Logo -->
        <div id="logo">
            <a href="/"></a>
        </div>

        <!-- Main Menu -->
        <div id="menu">
            <a class="mh" href="#">Home</a>
            <a class="mt" href="#">Tutuorials</a>
            <a class="mw" href="#">Wallpapers</a>
            <a class="mi" href="#">Inspiration</a>
        </div>

    </div>