<div class="code-search-bar">
    $CodeSearchForm
</div>
<div class="search-results-wrapper">
    <div class="search-notes">
        <%-- Search Notes --%>
        <h2>Search Notes</h2>
        <p>
            The search is using Solr and searches across In The Code Table for Title, Tags, and Desc
            <br />
            The DB columns have the following Solr weights.
        </p>
        <ul>
            <li>Title => 3</li>
            <li>Tags => 2.5</li>
            <li>Desc => 2</li>
        </ul>
        <%-- Tag Notes --%>
        <h2>Tag Notes</h2>
        <p>There are common tags that can be used.
            <br />
            You can also add your own tags that belong only to that code snippet.
            <br />
            There is A Tag column which collates the tags and adds them as a string separated by the comma
        </p>
        <%-- All Code Tags --%>
        <p>Common Tags</p>
        <% loop $getCodeTags %>
            <span class="code-tag">{$Title}</span>
        <% end_loop %>
    </div>
</div>
<% include EditCodeModal %>