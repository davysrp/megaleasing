<?php

namespace App\Repositories\Backend\AboutUs;

use DB;
use Carbon\Carbon;
use App\Models\AboutUs\AboutU;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AboutURepository.
 */
class AboutURepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = AboutU::class;

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
                config('module.aboutus.table').'.id',
                config('module.aboutus.table').'.created_at',
                config('module.aboutus.table').'.updated_at',
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
        if (AboutU::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.aboutus.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param AboutU $aboutu
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(AboutU $aboutu, array $input)
    {
    	if ($aboutu->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.aboutus.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param AboutU $aboutu
     * @throws GeneralException
     * @return bool
     */
    public function delete(AboutU $aboutu)
    {
        if ($aboutu->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.aboutus.delete_error'));
    }
}
