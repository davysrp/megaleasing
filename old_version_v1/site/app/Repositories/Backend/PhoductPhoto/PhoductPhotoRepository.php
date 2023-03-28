<?php

namespace App\Repositories\Backend\PhoductPhoto;

use DB;
use Carbon\Carbon;
use App\Models\PhoductPhoto\PhoductPhoto;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PhoductPhotoRepository.
 */
class PhoductPhotoRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = PhoductPhoto::class;

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
                config('module.phoductphotos.table').'.id',
                config('module.phoductphotos.table').'.created_at',
                config('module.phoductphotos.table').'.updated_at',
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
        if (PhoductPhoto::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.phoductphotos.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param PhoductPhoto $phoductphoto
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(PhoductPhoto $phoductphoto, array $input)
    {
    	if ($phoductphoto->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.phoductphotos.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param PhoductPhoto $phoductphoto
     * @throws GeneralException
     * @return bool
     */
    public function delete(PhoductPhoto $phoductphoto)
    {
        if ($phoductphoto->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.phoductphotos.delete_error'));
    }
}
