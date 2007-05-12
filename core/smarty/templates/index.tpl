{include file="header.tpl"}
{include file="sidebar.tpl"}
{if $main_page}
    {include file="body.tpl"}
{else}

{literal}
<script type="text/javascript">
function openWin(myURL)
{       window.open(myURL.href,"win",'width=600,height=400,resizable=no,top=no,left=no,scrollbars=yes,statusbars=no');
		return false;
}
</script>
{/literal}

<div id="mainbar">
    {foreach key=heading item=sec from=$content}
        <h1>{$heading}</h1>
        {foreach item=con from=$sec}
            {if $con.type eq "data"}
                <p>{$con.data}</p>
            {else}
                <a href={$path_root}popup.php?secid={$con.secid}&pid={$con.paraid}&table={$table} 
                   onClick="return openWin(this);">{$con.data}</a><br>
            {/if}
        {/foreach}
    {/foreach}
{/if}
</div>
</div>
{include file="footer.tpl"}
