<table class="table table-hover">
    <thead>
        <%-- Server Name --%>
    <tr>
        <th>Type</th>
        <th>Value</th>
        <th>Comment</th>
    </tr>
    </thead>
    <tbody>
        <%-- Server Address --%>
        <% loop $Extras %>
        <tr>
            <td>$Type</td>
            <td>$Value</td>
            <td>$Comment</td>
        </tr>
        <% end_loop %>

    </tbody>
</table>


