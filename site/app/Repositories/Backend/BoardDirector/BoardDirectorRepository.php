<?php

namespace App\Repositories\Backend\BoardDirector;

use DB;
use Carbon\Carbon;
use App\Models\BoardDirector\BoardDirector;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BoardDirectorRepository.
 */
class BoardDirectorRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = BoardDirector::class;

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
                config('module.boarddirectors.table').'.id',
                config('module.boarddirectors.table').'.name',
                config('module.boarddirectors.table').'.created_at',
                config('module.boarddirectors.table').'.updated_at',
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
        if (BoardDirector::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.boarddirectors.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param BoardDirector $boarddirector
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(BoardDirector $boarddirector, array $input)
    {
    	if ($boarddirector->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.boarddirectors.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param BoardDirector $boarddirector
     * @throws GeneralException
     * @return bool
     */
    public function delete(BoardDirector $boarddirector)
    {
        if ($boarddirector->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.boarddirectors.delete_error'));
    }
}
