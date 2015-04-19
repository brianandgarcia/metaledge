<?php
define( 'DEV_DEBUG_TEMPLATES', true );
#define( 'DEV_DEBUG_JS', true );
#define('IPS_VERBOSE_SETUP', true );
define( 'IN_DEV', true );
#define( "QUERY_LOG", TRUE );
define( 'EMAIL_DEBUG_PATH', '/users/matt/server/ips-suite/trunk/_mail' );
define( 'BYPASS_CURL', true );
define( 'DEV_USE_FURL_CACHE', false );
define( 'DEV_USE_WHOOPS', ( stristr( $_SERVER["SCRIPT_NAME"], 'css.php' ) ) ? false : true );
#define('DEV_DEBUG_TEMPLATES', true );
set_time_limit(0);

ini_set('display_errors', true);

function matt_plainPrint( $var )
{
	header( 'Content-type: text/plain; charset=UTF-8');
	print var_export( $var, true );
	exit();
}


function matt_debug( $string, $file=null )
{
	\file_put_contents( __DIR__ . "/uploads/" . ( $file === null ? 'debug' : $file ) . '.txt', var_export( $string, true ) . "\n\n", FILE_APPEND );
}

function matt_backtrace( $_debug )
{
	$trace = array();
	
	if ( is_array( $_debug ) and count( $_debug ) )
	{
		foreach( $_debug as $idx => $data )
		{
			foreach( array( 'file', 'line', 'function', 'class' ) as $field )
			{
				if ( isset( $data[ $field ] ) )
				{
					$trace[ $idx ][ $field ] = $data[ $field ];
				}
			}
		}
	}
	
	return $trace;
}

