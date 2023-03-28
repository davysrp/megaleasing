<?php

namespace App\Repositories\Backend\ManagementTeam;

use DB;
use Carbon\Carbon;
use App\Models\ManagementTeam\ManagementTeam;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ManagementTeamRepository.
 */
class ManagementTeamRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = ManagementTeam::class;

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
                config('module.managementteams.table').'.id',
                config('module.managementteams.table').'.created_at',
                config('module.managementteams.table').'.name',
                config('module.managementteams.table').'.updated_at',
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
        if (ManagementTeam::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.managementteams.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param ManagementTeam $managementteam
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(ManagementTeam $managementteam, array $input)
    {
    	if ($managementteam->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.managementteams.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param ManagementTeam $managementteam
     * @throws GeneralException
     * @return bool
     */
    public function delete(ManagementTeam $managementteam)
    {
        if ($managementteam->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.managementteams.delete_error'));
    }
}
