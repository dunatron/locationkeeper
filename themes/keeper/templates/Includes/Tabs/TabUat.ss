

<div class="container">

    <% loop $UatEnvironments %>
        <h2>$ServerName</h2>
        <h2>$makeSSH</h2>
        <p>description about this environment / current state</p>
        <table class="table table-hover">
            <thead>
                <%-- Server Name --%>
            <tr>
                <th>Server Name</th>
                <th>$ServerName</th>
            </tr>
            </thead>
            <tbody>
                <%-- Server Address --%>
            <tr>
                <td>Server Address</td>
                <td>$ServerAddress</td>

            </tr>
                <%-- Server User --%>
            <tr>
                <td>Server User</td>
                <td>$ServerUser</td>

            </tr>
                <%-- Server Password --%>
            <tr>
                <td>Server Password</td>
                <td>$ServerPass</td>

            </tr>
                <%-- Site URL --%>
            <tr>
                <td>Site URL</td>
                <td>$SiteURL</td>

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
                <%-- Back End Address --%>
            <tr>
                <td>Back-End Address</td>
                <td>$BackEndAddress</td>

            </tr>
                <%-- Back End User --%>
            <tr>
                <td>Back-End User</td>
                <td>$BackEndUser</td>

            </tr>
                <%-- Back End Pass --%>
            <tr>
                <td>Back-End Password</td>
                <td>$BackEndPass</td>

            </tr>
            </tbody>
        </table>
    <% end_loop %>

</div>