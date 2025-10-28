<?php
/**	op-skeleton-model:/asset/init/function/GitCheckoutTargetBranch.php
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

/**	Git checkout target branch
 *
 * @created    2025-07-03
 * @param      string     $branch
 */
function GitCheckoutTargetBranch( string $branch )
{
	//	Check if branch exists.
	if(!Execute("git show-ref --verify refs/remotes/origin/{$branch}") ){
		Execute("git checkout origin/main -b {$branch}");
		echo "\n * This branch has not been exist: {$branch} \n\n";
	}else{
		Execute("git checkout origin/{$branch}");
	}
}
