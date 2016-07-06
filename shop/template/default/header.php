<!DOCTYPE html>
<html>
<head>
    <title>My blog</title>
</head>
<body>
<link rel="stylesheet" href="/web/css/auth.css"/>
<link rel="stylesheet" href="/web/css/bootstrap.css">
<link rel="stylesheet" href="/web/css/bootstrap-theme.css">
<link rel="stylesheet" href="/web/css/bootstrap.min.css">
<link rel="stylesheet" href="/web/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="/web/js/bootstrap.min.js"></script>
<script src="/web/js/bootstrap.js"></script>
<script src="/web/js/npm.js"></script>
<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<!-- add scripts -->
<script src="/web/js/jquery.min.js"></script>
<script src="/web/js/jquery.colorbox-min.js"></script>
<script src="/web/js/jquery.masonry.min.js"></script>
<script src="/web/js/jquery.infinitescroll.min.js"></script>
<script src="/web/js/script.js"></script>
</head>
<div id="header">
    <div id="header-line">
        <div id="logo"><a href="/">Market</a></div>
        <div class="container" id="search">
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="input-group">
					<span class="input-group-btn">
						<div class="btn-group">
							<li class="dropdown">
								<button type="button" id="menu" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
									<span id="menu-icon" class="glyphicon glyphicon-th-list"></span></button>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="row">
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
												<li class="divider"></li>
												<li><a href="#">One more separated link</a></li>
											</ul>
										</div>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
												<li class="divider"></li>
												<li><a href="#">One more separated link</a></li>
											</ul>
										</div>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
												<li class="divider"></li>
												<li><a href="#">One more separated link</a></li>
											</ul>
										</div>
									</div>
								</ul>
							</li>
						</div>
					</span>
                        <input type="hidden" name="search_param" value="all" id="search_param">
                        <input type="text" class="form-control" name="x" placeholder="Search term...">
                        <div class="input-group-btn search-panel">
                            <button type="button" id="button-drop" class="btn btn-default dropdown-toggle search-btn-right" data-toggle="dropdown">
                                <span id="search_concept">Filter by</span> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#contains">Contains</a></li>
                                <li><a href="#its_equal">It's equal</a></li>
                                <li><a href="#greather_than">Greather than</a></li>
                                <li><a href="#less_than">Less than </a></li>
                                <li class="divider"></li>
                                <li><a href="#all">Anything</a></li>
                            </ul>
                        </div>
					<span class="input-group-btn">
						<button id="btn-h" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
					</span>
                    </div>
                </div>
            </div>
        </div>
        <form action="/template/default/registration.php" id="registerform" method="post"name="registerform">
            <p class="submit"><input id="reg" class="btn btn-danger" name="login"type= "submit" value="Registration"></p>
        </form>
        <form action="/template/default/login.php"  method="post" >
            <p class="submit"><input id="sign" class="btn btn-default" name="login"type= "submit" value="Sign up"></p>
        </form>
        <div id="inform">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span  class="glyphicon glyphicon-info-sign" ></span><span id="caret-info" class="caret"</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Текст подпункта</a></li>
                        <li><a href="#">Текст подпункта</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Текст подпункта</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div id="language">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span ></span>language<span id="caret-info" class="caret"</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Текст подпункта</a></li>
                        <li><a href="#">Текст подпункта</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Текст подпункта</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="main_container">
    {images_set}
</div>
{infinite}
</div>
</body>
</html>