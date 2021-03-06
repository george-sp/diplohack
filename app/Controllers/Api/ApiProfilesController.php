<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\Controllers\Api;

use App\Services\ProfileService;
use App\Transformers\ApiProfilesListTransformer;

/**
 * Class ApiDistrictsController.
 */
class ApiProfilesController extends ApiController
{
    protected $profileService;
    protected $apiProfilesListTransformer;

    /**
     * ApiDistrictsController constructor.
     */
    public function __construct()
    {
        $this->profileService = new ProfileService();
        $this->apiProfilesListTransformer = new ApiProfilesListTransformer();
    }

    /**
     * @return array
     */
    public function getList()
    {
        $profiles = $this->profileService->getAll();

        return $this->respondWithSuccess($this->apiProfilesListTransformer->transformCollection($profiles));
    }
}