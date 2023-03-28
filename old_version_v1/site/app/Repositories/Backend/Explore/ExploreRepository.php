<?php

namespace App\Repositories\Backend\Explore;

use DB;
use Carbon\Carbon;
use App\Models\Explore\Explore;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExploreRepository.
 */
class ExploreRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Explore::class;

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
                config('module.explores.table').'.id',
                config('module.explores.table').'.title',
                config('module.explores.table').'.title_eng',
                config('module.explores.table').'.created_at',
                config('module.explores.table').'.updated_at',
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
        if (Explore::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.explores.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Explore $explore
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Explore $explore, array $input)
    {
    	if ($explore->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.explores.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Explore $explore
     * @throws GeneralException
     * @return bool
     */
    public function delete(Explore $explore)
    {
        if ($explore->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.explores.delete_error'));
    }
}
