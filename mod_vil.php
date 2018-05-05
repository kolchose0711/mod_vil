<?php
/**
 * @package         VIL.Module
 * @subpackage      mod_vil
 * @copyright       Copyright (C) 2018 MCT.
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

$product = $params->get('product', '1');

$profiles = modVilHelper::getProfiles($product);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
require JModuleHelper::getLayoutPath('mod_vil', $params->get('layout', 'default'));
