<?php
/**	op-skeleton-model:/asset/init/include/GetSubmoduleConfig.php
 *
 * Get submodules config from .gitmodule.
 * This program is independent from OP.
 *
 * <pre>
 * ```php
 * <?php
 * $config = include('asset/init/include/GetSubmoduleConfig.php');
 * ```
 * </pre>
 *
 * @created    2024-08-28
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

//	Get submodule names
$names = trim(`git config --get-regexp submodule\..*\.active | grep true | sed 's/^submodule\.//;s/\.active true$//'`);

//	Generate git submodule config.
$configs = [];
//	...
foreach(explode("\n", $names) as $name){
	//	...
	foreach(['url','path','branch','follow'] as $key){
		$configs[$name][$key] = trim(`git config -f .gitmodules --get submodule.{$name}.{$key}` ?? '');
	}
}

//	...
return $configs;
