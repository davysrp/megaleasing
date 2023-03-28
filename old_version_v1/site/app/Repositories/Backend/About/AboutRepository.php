<?php

namespace App\Repositories\Backend\About;

use DB;
use Carbon\Carbon;
use App\Models\About\About;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AboutRepository.
 */
class AboutRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = About::class;

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
                config('module.abouts.table').'.id',
                config('module.abouts.table').'.title',
                config('module.abouts.table').'.created_at',
                config('module.abouts.table').'.updated_at',
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
        if (About::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.abouts.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param About $about
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(About $about, array $input)
    {
    	if ($about->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.abouts.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param About $about
     * @throws GeneralException
     * @return bool
     */
    public function delete(About $about)
    {
        if ($about->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.abouts.delete_error'));
    }
}
