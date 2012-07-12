<div class="pagination">
    <div class="previous">
        <a href="{$currentUrl}?page=1">&laquo;</a>
    </div>
    <ul class="pages">
        {if $page > 1}
            <li><a href="{$currentUrl}?page=1">...</a></li>
        {/if}
        {section name=pageList loop=$pages+1 max=10 start=$page}
            <li><a href="{$currentUrl}?page={$smarty.section.pageList.index}">{$smarty.section.pageList.index}</a></li>
        {/section}
        {if $page <= ($pages - 2)}
            <li><a href="{$currentUrl}?page={$pages}">...</a></li>
        {/if}
    </ul>
    <a href="{$currentUrl}?page={$pages}">&raquo;</a>
</div>