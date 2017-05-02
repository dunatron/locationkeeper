<!-- Modal -->
<div id="TronLoginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" id="LoginModal">
                    {$getCrossSVGIcon}
                </button>
                <h4 class="modal-title">Login Form</h4>
            </div>
            <div class="modal-body">
                <% if $CurrentMember %>
                    <% loop $CurrentMember %>
                        <p>You Are Currently Logged in as</p>
                        <h2 id="current-member" style="display: inline-block; margin: 0;">$Name</h2>

                    <% if ViewSensitive == 1 %>
                        <a href="$Link">Edit Profile <i class="fa fa-pencil-square-o"></i></a>
                        <a href="Security/logout">Logout <i class="fa fa-sign-out"></i></a>
                    <% else %>
                        <a href="Security/logout">Logout <i class="fa fa-sign-out"></i></a>
                    <% end_if %>

                    <% end_loop %>
                <% else %>
                    $LoginForm
                <% end_if %>
            </div>
        </div>
    </div>
</div>