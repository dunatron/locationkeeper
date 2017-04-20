<!DOCTYPE html>
<html>
<head>
    <% base_tag %>
    <!-- Site made with Mobirise Website Builder v1.9.10, http://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v1.9.10, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Storage for projects, their environments and how to access them"/>
    <meta name="keywords"
          content="Location-keeper, project, server, environment locator"/>
    <meta name="author" content="Heath Dunlop"/>
    <title>$Title</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="$ThemeDir/public/css/app.css"/>

</head>
<body class="$ClassName">

<div>

</div>
    <% include Nav %>

    <% if CurrentMember %>
        $Layout
        $Form
    <% else %>
    <h1>Please login to View Module Resources</h1>
    <a href="" data-toggle="modal" data-target="#TronLoginModal" class="login-btn">Log - In<i class="fa fa-sign-in"></i></a>
    <% end_if %>

<!-- Modal -->
<div id="TronLoginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login Form</h4>
            </div>
            <div class="modal-body">
                <% if CurrentMember %>
                    <% loop CurrentMember %>
                        <h1>You Are Currently Logged in as</h1>
                        <h2 id="current-member">$Name</h2>
                        <a href="$Link">Edit Profile <i class="fa fa-pencil-square-o"></i></a>
                        <a href="Security/logout">Log in as someone else <i class="fa fa-sign-out"></i></a>
                    <% end_loop %>
                <% else %>
                    $LoginForm
                <% end_if %>
            </div>

        </div>

    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>

</body>
</html>