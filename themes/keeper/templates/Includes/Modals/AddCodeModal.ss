<div id="AddCodeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" id="CloseAddCodeModal">
                {$getCrossSVGIcon}
            </button>

            <div class="modal-body">
                <% if $CurrentUser.ViewSensitive == 1 %>
                    $UploadCodeForm
                <% else %>
                    <p>Sorry your not trusted to not skull fuck my system</p>
                <% end_if %>

            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>