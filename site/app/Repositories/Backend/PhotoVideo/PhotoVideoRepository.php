<?php

namespace App\Repositories\Backend\PhotoVideo;

use DB;
use Carbon\Carbon;
use App\Models\PhotoVideo\PhotoVideo;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PhotoVideoRepository.
 */
class PhotoVideoRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = PhotoVideo::class;

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
                config('module.photovideos.table').'.id',
                config('module.photovideos.table').'.title',
                config('module.photovideos.table').'.created_at',
                config('module.photovideos.table').'.updated_at',
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
        if (PhotoVideo::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.photovideos.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param PhotoVideo $photovideo
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(PhotoVideo $photovideo, array $input)
    {
    	if ($photovideo->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.photovideos.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param PhotoVideo $photovideo
     * @throws GeneralException
     * @return bool
     */
    public function delete(PhotoVideo $photovideo)
    {
        if ($photovideo->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.photovideos.delete_error'));
    }
}
