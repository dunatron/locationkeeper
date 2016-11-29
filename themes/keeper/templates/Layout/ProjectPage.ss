<div class="container">
    <div class="row project-titles">
        <div class="project-name col-md-6">
            Project Name: <span>$ProjectName</span>
        </div>
        <div class="client-name col-md-6">
            Client Name: $Client
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#notes">NOTES</a></li>
        <li><a data-toggle="tab" href="#dev">DEV</a></li>
        <li><a data-toggle="tab" href="#uat">UAT</a></li>
        <li><a data-toggle="tab" href="#live">LIVE</a></li>
        <li><a data-toggle="tab" href="#extras">EXTRAS</a></li>
        <li><a data-toggle="tab" href="#keys">KEYS</a></li>
        <li><a data-toggle="tab" href="#git">GIT</a></li>
    </ul>
    <div class="tab-content">
        <div id="notes" class="tab-pane fade in active">
            <%--<h3 class="tab-title">NOTES</h3>--%>
            <% include TabNotes %>
        </div>
        <div id="dev" class="tab-pane fade">
            <%--<h3 class="tab-title">DEV</h3>--%>
            <% include TabDev %>
        </div>
        <div id="uat" class="tab-pane fade">
            <%--<h3 class="tab-title">UAT</h3>--%>
            <% include TabUat %>
        </div>
        <div id="live" class="tab-pane fade">
            <%--<h3 class="tab-title">LIVE</h3>--%>
            <% include TabLive %>
        </div>
        <div id="extras" class="tab-pane fade">
            <%--<h3 class="tab-title">Extras</h3>--%>
            <% include TabExtra %>
        </div>
        <div id="keys" class="tab-pane fade">
            <%--<h3 class="tab-title">Keys</h3>--%>
            <% include TabKeys %>
        </div>
        <div id="git" class="tab-pane fade">
            <%--<h3 class="tab-title">Git</h3>--%>
            <% include TabGit %>
        </div>
    </div>
</div>