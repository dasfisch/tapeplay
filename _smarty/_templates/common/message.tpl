{if isset($message) && $message.message != ''}
    <h3 class="{$message.type}Message">{$message.message}</h3>
{/if}