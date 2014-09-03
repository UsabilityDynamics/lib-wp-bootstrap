<?php
/**
 * Scaffold
 *
 * @namespace UsabilityDynamics
 *
 * This file can be used to bootstrap any of the UD plugins, it essentially requires that you have
 * a core file which will be called after 'plugins_loaded'. In addition, if the core class has
 * 'activate' and 'deactivate' functions, then those will be called automatically by this class.
 */
namespace UsabilityDynamics\WP {

  if( !class_exists( 'UsabilityDynamics\WP\Scaffold' ) ) {

    /**
     *
     * @class Scaffold
     * @author: peshkov@UD
     */
    abstract class Scaffold {
    
      /**
       * Plugin ( Theme ) Name.
       *
       * @public
       * @property $name
       * @type string
       */
      public $name = false;
    
      /**
       * Core version.
       *
       * @static
       * @property $version
       * @type {Object}
       */
      public $version = false;

      /**
       * Textdomain String
       *
       * @public
       * @property domain
       * @var string
       */
      public $domain = false;
            
      /**
       * Storage for dynamic properties
       * Used by magic __set, __get
       *
       * @protected
       * @type array
       */
      protected $_properties = array();
      
      /**
       * Constructor
       *
       * @author peshkov@UD
       */
      public function __construct( $args = array() ) {
        //** Setup our plugin's data */
        $this->name = isset( $args[ 'name' ] ) ? trim( $args[ 'name' ] ) : false;
        $this->version = isset( $args[ 'version' ] ) ? trim( $args[ 'version' ] ) : false;
        $this->domain = isset( $args[ 'domain' ] ) ? trim( $args[ 'domain' ] ) : false;
        $this->args = $args;
      }
      
      /**
       *
       */
      public function __get( $key ) {
        return isset( $this->_properties[ $key ] ) ? $this->_properties[ $key ] : NULL;
      }

      /**
       *
       */
      public function __set( $key, $value ) {
        $this->_properties[ $key ] = $value;
      }
      
    }
  
  }
  
}