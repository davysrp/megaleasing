<?php

namespace App\Repositories\Backend\ECommerce;

use DB;
use Carbon\Carbon;
use App\Models\ECommerce\ECommerce;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ECommerceRepository.
 */
class ECommerceRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = ECommerce::class;

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
                config('module.ecommerces.table').'.id',
                config('module.ecommerces.table').'.title',
                config('module.ecommerces.table').'.created_at',
                config('module.ecommerces.table').'.updated_at',
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
        if (ECommerce::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.ecommerces.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param ECommerce $ecommerce
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(ECommerce $ecommerce, array $input)
    {
    	if ($ecommerce->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.ecommerces.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param ECommerce $ecommerce
     * @throws GeneralException
     * @return bool
     */
    public function delete(ECommerce $ecommerce)
    {
        if ($ecommerce->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.ecommerces.delete_error'));
    }
}
