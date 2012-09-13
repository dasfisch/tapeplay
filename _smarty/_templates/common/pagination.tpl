<div class="pagination">
    <a class="previous" href="{$currentUrl}?page=1">&lt;</a>
    {section name=pageList loop=$pages+1 max=10 start=$page}
        <a class="page" href="{$currentUrl}?page={$smarty.section.pageList.index}">{$smarty.section.pageList.index}</a>
    {/section}
    <a class="next" href="{$currentUrl}?page={$pages}">&gt;</a>
    
</div>