<?php

namespace App\Repositories\Backend\Media;

use DB;
use Carbon\Carbon;
use App\Models\Media\Medium;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MediumRepository.
 */
class MediumRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Medium::class;

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
                config('module.media.table').'.id',
                config('module.media.table').'.created_at',
                config('module.media.table').'.updated_at',
            ]);
    }

}
