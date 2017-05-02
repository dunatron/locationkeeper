<% if $CurrentUser.ViewSensitive == 1 %>
    <%loop $Children %>
        <div class="col-md-4">
            <hr>
            <h3 class="text-center"><a href="$Link" class="projectlink text-center">$Title</a></h3>
            <hr>
        </div>
    <% end_loop %>
<% else %>
    <p>Go on get outa here... scram!</p>
<% end_if %>