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

//	...
require_once(__DIR__.'/Execute.php');

/**	Git checkout target branch
 *
 * @created    2025-07-03
 * @param      string     $branch
 */
function GitCheckoutTargetBranch( string $remote, string $branch )
{
	//	Check if branch exists.
	if(!Execute("git show-ref --verify refs/remotes/{$remote}/{$branch}") ){
		Execute("git checkout {$remote}/main -b {$branch}");
		echo "\n * This branch has not been exist: {$remote}/{$branch} \n\n";
		return;
	}

	//	If switch fails, doing checkout.
	if(!Execute("git switch {$branch}" )){
		Execute("git checkout -b {$branch} {$remote}/{$branch}");
		Execute("git branch");
	} // This comment out for git diff.
}
