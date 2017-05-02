<div id="EditCodeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" id="CloseEditCodeModal">
                {$getCrossSVGIcon}
            </button>

            <div class="modal-body">
                <% if $CurrentUser.ViewSensitive == 1 %>
                    $EditCodeForm
                <% else %>
                    <p>your not trusted to edit code snippets, come back with better permissions</p>
                <% end_if %>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>