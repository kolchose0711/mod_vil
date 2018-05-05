<?php
/**
 * @package         VIL.Module
 * @subpackage      mod_vil
 * @copyright       Copyright (C) 2018 MCT.
 */

// no direct access
defined('_JEXEC') or die;
?>
<div class="vil-module-wrap<?php echo $moduleclass_sfx; ?>">
    <div class="vil-module-wrap-inner">
        <?php foreach( $profiles as $profile ): ?>
        	<pre><?php var_dump($profile); ?></pre>
            <br/>
        <?php endforeach; ?>
        <!--
        <ul class="example-module-list nav nav-tabs nav-stacked">
        <?php foreach( $items as $item ): ?>
            <li class="example-module-list-item">
                <?php echo JHtml::_('link', $item->link, "{$item->a_created} - {$item->a_title}"); ?>
            </li>
        <?php endforeach; ?>
        </ul>
        -->
        
    </div>
</div>