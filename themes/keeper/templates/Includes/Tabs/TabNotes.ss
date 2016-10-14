<hr>
<h2>$ProjectName</h2>
<h3>$Client</h3>
<% loop $getCMSType %>
    <h3>CMS TYPE -> $CMSName</h3>
<% end_loop %>
<hr>
<div class="content">
    $Content
</div>
<hr>
<h3>Important Notes about this Project <small>chronologically ordered</small></h3>
<hr>
<div id="note-accordion" role="tablist" aria-multiselectable="true">
    <% loop $PaginatedNotes %>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="Note-$Pos">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#note-accordion" href="#collapse-$Pos" aria-expanded="false"
                       aria-controls="collapse-$Pos">
                        $Title
                    </a>
                </h4>
            </div>
            <div id="collapse-$Pos" class="panel-collapse collapse <% if $First %>in<% else %><% end_if %>"
                 role="tabpanel" aria-labelledby="headingOne">
                $NoteBody
            </div>
        </div>
    <% end_loop %>
</div>

<% if $PaginatedNotes.MoreThanOnePage %>
    <% if $PaginatedNotes.NotFirstPage %>
        <a class="prev" href="$PaginatedNotes.PrevLink">Prev</a>
    <% end_if %>
    <% loop $PaginatedNotes.Pages %>
        <% if $CurrentBool %>
            $PageNum
        <% else %>
            <% if $Link %>
                <a href="$Link">$PageNum</a>
            <% else %>
                ...
            <% end_if %>
        <% end_if %>
    <% end_loop %>
    <% if $PaginatedNotes.NotLastPage %>
        <a class="next" href="$PaginatedNotes.NextLink">Next</a>
    <% end_if %>
<% end_if %>






