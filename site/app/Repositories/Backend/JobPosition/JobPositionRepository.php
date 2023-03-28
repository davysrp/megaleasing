<?php

namespace App\Repositories\Backend\JobPosition;

use DB;
use Carbon\Carbon;
use App\Models\JobPosition\JobPosition;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JobPositionRepository.
 */
class JobPositionRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = JobPosition::class;

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
                config('module.jobpositions.table').'.id',
                config('module.jobpositions.table').'.title',
                config('module.jobpositions.table').'.title_eng',
                config('module.jobpositions.table').'.created_at',
                config('module.jobpositions.table').'.updated_at',
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
        if (JobPosition::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.jobpositions.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param JobPosition $jobposition
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(JobPosition $jobposition, array $input)
    {
    	if ($jobposition->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.jobpositions.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param JobPosition $jobposition
     * @throws GeneralException
     * @return bool
     */
    public function delete(JobPosition $jobposition)
    {
        if ($jobposition->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.jobpositions.delete_error'));
    }
}
