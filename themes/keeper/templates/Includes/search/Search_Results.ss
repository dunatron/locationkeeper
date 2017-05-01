<% loop $Results %>
    <div class="result-item">
        <h1>$Title<span> <a href="#" id="EditCodeBtn" class="foot-link" data-toggle="modal" data-target="#EditCodeModal" data-id="$ID">{$Top.getEditSVGIcon}</a></span></h1>
        <div class="desc">
            $Desc
        </div>
    </div>
<% end_loop %>