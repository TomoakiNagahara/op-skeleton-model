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

//	...
require_once(__DIR__.'/GitSubmoduleConfig.php');
require_once(__DIR__.'/GitCheckoutTargetBranch.php');

/**	Git submodule foreach.
 *
 * @created    2025-07-03
 * @param      string     $git_root
 */
function GitSubmoduleForeach( string $git_root )
{
	//	Save current directory.
	$save_dir = getcwd();

	//	Get git submodule config.
	$configs = GitSubmoduleConfig('.gitmodules', $git_root);

	//	Switch branch.
	foreach( $configs as $config ){
		//	...
		$path   = $config['path'];
		$remote = $config['remote'] ?? 'origin';
		$branch = $config['branch'] ?? _OP_APP_BRANCH_;

		//	...
		chdir("$git_root/$path");
		echo getcwd() ." --> {$branch}". PHP_EOL;

		//	...
		GitCheckoutTargetBranch( $remote, $branch );

		//	...
		if( $config['submodule'] ?? null ){
			GitSubmoduleForeach("$git_root/$path");
		}
	}

	//	Recovery current directory.
	chdir($save_dir);
}
