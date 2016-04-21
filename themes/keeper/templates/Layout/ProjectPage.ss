<div class="container">
    <div class="row">

        <div class="project-name col-md-6">
            Project Name: $ProjectName
        </div>

        <div class="client-name col-md-6">
            Client Name: $Client
        </div>


    </div>
</div>


<div class="container">
    <h2>Dynamic Tabs</h2>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">NOTES</a></li>
        <li><a data-toggle="tab" href="#menu1">DEV</a></li>
        <li><a data-toggle="tab" href="#menu2">UAT</a></li>
        <li><a data-toggle="tab" href="#menu3">LIVE</a></li>
        <li><a data-toggle="tab" href="#menu4">EXTRAS</a></li>
        <li><a data-toggle="tab" href="#menu5">KEYS</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>NOTES</h3>
            <% include TabNotes %>
        </div>
        <div id="menu1" class="tab-pane fade">
            <h3>DEV</h3>
            <% include TabDev %>
        </div>
        <div id="menu2" class="tab-pane fade">
            <h3>UAT</h3>
            <% include TabUat %>
        </div>
        <div id="menu3" class="tab-pane fade">
            <h3>LIVE</h3>
            <% include TabLive %>
        </div>
        <div id="menu4" class="tab-pane fade">
            <h3>Extras</h3>
            <% include TabExtra %>
        </div>
        <div id="menu5" class="tab-pane fade">
            <h3>Keys</h3>
            <% include TabKeys %>
        </div>
    </div>
</div>