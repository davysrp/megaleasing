<?php

namespace App\Repositories\Backend\NewsList;

use DB;
use Carbon\Carbon;
use App\Models\NewsList\NewsList;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NewsListRepository.
 */
class NewsListRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = NewsList::class;

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
                config('module.newslists.table').'.id',
                config('module.newslists.table').'.title',
                config('module.newslists.table').'.created_at',
                config('module.newslists.table').'.updated_at',
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
        if (NewsList::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.newslists.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param NewsList $newslist
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(NewsList $newslist, array $input)
    {
    	if ($newslist->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.newslists.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param NewsList $newslist
     * @throws GeneralException
     * @return bool
     */
    public function delete(NewsList $newslist)
    {
        if ($newslist->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.newslists.delete_error'));
    }
}
