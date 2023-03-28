<?php

namespace App\Repositories\Backend\Career;

use DB;
use Carbon\Carbon;
use App\Models\Career\Career;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CareerRepository.
 */
class CareerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Career::class;

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
                config('module.careers.table').'.id',
                config('module.careers.table').'.title',
                config('module.careers.table').'.created_at',
                config('module.careers.table').'.updated_at',
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
        if (Career::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.careers.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Career $career
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Career $career, array $input)
    {
    	if ($career->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.careers.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Career $career
     * @throws GeneralException
     * @return bool
     */
    public function delete(Career $career)
    {
        if ($career->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.careers.delete_error'));
    }
}
