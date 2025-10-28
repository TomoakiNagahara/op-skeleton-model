<?php
/**	op-skeleton-model:/asset/init/function/GitSubmoduleForeach.php
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

/**	Git submodule foreach.
 *
 * @created    2025-07-03
 * @param      string     $git_root
 * @param      array      $configs
 */
function GitSubmoduleForeach( string $git_root, array $configs )
{
	//	Switch branch.
	foreach( $configs as $config ){
		//	...
		$path   = $config['path'];
		$branch = $config['branch'] ?? null;

		//	...
		if(!$branch ){
			$branch = _OP_APP_BRANCH_;
		}

		//	...
		chdir($git_root);
		chdir($path);
		echo getcwd() ." --> {$branch}". PHP_EOL;

		//	...
		GitCheckoutTargetBranch( $branch );
	}
}
