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

    <%--<link rel="stylesheet" type="text/css" href="$ThemeDir/public/css/app.css"/>--%>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ofayo7pakzulvwp4rzxfgb9ce6gzk3fqaah82rahrbild2bd"></script>

</head>
<body class="$ClassName">

<div>

</div>
    <% include Nav %>

<div class="container">
    <% if $CurrentMember %>
        $Layout
        $Form
    <% else %>
        <h1>Please login to View Module Resources</h1>
        <p>Visitors you can view the code search page by logging in with the below credentials</p>
        <p class="visitor-credentials">Email: <span>visitor@keeper.nz</span><br />Password: <span>visit</span></p>
        <a href="" data-toggle="modal" data-target="#TronLoginModal" class="login-btn">Log - In<i class="fa fa-sign-in"></i></a>
    <% end_if %>
</div>


<% include LoginModal %>


<%--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"--%>
        <%--integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"--%>
        <%--crossorigin="anonymous"></script>--%>

</body>
</html>