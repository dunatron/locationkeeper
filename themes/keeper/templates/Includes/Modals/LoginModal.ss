<!-- Modal -->
<div id="TronLoginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login Form</h4>
            </div>
            <div class="modal-body">
                <% if $CurrentMember %>
                    <% loop $CurrentMember %>
                        <h1>You Are Currently Logged in as</h1>
                        <h2 id="current-member">$Name</h2>

                    <% if ViewSensitive == 1 %>
                        <a href="$Link">Edit Profile <i class="fa fa-pencil-square-o"></i></a>
                        <a href="Security/logout">Log in as someone else <i class="fa fa-sign-out"></i></a>
                    <% else %>
                        <a href="Security/logout">Log in as someone else <i class="fa fa-sign-out"></i></a>
                    <% end_if %>

                    <% end_loop %>
                <% else %>
                    $LoginForm
                    $MyLoginForm
                <% end_if %>
            </div>
        </div>
    </div>
</div>