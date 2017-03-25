{literal}
    <script type = "text/javascript">
	    //<![CDATA[
		    function show_create_filter_form() {
		        $('#filter_form').load(
			        'tournament.php?action=create_filter',
				    function() {
				        $('#filter_form').show();
					    $('#create_anchor').hide();
				    }
			    );
			}
			
			function delete_filter(fid) {
		        $.ajax({
			        url: 'tournament.php?action=delete_filter',
				    data: {fid: fid},
				    success: function(json) {
				        eval('var result = ' + json + ';');
					    if (result.error) {
					        alert(result.error);
					    }
					    else {
					        get_filters();
					    }
				    }
			    })
		    }
		//]]>
	</script>
{/literal}
<div class = "list">
	<table width = "100%">
        {foreach from=$filters item="filter"}
	        <tr {cycle name="lines" values='class="selected",'}>
			    <td>
				    <input type = "checkbox" name = "filters[]" value = "{$filter->get_id()}" {if $filter->is_applied_to($tid)}checked="checked"{/if} />&nbsp;
				    <strong>{$filter->get_field()}</strong>&nbsp;
				    {$filter->get_operator()}&nbsp;
				    <i>{$filter->get_value()}</i>
				</td>
				<td align = "right">
				    <a href = "javascript: delete_filter({$filter->get_id()});" title = "Delete filter"><img src = "images/deleted.png" alt = "[delete]" /></a>
				</td>
			</tr>
        {foreachelse}
            <tr>
			    <td>
	                No filters!
				</td>
			</tr>
        {/foreach}
	</table>
	<a id = "create_anchor" href = "javascript: show_create_filter_form();" title = "Create a filter"><img src = "images/add.png" alt = "Create a filter" />&nbsp;Create a filter</a>
	<div id = "filter_form">
	</div>
</div>
<div style = "clear: both;">
</div>