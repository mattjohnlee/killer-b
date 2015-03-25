<?php

class RM_Transient {
    
    /**
     * Function to get named cached transient menu
     *
     * @param  string  $name
     * @return string
     * @added 2.3
     * @edited 2.4 - Added option to use transient caching
     */
    
    static function getTransientMenu( $name ) {

        $Transient = ResponsiveMenu::getOption( 'RMUseTran' );

        if( $Transient ) :
            
            $cachedKey = $name . '_' . get_current_blog_id();
            $cachedMenu = get_transient( $cachedKey );
            
        else :
            
            $cachedMenu = false;
        
        endif;

        if( $cachedMenu === false ) :

            $cachedMenu = self::createTransientMenu( $name );

            if( $Transient )
                set_transient( $cachedKey, $cachedMenu );
        
        endif;
        
        return $cachedMenu;
        
    }
    
     /**
     * Function to create named cached transient menu
     *
     * @param  string  $name
     * @return array
     * @added 2.3
     */
    
    static function createTransientMenu( $name ) {
        
        $walker = ResponsiveMenu::getOption( 'RMWalker' );
        
        $cachedMenu = wp_nav_menu( array(
                'menu' => $name,
                'menu_class' => 'responsive-menu',
                'walker' => ( !empty( $walker ) ) ? new $walker : '', // Add by Mkdgs
                'echo' => false 
                )
            );
        
        return $cachedMenu;
        
    }
    
    /**
     * Function to clear all transient menus
     *
     * @return null
     * @added 2.3
     */
    
    static function clearTransientMenus() {
        
        if( ResponsiveMenu::hasMenus() ) :

            foreach( ResponsiveMenu::getMenus() as $menu ) :

                delete_transient( $menu->slug . '_' . get_current_blog_id() );

            endforeach;

        endif;
        
    }
    
}