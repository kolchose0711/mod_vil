<?php
/**
 * @package         VIL.Module
 * @subpackage      mod_vil
 * @copyright       Copyright (C) 2018 MCT.
 */

// no direct access
defined('_JEXEC') or die;

abstract class modVilHelper {

    public static function getProperties($product) {
    	
    	// Obtain a database connection
		$db = JFactory::getDbo();
		// Retrieve the shout - note we are now retrieving the id not the lang field.
		$query = $db->getQuery(true)
					->select("id, name, description")
					->from('#__vil_properties');
		// Prepare the query
		$db->setQuery($query);
		// Load the row.
		$properties = $db->loadResult();
		// Return the Hello
		return $properties;
	}

    public static function getProfiles($product) {
    	
    	// Obtain a database connection
		$db = JFactory::getDbo();
		// Retrieve the shout - note we are now retrieving the id not the lang field.
		$query = $db->getQuery(true)
					->select("a.title, a.subtitle, a.description, a.image as prod_image, b.art_no, b.name, b.image, min(c.width) as min_width, max(c.width) as max_width, min(c.depth) as min_depth, max(c.depth) as max_depth")
					->from('#__vil_product AS a')
					->join('INNER', '#__vil_profile AS b ON a.id = b.product_id')
					->join('INNER', '#__vil_price AS c ON b.id = c.profile_id')
					->where('id = '. $db->Quote($product));
		// Prepare the query
		$db->setQuery($query);
		// Load the row.
		$profiles = $db->loadResult();
		// Return the Hello
		return $profiles;
    	
    	/*
        // init db
        // ===========================================================================
        $db     = JFactory::getDbo();
        $q      = $db->getQuery(true) ;
        
        
        // get Joomla! API
        // ===========================================================================
        $app     = JFactory::getApplication() ;
        $user    = JFactory::getUser() ;
        $date    = JFactory::getDate( 'now' , JFactory::getConfig()->get('offset') ) ;
        $uri     = JFactory::getURI() ;
        $doc     = JFactory::getDocument();
        
        
        
        // get Params and prepare data.
        // ===========================================================================
        $catid         = $params->get('catid', 1) ;
        $order         = $params->get('orderby', 'a.created') ;
        $dir           = $params->get('order_dir', 'DESC') ;
        
        
        
        // Category
        // =====================================================================================
        // if Choose all category, select ROOT category.
        if(!in_array(1, $catid)) {
            // if is array, implode it.
            if(is_array($catid)) $catid = implode(',', $catid) ;
            
            $q->where("a.catid IN ({$catid})") ;
        }
        
        
        
        // Published
        // =====================================================================================
        $q->where('a.published > 0') ;
        
        $nullDate = $db->Quote($db->getNullDate());
        $nowDate = $db->Quote($date->toSql(true));

        $q->where('(a.publish_up   = ' . $nullDate . ' OR a.publish_up <= ' . $nowDate . ')');
        $q->where('(a.publish_down = ' . $nullDate . ' OR a.publish_down >= ' . $nowDate . ')');
        
        
        
        // View Level
        // =====================================================================================
        $groups    = implode(',', $user->getAuthorisedViewLevels());
        $q->where('a.access IN ('.$groups.')');
        
        
        
        // Language
        // =====================================================================================
        if ($app->getLanguageFilter()) {
            $lang_code = $db->quote( JFactory::getLanguage()->getTag() ) ;
            $q->where("a.language IN ('{$lang_code}', '*')");
        }
        
        
        
        // Load Data
        // ===========================================================================
        $items = array() ;
        
        $q->select("a.*, b.*")
            ->from('#__example_items AS a')
            ->join('LEFT', '#__categories AS b ON a.catid = b.id')
            //->where("")
            ->order("{$order} {$dir}")
            ;
        
        $db->setQuery($q);
        $items = $db->loadObjectList();
        
        
        
        // Handle Data
        // ===========================================================================
        if( $items ):
        
            foreach( $items as $key => &$item ):
                $item->link = JRoute::_("index.php?option=com_example&view=item&id={$item->id}&alias={$item->alias}&catid={$item->catid}") ;
            endforeach;
            
        else:
            
            $items = range(1, 5) ;
            foreach( $items as $key => &$item ):
            
                $item = new JObject();
                $item->a_title   = 'Example data - ' . ( $key +1 );
                $item->link      = '#' ;
                $item->a_created = $date->toSQL(true) ;
                
            endforeach;
            
        endif ;
        */
        
        return $items;
    }
}
