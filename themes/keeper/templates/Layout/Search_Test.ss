<h1>$IsEmpty</h1>
<% loop $Results %>
    <div class="result-item">
        <h1>$Title</h1>
        <div class="desc">
            $Desc.ContextSummary(300)
        </div>
        <div class="description">
            $Content.ContextSummary(300)
        </div>
    </div>
<% end_loop %>