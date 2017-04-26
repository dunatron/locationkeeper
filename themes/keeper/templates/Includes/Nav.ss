<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img class="img-responsive" src="$SiteConfig.SiteLogo.URL"> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <% loop $Menu(1) %>
                    <li><a class="$LinkingMode" href="$Link" title="$Go to the $Title page">$MenuTitle</a></li>
                <% end_loop %>
            </ul>
            <%-- Search Bar --%>
            <div class="search-bar">
                $SearchForm
            </div>
            <div class="add-code-btn">
                <a href="#" class="foot-link" data-toggle="modal" data-target="#AddCodeModal">Add Code</a>
                <% include AddCodeModal %>
            </div>
            $search
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>