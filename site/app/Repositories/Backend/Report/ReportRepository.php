<?php

namespace App\Repositories\Backend\Report;

use DB;
use Carbon\Carbon;
use App\Models\Report\Report;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportRepository.
 */
class ReportRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Report::class;

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
                config('module.reports.table').'.id',
                config('module.reports.table').'.title',
                config('module.reports.table').'.created_at',
                config('module.reports.table').'.updated_at',
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
        if (Report::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.reports.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Report $report
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Report $report, array $input)
    {
    	if ($report->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.reports.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Report $report
     * @throws GeneralException
     * @return bool
     */
    public function delete(Report $report)
    {
        if ($report->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.reports.delete_error'));
    }
}
