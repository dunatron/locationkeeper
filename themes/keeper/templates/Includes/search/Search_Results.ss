<% loop $Results %>
    <div class="result-item">
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