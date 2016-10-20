<div class="container">
    <% loop $GetServers %>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="Note-$Pos">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#server-accordion" href="#collapse-$Pos" aria-expanded="false"
                       aria-controls="collapse-$Pos">
                        $ServerName | $ServerAddress
                    </a>
                </h4>
            </div>
            <div id="collapse-$Pos" class="panel-collapse collapse <% if $First %>in<% else %><% end_if %>"
                 role="tabpanel" aria-labelledby="headingOne">
                <div class="server-body-wrapper">
                    <% if $CWPCheck == 1 %>
                        <div class="cwp-check">
                            <h1>This is a CWP server</h1>
                        </div>
                    <% end_if %>
                    <% if $DevSSHUser %>
                        <div class="dev-ssh-user">
                            <span class="Attribute">Developer SSH User</span> | <span class="Value">$DevSSHUser</span>
                        </div>
                    <% end_if %>
                    <% if $DevSSHPass %>
                        <div class="dev-ssh-pass">
                            <span class="Attribute">Developer SSH Password</span> | <span class="Value">$DevSSHPass</span>
                        </div>
                    <% end_if %>
                    <% if $RootSSHUser %>
                        <div class="root-ssh-user">
                            <span class="Attribute">Root SSH User</span> | <span class="Value">$RootSSHUser</span>
                        </div>
                    <% end_if %>
                    <% if $RootSSHPass %>
                        <div class="root-ssh-pass">
                            <span class="Attribute">Root SSH Password</span> | <span class="Value">$RootSSHPass</span>
                        </div>
                    <% end_if %>
                    <% if $MySqlUser %>
                        <div class="sql-user">
                            <span class="Attribute">SQL User</span> | <span class="Value">$MySqlUser</span>
                        </div>
                    <% end_if %>
                    <% if $MySqlPass %>
                        <div class="sql-pass">
                            <span class="Attribute">SQL Password</span> | <span class="Value">$MySqlPass</span>
                        </div>
                    <% end_if %>
                    <% if $NameAddress %>
                        <div class="name-address">
                            <span class="Attribute">Name & Address</span> | <span class="Value">$NameAddress</span>
                        </div>
                    <% end_if %>
                </div>
            </div>
        </div>
    <% end_loop %>
</div>