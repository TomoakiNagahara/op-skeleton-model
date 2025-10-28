<?php
/**	op-skeleton-model:/asset/init/function/Execute.php
 *
 * @created    2025-10-28
 * @version    1.0
 * @package    op-skeleton
 * @subpackage model
 * @author     Tomoaki Nagahara
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/**	Declare strict
 *
 */
declare(strict_types=0);

/**	namespace
 *
 */
namespace OP\SKELETON\INIT;

/**	Execute command.
 *
 * @created    2024-10-08
 * @param      string     $comand
 * @return     bool
 */
function Execute( string $comand ) : bool
{
	/* @var $output array */
	/* @var $status int   */
	exec("{$comand} 2>&1", $output, $status);

	//	...
	if( $status ){
		echo "\n{$comand} --> {$status}\n\n";
		echo join("\n", $output) . PHP_EOL . PHP_EOL;
	}

	//	...
	return empty($status) ? true: false;
}
