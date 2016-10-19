<div class="container">

    <% loop $UatEnvironments %>

        <% if $CWPCheck == 'YES' %>
            <h3 class="cwp-instance">Server is on cwp and requires you to log into <a href="https://deploy.cwp.govt.nz"
                                                                                      target="_blank">Deployonaught</a>
            </h3>
        <% else %>
            <%-- SSH String --%>
            <div class="ssh-details">
                $MakeSSH
            </div>
        <% end_if %>

        <table class="table table-hover">
            <thead>
                <%-- Server Name --%>
            <tr>
                <th>Server Name</th>
                <th>
                    <% if $CWPCheck == 'YES' %>
                        <a class="cwp-instance" href="https://deploy.cwp.govt.nz" target="_blank">Deployonaught</a>
                    <% else %>
                        <% loop $GetServer %>
                            $ServerName
                        <% end_loop %>
                    <% end_if %>
                </th>
            </tr>
            </thead>
            <tbody>
                <%-- Site URL --%>
            <tr>
                <td>Site URL</td>
                <td class="site-url">$SiteURL</td>
            </tr>
                <%-- Back End Address --%>
            <tr>
                <td>Back-End Address</td>
                <td class="site-backend-url">$BackEndAddress</td>

            </tr>
                <%-- Back End User --%>
            <tr>
                <td>Back-End User</td>
                <td class="backend-user">$BackEndUser</td>
            </tr>
                <%-- Back End Pass --%>
            <tr>
                <td>Back-End Password</td>
                <td class="backend-pass">$BackEndPass</td>
            </tr>
                <%-- Server Address --%>
            <tr>
                <td>Server Address</td>
                <td>
                    <% loop $GetServer %>
                        $ServerAddress
                    <% end_loop %>
                </td>
            </tr>
                <%-- Server Dev User --%>
            <tr>
                <td>Server Dev User</td>
                <td>
                    <% loop $GetServer %>
                        $DevSSHUser
                    <% end_loop %>
                </td>
            </tr>
                <%-- Server Dev Password --%>
            <tr>
                <td>Server Dev Password</td>
                <td>
                    <% loop $GetServer %>
                        $DevSSHPass
                    <% end_loop %>
                </td>
            </tr>
                <%-- Server Root User --%>
            <tr>
                <td>Server Root User</td>
                <td>
                    <% loop $GetServer %>
                        $RootSSHUser
                    <% end_loop %>
                </td>
            </tr>
                <%-- Server Root Password --%>
            <tr>
                <td>Server Root Password</td>
                <td>
                    <% loop $GetServer %>
                        $RootSSHPass
                    <% end_loop %>
                </td>
            </tr>
                <%-- Htaccess User --%>
            <tr>
                <td>Htaccess-User</td>
                <td>$HtaccessUser</td>
            </tr>
                <%-- Htaccess Pass --%>
            <tr>
                <td>Htaccess-Pass</td>
                <td>$HtaccessPass</td>
            </tr>

            </tbody>
        </table>
    <% end_loop %>

</div>