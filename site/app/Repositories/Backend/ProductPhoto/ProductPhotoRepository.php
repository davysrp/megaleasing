<?php

namespace App\Repositories\Backend\ProductPhoto;

use DB;
use Carbon\Carbon;
use App\Models\ProductPhoto\ProductPhoto;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductPhotoRepository.
 */
class ProductPhotoRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = ProductPhoto::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.productphotos.table').'.id',
                config('module.productphotos.table').'.created_at',
                config('module.productphotos.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (ProductPhoto::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.productphotos.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param ProductPhoto $productphoto
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(ProductPhoto $productphoto, array $input)
    {
    	if ($productphoto->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.productphotos.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param ProductPhoto $productphoto
     * @throws GeneralException
     * @return bool
     */
    public function delete(ProductPhoto $productphoto)
    {
        if ($productphoto->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.productphotos.delete_error'));
    }
}
