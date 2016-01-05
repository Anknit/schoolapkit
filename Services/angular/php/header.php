<?php ?>
<html>
    <head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta content="html" lang="en" name="Webservice">
        <title>Schoolap.com</title>
        <link type="text/css" rel="stylesheet" href="./../../Common/css/bootstrap/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="./css/style.css" />
    </head>
    <body data-ng-app="schoolap">
        <header>
            <nav class='navbar navbar-default'>
                <div class='container-fluid'>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#/">Web-Service</a>
                    </div>
                    <div class="collapse navbar-collapse" id="menu-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="active"><a href="#/">Home</a></li>
                            <li><a href="#/schools">Schools</a></li>
                            <li class="dropdown">
                                <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Results <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#/result/class/10">Class X</a></li>
                                    <li><a href="#/result/class/12">Class XII</a></li>
                                    <li><a href="#/result/internal">Internal</a></li>
                                </ul>
                            </li>
<!--
                            <li><a href="#/compare">Compare</a></li>
                            <li><a href="#/ranking">Rankings</a></li>
                            <li class="dropdown">
                                <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admission <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#/admission/process">Admission Process</a></li>
                                    <li><a href="#/admission/apply">Apply for admission</a></li>
                              </ul>
                            </li>
                            <li class="dropdown">
                                <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Scholarships <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#/scholarship/central">Central Scholarships</a></li>
                                    <li><a href="#/scholarship/state">State Scholarships</a></li>
                                    <li><a href="#/scholarship/private">Private Scholarships</a></li>
                              </ul>
                            </li>
                            <li class="dropdown">
                                <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Career <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#/joblist">Job Advertisements</a></li>
                                    <li><a href="#/appStatus">Application Status</a></li>
                              </ul>
                            </li>
-->
                        </ul>
                        <ul class="nav navbar-nav navbar-right nav-link-auth">
                            <li>
                                <input type="search" class="" placeholder=&#9906; />
                            </li>
                            <li class='dropdown'>
                                <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><small>Login / Register</small></a>
                                <ul class="dropdown-menu" role="menu" style='min-width:300px;'>
                                    <li>
                                        <div class='container-fluid'>
                                            <div class='col-md-12'>
                                                <form>
                                                    <div class="input-group">
                                                        <span class="input-group-addon glyphicon glyphicon-user"></span>
                                                        <input type="text" class="form-control" id="loginUserName" placeholder="Username">
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon glyphicon glyphicon-lock"></span>
                                                        <input type="password" class="form-control" id="loginPassword" placeholder="Password">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default" type="button" title='forgot password'>
                                                                <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <div class="checkbox center-block">
                                                        <label>
                                                            <input type="checkbox"><span class='text-default'>Remember Me</span>
                                                        </label>
                                                    </div>
                                                    <button type="submit" class="btn btn-success center-block btn-block">Sign-in</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    <li class='divider' role='presentation'></li>
                                    <li>
                                        <div class='container-fluid'>
                                            <div class='col-md-12'>
                                                <form>
                                                    <p class='text-primary'>Log in with</p>
                                                    <button type="button" class="btn btn-fb center-block btn-block" onclick="loginFacebook();">Facebook</button>
                                                    <button type="button" class="btn btn-danger center-block btn-block">Google</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    <li class='divider' role='presentation'></li>
                                    <li>
                                        <div class='container-fluid'>
                                            <div class='col-md-12'>
                                                <form>
                                                    <a class="btn btn-warning center-block btn-block" href='#/signup'>Sign-up Now !</a>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
