

<% loop $Keys %>

    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample$ID" aria-expanded="false" aria-controls="collapseExample">
        Link with href
    </a>




<% end_loop %>

<% loop $keys %>
    <div class="collapse" id="collapseExample$ID">
        <div class="Type col-md-4">
            $Type
        </div>
        <div class="description col-md-8">
            $Description
        </div>
        <div class="card card-block">
            $Key
        </div>
    </div>
<% end_loop %>

