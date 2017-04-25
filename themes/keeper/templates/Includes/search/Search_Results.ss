<% loop $Results %>
    <div class="result-item col-md-4">
        <h1>$Title</h1>
        <div class="desc contextsummary">
            $Desc.ContextSummary(300)
        </div>
        <div class="desc">
            $Desc
        </div>
        <div class="description">
            $Content.ContextSummary(300)
        </div>
    </div>
<% end_loop %>