<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
 * @OA\Info(
 *      version="1.0.0",
 *      
 *      title="Marsa-waves APIs",
 *      description="L5 Swagger OpenApi description",
 *      @OA\Contact(
 *          email="AmrAhmedHussien@outlook.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */

}
