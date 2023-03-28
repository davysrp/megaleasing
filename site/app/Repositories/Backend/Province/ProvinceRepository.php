<?php

namespace App\Repositories\Backend\Province;

use DB;
use Carbon\Carbon;
use App\Models\Province\Province;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProvinceRepository.
 */
class ProvinceRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Province::class;

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
                config('module.provinces.table').'.id',
                config('module.provinces.table').'.created_at',
                config('module.provinces.table').'.updated_at',
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
        if (Province::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.provinces.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Province $province
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Province $province, array $input)
    {
    	if ($province->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.provinces.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Province $province
     * @throws GeneralException
     * @return bool
     */
    public function delete(Province $province)
    {
        if ($province->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.provinces.delete_error'));
    }
}
